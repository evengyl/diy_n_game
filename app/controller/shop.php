<?php 

Class shop extends base_module
{

	public $date_now = 0;

	public function __construct()
	{		
		$this->date_now = date("U");

		parent::__construct(__CLASS__);

		//va me donner la list des aromes qui sont en random actuellement venant de la base de données
		$tab_arome_random = $this->get_list_arome_random_actuel();

//partie traitement des commande random
		//avant de lancer un marcher aleatoire il faut recup la derniere date de l'aléatoire, on va stocker toute les semaines les produits aléatoire
		if($this->verify_date())
		{
			//il faut premierement récupérer tout les aromes les traiter pour le tpl
			$random_list = $this->get_new_list_random(); //ok

			//va boucler sur les produits random pour creer les requete et les envoyer directement en base de données
			$this->insert_new_random_list($random_list);


			//partie point bonus grace au vente
			if(intval($this->user_infos->produit_vendu_week) >= 1000)
			{
				//va donner 3 point de vente bonnus tout les 1000 produits vendu 
				$this->set_point_user_vente((intval($this->user_infos->produit_vendu_week)*15)*3);
			}
			//fin de la partie des bonus de point grace au vente
		}


		//va traiter et synchroniser le tableau de prod aléatoire pour me rendre le meme tableau avec le nombre de produit si il y a , que le joueur possède
		$tab_arome_random_with_user_value = $this->get_nb_product_have_and_render($tab_arome_random);

		if(isset($_POST))
		{
			if(isset($_POST['secure_shop_random']) && isset($_POST['secure_shop_random']) == '71414242')
			{
				$this->traitement_vente_form_post_random($_POST, $tab_arome_random_with_user_value);
			}
		}
// fin de la partie random


//parti autre produits non repris dans la liste des random
		//on recuprer la liste de produits que l'on pssède traiter et tout
		$tab_final_product_traiter = $this->user->set_list_product_acquis_for_tpl();

		//on va ici avec le tab des produit random et celui de ce que le joueur à, établir un tab avec uniquement ce que le joueeur à qui n'est pas dans la liste des product random
		$tab_arome_with_user_value = $this->render_tab_with_product_have_not_random($tab_arome_random, $tab_final_product_traiter);


		//traitement du post voir l'autre c'est la meme chose pour les random
		if(isset($_POST))
		{
			if(isset($_POST['secure_shop']) && isset($_POST['secure_shop']) == '71414242')
			{
				$this->traitement_vente_form_post_not_random($_POST, $tab_arome_with_user_value);
			}
		}
// fin de la partie normal



		$tab_final_product_traiter = $this->user->set_list_product_acquis_for_tpl();
		$tab_arome_with_user_value = $this->render_tab_with_product_have_not_random($tab_arome_random, $tab_final_product_traiter);
		$tab_arome_random_with_user_value = $this->get_nb_product_have_and_render($tab_arome_random);


		return $this->assign_var("tab_arome_random", $tab_arome_random_with_user_value)
					->assign_var("tab_arome_with_user_value", $tab_arome_with_user_value)
					->assign_var("user", $this)->render();
	}




	public function traitement_vente_form_post_not_random($post, $tab_arome_with_user_value)
	{
		//n recois le post avec tout les produits commander et ceux qui ne le sont pas son à 0, il faut quand même vérifié que ceux commander corresponde car on ne sais jamais avec les form...
		//premiere étape, controller que les id recus et les quantités sont bonne
		// ps : le tab post contient key:id_du_produits_dans_le_tab_random et en value:le_nb_de_produits_vendu
		if(isset($post['secure_shop']))
			unset($post['secure_shop']);

		$form_ok = false;

		foreach($post as $key_post => $nb_post)
		{
			if($nb_post != '0')
			{
				if($nb_post <= $tab_arome_with_user_value[$key_post]->nb)
				{
					//ok l'user à enter une valeur inférieur ou égale à la bonne valeur
					$form_ok = true;
					//ici je rajoute une petite var la ou l'user a voulu vendre un propduits avec le nombre qu'il à voulu vendre pour avec un seul tableau porpre et rempli
					$tab_arome_with_user_value[$key_post]->nb_vendu = $nb_post;

				}
				else
				{
					//si on arrive ici y a d'office un soucis, il a délibérement trafiquer le nb... 
					//donc on le signal et on le met à 0
					$_SESSION['error'] = "Vous avez tenter de trafiquer le formulaire, l'admin en est informé..";
					//envoi du mail d'avertissement
					$subject = "Attention le joueur : ".$this->user_infos->login." à tenter de trafiquer le formulaire de vente de produits.";
					mail(parent::$mail, "Message d'erreur du site Diy N Game.", $subject);
					//msie a jour du nobmre d'avertissement que le user possède
					$this->maj_avertissement_db($this->user_infos);

					//on delete cette cle
					unset($post[$key_post]);
				}
			}
			else
			{
				//je supprime le reste des élément pour alleger les requeste et tout 
				unset($tab_arome_with_user_value[$key_post]);
				unset($post[$key_post]);
			}
		}


		if($form_ok)//ok 
		{
			// on a mtn le propre tab avec toute les infos sur ce que le user vends , reste plus qu'a taiter sa demande 
			$total_vente = 0;

			foreach($tab_arome_with_user_value as $row_user_prod_vente)
			{
				//on calcule le total de la vente
				$total_vente = Config::$sell_product_not_random * $row_user_prod_vente->nb_vendu;

				$this->user_infos->produit_vendu_total += $row_user_prod_vente->nb_vendu;

				$req_sql = new stdClass;
				$req_sql->table = "login";
				$req_sql->where = "id = '".$this->user_infos->id."'";
				$req_sql->ctx = new stdClass;
				$req_sql->ctx->produit_vendu_total = $this->user_infos->produit_vendu_total;
				$res_sql = $this->update($req_sql);
				unset($req_sql);

				//on lui ajoute son argent avant pour le récompenser même en cas de bug
				$this->set_argent_user($total_vente, '+');
				// et mtn il faut enlever les prod du user
				$this->maj_product_list_in_bsd($row_user_prod_vente->id, $row_user_prod_vente->nb_vendu, $row_user_prod_vente->base_bsd, $row_user_prod_vente->date_peremption_unix, $ajout_or_delete = '-');
			}
			return $total_vente;
		}
		else
		{
			//rien dans le form ou alors aucun envoi, renvoi d'un message simple
			$_SESSION['error'] = "Il c'est produit une erreur ou alors vous n'avez rien envoyez en vente.";
		}
	}



	public function render_tab_with_product_have_not_random($tab_arome_random, $tab_final_product_traiter)
	{
		//on va ici avec le tab des produit random et celui de ce que le joueur à, établir un tab avec uniquement ce que le joueeur à qui n'est pas dans la liste des product random
		if(!empty($tab_final_product_traiter))
		{
			foreach($tab_final_product_traiter as $row)
			{
				foreach($row as $aromes)
				{
					$array_product_have[] = $aromes;	
				}
			}


			//on vérifie si les id correspondent pour savoir si le joueur possède des produits de cette liste et on les stock ou on met à 0 en sens inverse
			foreach($array_product_have as $key_have => $value_have)
			{
				foreach($tab_arome_random as $key_random => $value_random)
				{
					if($value_have->id == $value_random->id_aromes)
					{
						//l'arome est present dans la liste random vérifié la base mtn
						if($value_have->base_bsd == $value_random->base)
						{
							//l'arome est en top list cette semaine il faut le delete du tab des produits que l'on a
							unset($array_product_have[$key_have]);
						}
					}
				}
			}
			$array_product_have = array_values($array_product_have);
			

			return $array_product_have;
		}
		else
		{
			return false;
		}

	}


	public function traitement_vente_form_post_random($post, $tab_arome_random_with_user_value)
	{
		//n recois le post avec tout les produits commander et ceux qui ne le sont pas son à 0, il faut quand même vérifié que ceux commander corresponde car on ne sais jamais avec les form...
		//premiere étape, controller que les id recus et les quantités sont bonne
		// ps : le tab post contient key:id_du_produits_dans_le_tab_random et en value:le_nb_de_produits_vendu

		if(isset($post['secure_shop_random']))
			unset($post['secure_shop_random']);

		$form_ok = false;

		foreach($post as $key_post => $nb_post)
		{
			if($nb_post != '0')
			{
				if($nb_post <= $tab_arome_random_with_user_value[$key_post]->nb_user_have)
				{
					//ok l'user à enter une valeur inférieur ou égale à la bonne valeur
					$form_ok = true;
					//ici je rajoute une petite var la ou l'user a voulu vendre un propduits avec le nombre qu'il à voulu vendre pour avec un seul tableau porpre et rempli
					$tab_arome_random_with_user_value[$key_post]->nb_vendu = $nb_post;

				}
				else
				{
					//si on arrive ici y a d'office un soucis, il a délibérement trafiquer le nb... 
					//donc on le signal et on le met à 0
					$_SESSION['error'] = "Vous avez tenter de trafiquer le formulaire, l'admin en est informé..";
					//envoi du mail d'avertissement
					$subject = "Attention le joueur : ".$this->user_infos->login." à tenter de trafiquer le formulaire de vente de produits.";
					mail(parent::$mail, "Message d'erreur du site Diy N Game.", $subject);
					//msie a jour du nobmre d'avertissement que le user possède
					user::maj_avertissement($this->user_infos);

					//on delete cette cle
					unset($post[$key_post]);
				}
			}
			else
			{
				//je supprime le reste des élément pour alleger les requeste et tout 
				unset($tab_arome_random_with_user_value[$key_post]);
				unset($post[$key_post]);
			}
		}

		if($form_ok)//ok 
		{
			// on a mtn le propre tab avec toute les infos sur ce que le user vends , reste plus qu'a taiter sa demande 
			$total_vente = 0;

			foreach($tab_arome_random_with_user_value as $row_user_prod_vente)
			{
				//on calcule le total de la vente
				$total_vente = Config::$sell_product_random * $row_user_prod_vente->nb_vendu;
				$this->user_infos->produit_vendu_week += $row_user_prod_vente->nb_vendu;
				$this->user_infos->produit_vendu_total += $row_user_prod_vente->nb_vendu;


				$req_sql = new stdClass;
				$req_sql->table = "login";
				$req_sql->where = "id = '".$this->user_infos->id."'";
				$req_sql->ctx = new stdClass;
				$req_sql->ctx->produit_vendu_total = $this->user_infos->produit_vendu_total;
				$req_sql->ctx->produit_vendu_week = $this->user_infos->produit_vendu_week;
				$res_sql = $this->update($req_sql);
				unset($req_sql);
				//on lui ajoute son argent avant pour le récompenser même en cas de bug
				$this->set_argent_user($total_vente, '+');

				// et mtn il faut enlever les prod du user
				$this->maj_product_list_in_bsd($row_user_prod_vente->id_aromes, $row_user_prod_vente->nb_vendu, $row_user_prod_vente->base ,$row_user_prod_vente->date_peremption_unix, $ajout_or_delete = '-');
			}
			return $total_vente;
		}
		else
		{
			//rien dans le form ou alors aucun envoi, renvoi d'un message simple
			$_SESSION['error'] = "Il c'est produit une erreur ou alors vous n'avez rien envoyez en vente.";
		}
	}


	public function get_nb_product_have_and_render($tab_arome_random)
	{
		//on recuprer la liste de produits que l'on pssède traiter et tout
		$tab_final_arome_acquis_traiter = $this->user->set_list_product_acquis_for_tpl();

		//on procède deux foreach pour rendre le tableau creer pour le template plus prorpe sans les entete et tout
		//on vérifie que on en recois pas un false
		if($tab_final_arome_acquis_traiter != false)
		{
			foreach($tab_final_arome_acquis_traiter as $row)
			{
				foreach($row as $aromes)
				{
					$array_product_have[] = $aromes;	
				}
			}

			//on vérifie si les id correspondent pour savoir si le joueur possède des produits de cette liste et on les stock ou on met à 0
			foreach($tab_arome_random as $key => $row_random_arome)
			{
				$tab_arome_random[$key]->nb_user_have = 0;
				foreach($array_product_have as $key_have => $prod_have)
				{
					if($row_random_arome->id_aromes == $prod_have->id)
					{
						if($row_random_arome->base == $prod_have->base_bsd)
						{
							$tab_arome_random[$key]->nb_user_have += $prod_have->nb;	
						}
					}
				}
			}
			$tab_arome_random = array_values($tab_arome_random);

			return $tab_arome_random;
		}
		else
		{
			foreach($tab_arome_random as $key => $row_random_arome)
			{
				$tab_arome_random[$key]->nb_user_have = 0;
			}
			return $tab_arome_random;
		}

	}


	public function get_list_arome_random_actuel()
	{
		$req_sql = new stdClass();
		$req_sql->table = "random_shop";
		$req_sql->var = "*";
		$req_sql->order = "id DESC";
		$req_sql->limit = Config::$nb_random_prod_shop;
		$res_sql = $this->user->select($req_sql);

		
		foreach($res_sql as $row_sql)
		{
			if($row_sql->base == "2080")
				$row_sql->base_string = "20% VG / 80% PG";

			else if($row_sql->base == "5050")
				$row_sql->base_string = "50% VG / 50% PG";

			else if($row_sql->base == "8020")
				$row_sql->base_string = "80% VG / 20% PG";

			else if($row_sql->base == "1000")
				$row_sql->base_string = "100% VG / 0% PG";
		}
		return $res_sql;
	}

	public function insert_new_random_list($random_list)
	{
		foreach($random_list as $row_random_arome) //ok
		{
			$req_sql = new stdClass();
			$req_sql->ctx = new StdClass();
			$req_sql->table = "random_shop";
			$req_sql->ctx->id_aromes = $row_random_arome->id;
			$req_sql->ctx->img = $row_random_arome->img;
			$req_sql->ctx->marque = $row_random_arome->marque;
			$req_sql->ctx->nom_aromes = $row_random_arome->nom;
			$req_sql->ctx->base = $row_random_arome->base;
			$req_sql->ctx->nb_vente = "0";
			//attention que lors de l'ajout des 15 nouvaux armes en random il faut mettre la date_stop avec une semaine de plus que date_now 604800 seconde 
			$req_sql->ctx->date_stop = $this->date_now + Config::$duree_random_prod;
			$this->user->insert_into($req_sql);
		}
	}


	public function get_new_list_random()
	{
		$tab_final_all_arome_traiter = $this->set_all_arome_for_tpl();

		$array_arome = array();

		$array_base = array_flip(array("2080","5050","8020", "1000"));

		foreach($tab_final_all_arome_traiter as $row)
		{
			foreach($row as $aromes)
			{
				$array_arome[] = $aromes;	
			}
		}


		$array_random_key = array_rand($array_arome,Config::$nb_random_prod_shop);

		foreach($array_arome as $key_row_arome => $value_row_arome)
		{
			foreach($array_random_key as $random_key)
			{
				if($random_key == $key_row_arome)
				{
					//mettre en place le systeme de choix de la bases utilisée
					$rand_base = array_rand($array_base,1);
					$value_row_arome->base = $rand_base;
					$array_random_traiter[] = $value_row_arome;
				}
			}

		}
		return $array_random_traiter;
	}


	public function verify_date()
	{
		//vérifier la date de produits random pour voir si il sont encore valide ou pas 

		$req_sql = new StdClass();
		$req_sql->table = "random_shop";
		$req_sql->var = "date_stop";
		$req_sql->limit = "1";
		$req_sql->order = 'id DESC';
		$res_sql = $this->user->select($req_sql);

		if(empty($res_sql))
			return true;
		else
			$res_sql = $res_sql[0];

		
		if($res_sql->date_stop < $this->date_now)
			return true;

		else
			return false;
	}



}
