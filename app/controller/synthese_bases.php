<?php 

Class synthese_bases extends base_module
{
	public $nb_plantes_for_littre = 3000;
	public $nb_propylene_for_littre = 2100;

	public $prix_vingt_quatre_vingt = 450;
	public $prix_cinquante_cinquante = 400;
	public $prix_quatre_vingt_vingt = 370;
	public $prix_cent = 350;

	public $littre_vg_possible = 0;
	public $littre_pg_possible = 0;

	public $nb_vingt_quatre_vingt = 0;
	public $nb_cinquante_cinquante = 0;
	public $nb_quatre_vingt_vingt = 0;
	public $nb_cent = 0;

	public	$cout_total_vg = 0;
	public	$cout_total_pg = 0;

	public $nb_to_create = array();


	public function __construct($module_tpl_name, &$user)
	{	
	

		parent::__construct($module_tpl_name, $user);


		//cette fonctions va vérifier si le client a assez d'argnet et combien de base il peux creer en dependant de son argent

		//calcule du nombre de plante et de propy pour creer la base en fct du % de reduction du au labos set les nouvelle valeur dans l'objet
		$pourcent_down = $this->user_obj->labos_bases->pourcent_down;
		$this->nb_plantes_for_littre = $this->set_reduction_coup_with_labos($this->nb_plantes_for_littre, $pourcent_down);
		$this->nb_propylene_for_littre = $this->set_reduction_coup_with_labos($this->nb_propylene_for_littre, $pourcent_down);

		//va seter dans $this->littre_vg_possible et $this->littre_pg_possible la quantité de matiere brut que le joueur peu avoir
		//$this->calcul_nb_bases_in_litter_to_create();



		//va calculer cmb le joueur peux creer avec ses bases et sont argent
		$this->nb_to_create[2080] = $this->nb_bases(0.2,0.8);
		$this->nb_to_create[5050] = $this->nb_bases(0.5,0.5);
		$this->nb_to_create[8020] = $this->nb_bases(0.8,0.2);
		$this->nb_to_create[1000] = $this->nb_bases(1,1);	


		// envoi le formulaire contenant ce que le joueur veux creer
		if(isset($_POST['convert_all_in_littre']))
		{
			$this->convert_all_ressource_in_littre($_POST['to_convert']);
		}
		
		if(isset($_POST['create_bases'])) 
		{
			$this->recept_form_with_bases_to_create($_POST);
		}



		if($this->cout_total_vg != 0 || $this->cout_total_pg != 0)
		{
			//il faut mtn appliquer la réduction de cout du labos
			$this->set_ressource_user($this->cout_total_vg, $this->cout_total_pg, $moins_plus = "-");
		}
			

		return $this->assign_var("nb_to_create", $this->nb_to_create)->render();
	}





	public function set_reduction_coup_with_labos($nb_total_de_bases, $pourcent_down)
	{
		$reduction_calcul = (100 - (float)$pourcent_down)/100;
		$nb_total_de_bases = $nb_total_de_bases * (float)$reduction_calcul;

		return (float)$nb_total_de_bases;
	}

	
	public function convert_all_ressource_in_littre($name_to_create)
	{
		if($name_to_create == 'vg')
		{
			$plante_stock = $this->user_obj->user_infos->last_culture_vg;
			$littre_vg_possible = floor(round($plante_stock / $this->nb_plantes_for_littre, 2));

			
			if($this->littre_vg_possible <= 0)
			{
				$_SESSION['error_bases_down'] = "Infos : Vous devrier construire plus de batiments de production";	
			}

			$this->set_litter_vg($littre_vg_possible);

			$cout_total_ressource = $littre_vg_possible * $this->nb_plantes_for_littre;
			$this->set_ressource_user($cout_total_ressource, 0, $moins_plus = "-");

		}

		else if($name_to_create == 'pg')
		{
			$propylene_stock = $this->user_obj->user_infos->last_usine_pg;
			$littre_pg_possible = floor(round($propylene_stock / $this->nb_propylene_for_littre, 2));


			if($this->littre_pg_possible <= 0)
			{
				$_SESSION['error_bases_down'] = "Infos : Vous devrier construire plus de batiments de production";	
			}

			$this->set_litter_pg($littre_pg_possible);

			$cout_total_ressource = $littre_pg_possible * $this->nb_propylene_for_littre;
			$this->set_ressource_user(0, $cout_total_ressource, $moins_plus = "-");

		}
	}




	public function recept_form_with_bases_to_create($post)
	{
		//nettoyage du post principale et secondaire tmp
		unset($post['create_bases']);
		unset($_POST['create_bases']);
		affiche_pre($post);

		foreach($post as $name_form_bases => $nb_form_bases)
		{
			if($nb_form_bases >= 0)
			{
				if($this->calcul_price_total_cost_bases($name_form_bases, intval($nb_form_bases)))
				{
					$this->calcul_cost_ressource($name_form_bases, intval($nb_form_bases));
					$this->ajout_bases_in_bsd($name_form_bases, intval($nb_form_bases), "+");
					unset($_POST);
				}
				else
				{
					return 0;
				}
			}
			else
			{
				return 0;
			}
		}
		//faudra appeler cette fct set_ressource_user($vg_to_operate, $pg_to_operate, $moins_plus = "-")
			//ici recevra le formulaire rempli avec les bases a crées, elle seront passiblement les meme que le mex aposible mais vérifier tout les cas on sais jamais
		//va appeler la fonction de calcule de prix pour chaque champs et recevra en echange le prix total
	}



	public function calcul_price_total_cost_bases($name_form_bases, $nb_form_bases)
	{

			affiche_pre($this->nb_to_create);
			//operation
			if($nb_form_bases > $this->nb_to_create[$name_form_bases])
			{
				$_SESSION["error"] = "Erreur vous ne possédez pas assez de ressources pour tous créer";
				return 0;
			}
			else
			{
				//déduction de l'argnet et des ressource		
				$total_price = 0;		

				if($name_form_bases == 2080)
					$total_price += $this->prix_vingt_quatre_vingt * $nb_form_bases;

				else if($name_form_bases == 5050)
					$total_price += $this->prix_cinquante_cinquante * $nb_form_bases;

				else if($name_form_bases == 8020)
					$total_price += $this->prix_quatre_vingt_vingt * $nb_form_bases;

				else if($name_form_bases == 1000)
					$total_price += $this->prix_cent * $nb_form_bases;

				//il faut vérifier si il a assez d'argnet également
				if($this->user_obj->user_infos->argent >= $total_price)
				{
					$this->set_argent_user($total_price, "-");
					return 1;
				}					
				else
				{
					$_SESSION["error"] = "Erreur vous ne possédez pas assez d'argent pour tous créer";
					return 0;
				}
			}
		
		//calculera le prix que coutera la synthese des bases et renverra a la fct précédente
	}

	public function calcul_cost_ressource($row_post, $value_post)
	{
		if($row_post == 2080)
		{
			$this->cout_total_vg += (($this->nb_plantes_for_littre/100)*20) * $value_post;
			$this->cout_total_pg += (($this->nb_propylene_for_littre/100)*80) * $value_post;
		}

		if($row_post == 5050)
		{
			$this->cout_total_vg += (($this->nb_plantes_for_littre/100)*50) * $value_post;
			$this->cout_total_pg += (($this->nb_propylene_for_littre/100)*50) * $value_post;
		}
		if($row_post == 8020)
		{
			$this->cout_total_vg += (($this->nb_plantes_for_littre/100)*80) * $value_post;
			$this->cout_total_pg += (($this->nb_propylene_for_littre/100)*20) * $value_post;
		}
		if($row_post == 1000)
		{
			$this->cout_total_vg += $this->nb_plantes_for_littre * $value_post;
		}
	}

	public function ajout_bases_in_bsd($row_post, $value_post, $moins_plus)
	{
		$stx_bases = "bases_".$row_post;
		$bases_before = $this->user_obj->bases->$stx_bases;
		
		if($moins_plus == "-")
		{
			$bases_after = $bases_before - $value_post;	
		}
		else if($moins_plus == "+")
		{
			$bases_after = $bases_before + $value_post;
		}
		else
		{
			$bases_after = $bases_before - $value_post;
		}

		$req_sql = new stdClass;
		$req_sql->table = "bases";
		$req_sql->where = "id_user = '".$this->user_obj->user_infos->id."'";
		$req_sql->ctx = new stdClass;
		$var_bsd = "bases_".$row_post;
		$req_sql->ctx->$var_bsd = $bases_after;
		$res_sql = $this->update($req_sql);
		unset($req_sql);
		//idealement recevra un tableau associatif avec le nom de la bses avec un autre array dedans  qui aura le prix total a déduire grace a la fct dans le bases module et la quantité a ajoutée en bases
	}




	public function nb_bases($dosage_vg = 1, $dosage_pg = 1)
	{
		$nb_vg = floor($this->user_obj->user_infos->litter_vg / $dosage_vg);

		$nb_pg = floor($this->user_obj->user_infos->litter_pg / $dosage_pg);

		if($nb_vg > $nb_pg)
			$nb_ok = $nb_pg;

		else if($nb_vg < $nb_pg)
			$nb_ok = $nb_vg;

		else
			$nb_ok = $nb_vg;



		$argent_user = $this->user_obj->user_infos->argent;

		if($dosage_vg == 0.2 && $dosage_pg == 0.8)
		{
			$prix_total_estimation_de_prod = $this->prix_vingt_quatre_vingt * $nb_ok;
			$list_price_user = $this->prix_vingt_quatre_vingt;
		}
		else if($dosage_vg == 0.5 && $dosage_pg == 0.5)
		{
			$prix_total_estimation_de_prod = $this->prix_cinquante_cinquante * $nb_ok;
			$list_price_user = $this->prix_cinquante_cinquante;
		}
		else if($dosage_vg == 0.8 && $dosage_pg == 0.2)
		{
			$prix_total_estimation_de_prod = $this->prix_quatre_vingt_vingt * $nb_ok;
			$list_price_user = $this->prix_quatre_vingt_vingt;
		}
		else if($dosage_vg == 1 && $dosage_pg == 1)
		{
			$prix_total_estimation_de_prod = $this->prix_cent * $nb_ok;
			$list_price_user = $this->prix_cent;
		}
		//donne le prix total que couterais toute la création de base dans cette sorte ci
		// il faut mtn déterminer si le joueur peux tout faire avec


		if($prix_total_estimation_de_prod <= $argent_user)
		{
			return $nb_ok; // il peux de toute facon tout créer
		}
		else
		{
			return $nb_ok_after_calcule_argent = floor($argent_user / $list_price_user);
			//il faut déterminer cmb il peux en faire avec sont argent
			//appel une fct qui check si on a assez pour faire ça
		}
	}

	public function calcul_argent_to_nb_base_possible()
	{
		/*
			comment faire la fct
			j'ai l'argent de l'user et le cout 
		*/
	}

}
