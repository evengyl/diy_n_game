<?php 

Class synthese_bases extends base_module
{
	public $littre_vg_possible = 0;
	public $littre_pg_possible = 0;

	public	$cout_total_vg = 0;
	public	$cout_total_pg = 0;

	public $nb_base_wish_to_create = array();



	public function __construct()
	{	

		parent::__construct(__CLASS__);
		//cette fonctions va vérifier si le client a assez d'argnet et combien de base il peux creer en dependant de son argent

		//va calculer cmb le joueur peux creer avec ses bases et sont argent
		if($this->user_infos->litter_vg >= 1)
		{
			$this->nb_base_wish_to_create = $this->calcul_nb_bases_possible_to_create($this->user_infos->litter_vg, $this->user_infos->litter_pg, $this->user_infos->argent);
		}
		else
		{
			$this->nb_base_wish_to_create[2080] = 0;
			$this->nb_base_wish_to_create[5050] = 0;
			$this->nb_base_wish_to_create[8020] = 0;
			$this->nb_base_wish_to_create[1000] = 0;
		}
		


		foreach($this->nb_base_wish_to_create as $key => $values)
		{
			if($values == 0)
				$_SESSION["little_infos"] = "Vous ne possédez pas assez de ressource  pour créer chaque sorte de bases";
		}

		// envoi le formulaire contenant ce que le joueur veux creer
		if(isset($_POST['convert_all_in_littre']))
		{
			$this->convert_all_ressource_in_littre($_POST['to_convert']);
		}

		if(isset($_POST['create_bases'])) 
		{
			$this->recept_form_with_bases_to_create($_POST);
		}

		return $this->assign_var("nb_base_wish_to_create", $this->nb_base_wish_to_create)->assign_var("user", $this)->render();
	}


	
	public function convert_all_ressource_in_littre($name_to_create)
	{
		if($name_to_create == 'vg')
		{
			$plante_stock = $this->user_infos->last_culture_vg;
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
			$propylene_stock = $this->user_infos->last_usine_pg;
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

		foreach($post as $name_bases => $nb_bases)
		{
			if(intval($nb_bases) > 0)
			{
				$total_price = $this->calcul_price_total_cost_bases($name_bases, intval($nb_bases));
				
				if($total_price != 0)
				{
					$this->calcul_cost_ressource_and_set_total($name_bases, intval($nb_bases));

					//set dans la base de données les bases creer
					if($this->cout_total_vg != 0 || $this->cout_total_pg != 0)
					{
						$this->set_ressource_litter_user($this->cout_total_vg, $this->cout_total_pg, $moins_plus = "-");
					}

					user_ressources::ajout_bases_in_bsd($name_bases, intval($nb_bases), "+");
					//set dans la base de données l'argnet que ça à couté
					$this->set_argent_user($total_price, "-");
					unset($_POST);
				}
			}
		}
	}



	public function calcul_price_total_cost_bases($name_form_bases, $nb_form_bases)
	{

			//operation
			if($nb_form_bases > $this->nb_base_wish_to_create[$name_form_bases])
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
				if($this->user_infos->argent >= $total_price)
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






	public function calcul_nb_bases_possible_to_create($litter_vg, $litter_pg, $argent)
	{

		$tab_bases = array("2080", "5050", "8020", "1000");
		foreach($tab_bases as $row_bases)
		{
			if($row_bases == "2080")
			{
				$nb_bases_ok_vg = $litter_vg / 0.2;
				$nb_bases_ok_pg = $litter_pg / 0.8;

				if($nb_bases_ok_vg <= $nb_bases_ok_pg)
					$nb_bases_ok = $nb_bases_ok_vg;
				else
					$nb_bases_ok = $nb_bases_ok_pg;

				if($argent >= ($nb_bases_ok * Config::$prix_vingt_quatre_vingt))
					$tab_bases['2080'] = $nb_bases_ok;
				else
					$tab_bases['2080'] = $argent / Config::$prix_vingt_quatre_vingt;
			}	

			if($row_bases == "5050")
			{
				$nb_bases_ok_vg = $litter_vg / 0.5;			
				$nb_bases_ok_pg = $litter_pg / 0.5;

				if($nb_bases_ok_vg <= $nb_bases_ok_pg)
					$nb_bases_ok = $nb_bases_ok_vg;
				else
					$nb_bases_ok = $nb_bases_ok_pg;

				if($argent >= ($nb_bases_ok * Config::$prix_cinquante_cinquante))
					$tab_bases['5050'] = $nb_bases_ok;
				else
					$tab_bases['5050'] = $argent / Config::$prix_cinquante_cinquante;
			}	

			if($row_bases == "8020")
			{
				$nb_bases_ok_vg = $litter_vg / 0.8;
				$nb_bases_ok_pg = $litter_pg / 0.2;

				if($nb_bases_ok_vg <= $nb_bases_ok_pg)
					$nb_bases_ok = $nb_bases_ok_vg;
				else
					$nb_bases_ok = $nb_bases_ok_pg;

				if($argent >= ($nb_bases_ok * Config::$prix_quatre_vingt_vingt))
					$tab_bases['8020'] = $nb_bases_ok;
				else
					$tab_bases['8020'] = $argent / Config::$prix_quatre_vingt_vingt;
			}	


			if($row_bases == "1000")
			{
				$nb_bases_ok_vg = $litter_vg;
				$nb_bases_ok_pg = $litter_vg;

				if($nb_bases_ok_vg <= $nb_bases_ok_pg)
					$nb_bases_ok = $nb_bases_ok_vg;
				else
					$nb_bases_ok = $nb_bases_ok_pg;

				if($argent >= ($nb_bases_ok * Config::$prix_cent))
					$tab_bases['1000'] = $nb_bases_ok;
				else
					$tab_bases['1000'] = $argent / Config::$prix_cent;
			}
		}

		unset($tab_bases[0], $tab_bases[1], $tab_bases[2], $tab_bases[3]);

		return $tab_bases;
	}
}
