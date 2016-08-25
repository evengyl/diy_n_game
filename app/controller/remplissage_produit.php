<?php 

Class remplissage_produit extends base_module
{

	public $tab_final_arome_acquis_traiter = array();
	public $array_nb_product_creable = array();

	public function __construct($module_tpl_name, &$user)
	{		
		parent::__construct($module_tpl_name, $user);

		$this->tab_final_arome_acquis_traiter = user_ressources::set_arome_acquis_for_tpl($user);

		//il faut d'abbord vérifier combien on peux faire de produits avec les bases actuel pour l'envoyer au formulaire dans le template
		$this->array_nb_product_creable_a_partir_des_bases = $this->nb_product_creable_bases($user->bases);
		//mtn on a un array avec le nombre de flacons créable a partir des bases

		//mtn il faut virifier par rapport au frigos
		$this->array_nb_product_creable_a_partir_des_frigos = $this->nb_product_creable_frigo($this->array_nb_product_creable_a_partir_des_bases, $user);

		//mtn que l'on à ça, on dois vérifier par rapport au nombre de pipette de remplissage
		$this->array_nb_product_creable_a_partir_des_pipette = $this->nb_product_creable_pipette($this->array_nb_product_creable_a_partir_des_frigos, $user);

		//mtn il ne nous reste plus qu'a voir avec le nombre de flacons vide
		$this->array_nb_product_creable_a_partir_des_flacon = $this->nb_product_creable_flacon($this->array_nb_product_creable_a_partir_des_pipette, $user);

		//mtn il ne nous reste plus qu'a voir avec l'argent disponible'
		$this->array_nb_product_creable = $this->nb_product_creable_argent($this->array_nb_product_creable_a_partir_des_flacon, $user);

		//nous récupérons donc un tableau contenant les 4 bases avec le nombre maxi que l'on peux creer de produits
		
		
		//traitement du post recu par le formualire, il vérfie les infos.
		//récuprere la ligne de la table des produtis du joueur et traite les nouveau a créer, calcule également le prix et déduis
		if(isset($_POST['secure']))
		{
			if($_POST['secure'] == "71414242")
			{
				$this->traitement_post($_POST);
				unset($_POST);
			}
		}

		return $this->assign_var("array_nb_product_creable", $this->array_nb_product_creable)->assign_var("tab_final_arome_acquis_traiter", $this->tab_final_arome_acquis_traiter)->assign_var("user", $user)->render();
	}

	private function nb_product_creable_bases($bases_user)
	{
		$array_propre_base = array();
		foreach($bases_user as $num_base => $nb_base)
		{
			$num_base = substr($num_base, 6);
			//on fait *100 pour avoir la quantité de flacons de 10 ml on peu faire
			$array_propre_base[$num_base] = $nb_base*100;
		}

		//mtn on a un array avec le nombre de flacons créable a partir des bases
		return $array_propre_base;

	}


	private function nb_product_creable_frigo($array_nb_product_creable_a_partir_des_bases, $user)
	{
		//avant ça il faut prévoir le fct dans user_ressource pour savoir cmb de produit on a en stock déjà
		$max_product_possible = Config::$nb_product_per_frigo * $user->hardware->frigo;

		//sur base du nombre de produit que l'on a déja, calcule simplement ce que l'on peux encoroe créer;
		$max_product_restant_a_creer_frigo = $max_product_possible - $user->user_infos->nb_product_total;

		//apres on if pour savoir si on peux creer tout ce que les bases propose ou uniquement ce que les frigos propose
		$array_nb_product_creable = array();
		foreach($array_nb_product_creable_a_partir_des_bases as $key => $row_nb_product_possible_bases)
		{
			if($row_nb_product_possible_bases > $max_product_restant_a_creer_frigo)
			{
				//on a pas assez de frigo, on return le nombre que le frigo peux contenir
				$_SESSION['error_0'] = "Vous devriez construire plus de frigos";
				$array_nb_product_creable[$key] = $max_product_restant_a_creer_frigo;

			}	
			else if($row_nb_product_possible_bases < $max_product_restant_a_creer_frigo)
			{
				//ici le nombre est plus petit que ce que les firgo peuvbent contenir donc on renvoi sur bases des bases créable
				$_SESSION['error_0'] = "Vous n'avez plus beaucoup de ressources par rapport à vos frigos";
				$array_nb_product_creable[$key] = $row_nb_product_possible_bases;
			}
			else
			{
				//peux probable mais c'est que le nombre sont tout pile exacte on return le nb par frigo
				$array_nb_product_creable[$key] = $max_product_restant_a_creer_frigo;
			}
		}
		return $array_nb_product_creable;
	}

	private function nb_product_creable_pipette($array_nb_product_creable_a_partir_des_frigos, $user)
	{
		//sur base du nombre de produit que l'on a déja, calcule simplement ce que l'on peux encoroe créer;
		//apres on if pour savoir si on peux creer tout ce que les bases propose ou uniquement ce que les frigos propose
		$array_nb_product_creable = array();

		foreach($array_nb_product_creable_a_partir_des_frigos as $key => $row_nb_product_possible_frigo)
		{
			if($row_nb_product_possible_frigo > $user->hardware->pipette)
			{
				//on a pas assez de frigo, on return le nombre que le frigo peux contenir
				$_SESSION['error_1'] = "Vous devriez construire plus de pipettes";
				$array_nb_product_creable[$key] = $user->hardware->pipette;

			}	
			else if($row_nb_product_possible_frigo < $user->hardware->pipette)
			{
				//ici le nombre est plus petit que ce que les firgo peuvbent contenir donc on renvoi sur bases des bases créable
				$_SESSION['error_1'] = "Vous n'avez plus beaucoup de ressources par rapport à vos pipettes";
				$array_nb_product_creable[$key] = $row_nb_product_possible_frigo;
			}
			else
			{
				//peux probable mais c'est que le nombre sont tout pile exacte on return le nb par frigo
				$array_nb_product_creable[$key] = $user->hardware->pipette;
			}
		}
		return $array_nb_product_creable;
	}


	private function nb_product_creable_flacon($array_nb_product_creable_a_partir_des_pipette, $user)
	{

		foreach($array_nb_product_creable_a_partir_des_pipette as $key => $row_nb_product_possible_pipette)
		{
			if($row_nb_product_possible_pipette > $user->hardware->flacon)
			{
				//on a pas assez de frigo, on return le nombre que le frigo peux contenir
				$_SESSION['error_2'] = "Vous devriez construire plus de flacons";
				$array_nb_product_creable[$key] = $user->hardware->flacon;

			}	
			else if($row_nb_product_possible_pipette < $user->hardware->flacon)
			{
				//ici le nombre est plus petit que ce que les firgo peuvbent contenir donc on renvoi sur bases des bases créable
				$_SESSION['error_2'] = "Vous n'avez plus beaucoup de ressources par rapport à vos flacons";
				$array_nb_product_creable[$key] = $row_nb_product_possible_pipette;
			}
			else
			{
				//peux probable mais c'est que le nombre sont tout pile exacte on return le nb par frigo
				$array_nb_product_creable[$key] = $user->hardware->flacon;
			}
		}
		return $array_nb_product_creable;
	}


	private function nb_product_creable_argent($array_nb_product_creable_a_partir_des_flacon, $user)
	{


		foreach($array_nb_product_creable_a_partir_des_flacon as $key => $row_nb_product_possible_argent)
		{
			if($user->user_infos->argent > ($row_nb_product_possible_argent * Config::$price_for_un_product))
			{
				//on a pas assez de frigo, on return le nombre que le frigo peux contenir
				$_SESSION['error_3'] = "Vous possédez beaucoup d'argent c'est très bon pour votre société";
				$array_nb_product_creable[$key] = $row_nb_product_possible_argent;

			}	
			else if($user->user_infos->argent < ($row_nb_product_possible_argent * Config::$price_for_un_product))
			{
				//ici le nombre est plus petit que ce que les firgo peuvbent contenir donc on renvoi sur bases des bases créable
				$_SESSION['error_3'] = "Vous n'avez pas assez d'argent pour créer le maximum de produits possible";
				//on doit alors calculer ce que l'on peux réellement creer avec notre argent
				$total_possible = $user->user_infos->argent / Config::$price_for_un_product;
				$array_nb_product_creable[$key] = $row_nb_product_possible_argent;
			}
			else
			{
				//peux probable mais c'est que le nombre sont tout pile exacte on return le nb par frigo
				$array_nb_product_creable[$key] = $row_nb_product_possible_argent;
			}
		}
		return $array_nb_product_creable;
	}



	private function traitement_post($post)
	{
		affiche_pre($post);


	}
}
