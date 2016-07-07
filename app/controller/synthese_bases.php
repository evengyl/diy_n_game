<?php 

Class synthese_bases extends base_module
{
	public $littre_vg_possible = 0;
	public $littre_pg_possible = 0;

	public	$cout_total_vg = 0;
	public	$cout_total_pg = 0;

	public $nb_to_create = array();


	public function __construct($module_tpl_name, &$user)
	{	
		parent::__construct($module_tpl_name, $user);
		//cette fonctions va vérifier si le client a assez d'argnet et combien de base il peux creer en dependant de son argent

		//calcule du nombre de plante et de propy pour creer la base en fct du % de reduction du au labos set les nouvelle valeur dans l'objet
		$pourcent_down = $this->user_obj->labos_bases->pourcent_down;
		Config::$nb_plantes_for_littre = $this->set_reduction_coup_with_labos(Config::$nb_plantes_for_littre, $pourcent_down);
		Config::$nb_propylene_for_littre = $this->set_reduction_coup_with_labos(Config::$nb_propylene_for_littre, $pourcent_down);

		//va calculer cmb le joueur peux creer avec ses bases et sont argent
		$this->nb_to_create[2080] = $this->nb_bases(0.2,0.8);
		$this->nb_to_create[5050] = $this->nb_bases(0.5,0.5);
		$this->nb_to_create[8020] = $this->nb_bases(0.8,0.2);
		$this->nb_to_create[1000] = $this->nb_bases(1,1);

		foreach($this->nb_to_create as $key => $values)
		{
			if($values == 0)
				$_SESSION["little_infos"] = "Vous ne possédez pas assez de ressource  pour créer chaque sorte de bases";
		}

		// envoi le formulaire contenant ce que le joueur veux creer
		if(isset($_POST['convert_all_in_littre']))
		{
			$this->convert_all_ressource_in_littre($_POST['to_convert']);
			$user->get_variable_user();
		}

		if(isset($_POST['create_bases'])) 
		{
			$this->recept_form_with_bases_to_create($_POST);
		}

		return $this->assign_var("nb_to_create", $this->nb_to_create)->assign_var("user", $user)->render();
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
			$littre_vg_possible = floor(round($plante_stock / Config::$nb_plantes_for_littre, 2));

			
			if($this->littre_vg_possible <= 0)
			{
				$_SESSION['error_bases_down'] = "Infos : Vous devrier construire plus de batiments de production";	
			}

			$this->set_litter_vg($littre_vg_possible);

			$cout_total_ressource = $littre_vg_possible * Config::$nb_plantes_for_littre;
			$this->set_ressource_brut_user($cout_total_ressource, 0, $moins_plus = "-");
			$_SESSION['error_bases_down'] = "Infos : Vos plantes on été convertie en littre de bases !";

		}

		else if($name_to_create == 'pg')
		{
			$propylene_stock = $this->user_obj->user_infos->last_usine_pg;
			$littre_pg_possible = floor(round($propylene_stock / Config::$nb_propylene_for_littre, 2));


			if($this->littre_pg_possible <= 0)
			{
				$_SESSION['error_bases_down'] = "Infos : Vous devrier construire plus de batiments de production";	
			}

			$this->set_litter_pg($littre_pg_possible);

			$cout_total_ressource = $littre_pg_possible * Config::$nb_propylene_for_littre;
			$this->set_ressource_brut_user(0, $cout_total_ressource, $moins_plus = "-");
			$_SESSION['error_bases_down'] = "Infos : Votre propylène brut à été converti en littre de bases !";

		}
	}




	public function recept_form_with_bases_to_create($post)
	{
		//nettoyage du post principale et secondaire tmp
		unset($post['create_bases']);
		unset($_POST['create_bases']);

		foreach($post as $name_form_bases => $nb_form_bases)
		{
			if($nb_form_bases >= 0)
			{
				$total_price = $this->calcul_price_total_cost_bases($name_form_bases, intval($nb_form_bases));
				if($total_price != 0)
				{
					$this->calcul_cost_ressource_and_set_total($name_form_bases, intval($nb_form_bases));

					//set dans la base de données les bases creer
					if($this->cout_total_vg != 0 || $this->cout_total_pg != 0)
					{
						$this->set_ressource_litter_user($this->cout_total_vg, $this->cout_total_pg, $moins_plus = "-");
					}

					$this->ajout_bases_in_bsd($name_form_bases, intval($nb_form_bases), "+");
					//set dans la base de données l'argnet que ça à couté
					$this->set_argent_user($total_price, "-");
					unset($_POST);
				}
				else
					return 0;
			}
			else
				return 0;
		}
	}



	public function calcul_price_total_cost_bases($name_form_bases, $nb_form_bases)
	{

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
					$total_price += Config::$prix_vingt_quatre_vingt * $nb_form_bases;

				else if($name_form_bases == 5050)
					$total_price += Config::$prix_cinquante_cinquante * $nb_form_bases;

				else if($name_form_bases == 8020)
					$total_price += Config::$prix_quatre_vingt_vingt * $nb_form_bases;

				else if($name_form_bases == 1000)
					$total_price += Config::$prix_cent * $nb_form_bases;

				//il faut vérifier si il a assez d'argnet également
				if($this->user_obj->user_infos->argent >= $total_price)
				{
					return $total_price;
				}					
				else
				{
					$_SESSION["error"] = "Erreur vous ne possédez pas assez d'argent pour tous créer";
					return 0;
				}
			}
		
		//calculera le prix que coutera la synthese des bases et renverra a la fct précédente
	}

	public function calcul_cost_ressource_and_set_total($nom_base_a_creer, $nb_base_a_creer)
	{
		if($nom_base_a_creer == 2080)
		{
			$this->cout_total_vg += intval(0.2 * $nb_base_a_creer);
			$this->cout_total_pg += intval(0.8 * $nb_base_a_creer);
		}

		if($nom_base_a_creer == 5050)
		{
			$this->cout_total_vg += intval(0.5 * $nb_base_a_creer);
			$this->cout_total_pg += intval(0.5 * $nb_base_a_creer);
		}
		if($nom_base_a_creer == 8020)
		{
			$this->cout_total_vg += intval(0.8 * $nb_base_a_creer);
			$this->cout_total_pg += intval(0.2 * $nb_base_a_creer);
		}
		if($nom_base_a_creer == 1000)
		{
			$this->cout_total_vg += intval(1 * $nb_base_a_creer);
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

		//contradictions du 100% vg qui ne demande pas de pg donc qui sort du lot
		if($dosage_vg == 1) //donc 100%
			$nb_ok = $nb_vg;


		$argent_user = $this->user_obj->user_infos->argent;

		if($dosage_vg == 0.2 && $dosage_pg == 0.8)
		{
			$prix_total_estimation_de_prod = Config::$prix_vingt_quatre_vingt * $nb_ok;
			$list_price_user = Config::$prix_vingt_quatre_vingt;
		}
		else if($dosage_vg == 0.5 && $dosage_pg == 0.5)
		{
			$prix_total_estimation_de_prod = Config::$prix_cinquante_cinquante * $nb_ok;
			$list_price_user = Config::$prix_cinquante_cinquante;
		}
		else if($dosage_vg == 0.8 && $dosage_pg == 0.2)
		{
			$prix_total_estimation_de_prod = Config::$prix_quatre_vingt_vingt * $nb_ok;
			$list_price_user = Config::$prix_quatre_vingt_vingt;
		}
		else if($dosage_vg == 1 && $dosage_pg == 1)
		{
			$prix_total_estimation_de_prod = Config::$prix_cent * $nb_ok;
			$list_price_user = Config::$prix_cent;
		}
		//donne le prix total que couterais toute la création de base dans cette sorte ci
		// il faut mtn déterminer si le joueur peux tout faire avec

		if($prix_total_estimation_de_prod <= $argent_user)
			return $nb_ok; // il peux de toute facon tout créer
		else
			return $nb_ok_after_calcule_argent = floor($argent_user / $list_price_user);
	}
}
