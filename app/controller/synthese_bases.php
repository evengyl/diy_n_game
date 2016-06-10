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

		
		
		if(isset($_POST)) 
			$this->recept_form_with_bases_to_create($_POST);

		//va seter dans $this->user_obj->littre_vg_possible et $this->user_obj->littre_pg_possible la quantité de matiere brut que le joueur peu avoir
		$this->calcul_nb_bases_in_litter_to_create();


		$this->nb_to_create[2080] = $this->nb_vingt_quatre_vingt();
		$this->nb_to_create[5050] = $this->nb_cinquante_cinquante();
		$this->nb_to_create[8020] = $this->nb_quatre_vingt_vingt();
		$this->nb_to_create[1000] = $this->nb_bases_at_cent_vg();


		if($this->cout_total_vg != 0 || $this->cout_total_pg != 0)
		{
			//il faut mtn appliquer la réduction de cout du labos
			$this->set_ressource_user($this->cout_total_vg, $this->cout_total_pg, $moins_plus = "-");
		}
			

		return $this->assign_var("nb_to_create", $this->nb_to_create)->render();
	}

	public function set_reduction_coup_with_labos($total, $pourcent_down)
	{
		affiche_pre($pourcent_down);
		$total_reduc = $total / 100;
		$total = $total - $total_reduc;

		return intval($total);
	}

	public function calcul_nb_bases_in_litter_to_create()
	{
		//il faut vérifier si il a assez d'argnet également

		//mise en tmp des ressources actuel pour éviter les erreurs
		$plante_stock = $this->user_obj->user_infos->last_culture_vg;
		$propylene_stock = $this->user_obj->user_infos->last_usine_pg;
		
		affiche_pre($this->nb_plantes_for_littre);
		affiche_pre($this->nb_propylene_for_littre);
		$this->littre_vg_possible = floor(round($plante_stock / $this->nb_plantes_for_littre, 2));
		$this->littre_pg_possible = floor(round($propylene_stock / $this->nb_propylene_for_littre, 2));

		affiche_pre($this->littre_vg_possible);
		affiche_pre($this->littre_pg_possible);


		if($this->littre_vg_possible <= 0 || $this->littre_pg_possible <= 0)
		{
			$_SESSION['error_bases_down'] = "Infos : Vous devrier construire plus de batiments de production";	
		}
		else if($this->littre_vg_possible <= 0 && $this->littre_pg_possible > 0)
		{
			$_SESSION['error_bases_down'] = "Astuce : Vous devriez construire plus de champs à Glycérine";
		}
		else if($this->littre_vg_possible > 0 && $this->littre_pg_possible <= 0)
		{
			$_SESSION['error_bases_down'] = "Astuce : Vous devriez construire plus d'usine à propylène";	
		}
		else
		{
			$this->user_obj->littre_vg_possible = $this->littre_vg_possible;
			$this->user_obj->littre_pg_possible = $this->littre_pg_possible;
		}
		//va renvoyer directement au template un Obj , contenant le nombre de bases uqe le joueur peux creer de chaque, définir les prix ici même dans ce controller pour changement facile 
	}

	public function recept_form_with_bases_to_create($post)
	{
		if(isset($post['create_bases']))
		{
			unset($post['create_bases']);
			foreach($post as $name_form_bases => $value_form_bases)
			{
				if($this->calcul_price_total_cost_bases($name_form_bases, intval($value_form_bases)))
				{
					$this->calcul_cost_ressource($name_form_bases, intval($value_form_bases));
					$this->ajout_bases_in_bsd($name_form_bases, intval($value_form_bases), "+");
					unset($_POST);
				}
				else
				{
					return 0;
				}
				
			}
		}
		//faudra appeler cette fct set_ressource_user($vg_to_operate, $pg_to_operate, $moins_plus = "-")
			//ici recevra le formulaire rempli avec les bases a crées, elle seront passiblement les meme que le mex aposible mais vérifier tout les cas on sais jamais
		//va appeler la fonction de calcule de prix pour chaque champs et recevra en echange le prix total
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

	public function calcul_price_total_cost_bases($row_post, $value_post)
	{
		if($value_post >= 0)
		{
			//operation
			if($value_post > $this->nb_to_create[$row_post])
			{
				$_SESSION["error"] = "Erreur vous ne possédez pas assez de ressources pour tous créer";
				return 0;
			}
			else
			{
				//déduction de l'argnet et des ressource		
				$total_price = 0;		
				if($row_post == 2080)
					$total_price += $this->prix_vingt_quatre_vingt * $value_post;

				else if($row_post == 5050)
					$total_price += $this->prix_cinquante_cinquante * $value_post;

				else if($row_post == 8020)
					$total_price += $this->prix_quatre_vingt_vingt * $value_post;

				else if($row_post == 1000)
					$total_price += $this->prix_cent * $value_post;

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
		}
		//calculera le prix que coutera la synthese des bases et renverra a la fct précédente
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

	public function nb_vingt_quatre_vingt()
	{
		//calcule sur bases des littre de bases que le joueur possède , le nombre de bases en 20/80 qu'il peux faire
		$nb_vg = floor($this->user_obj->littre_vg_possible /0.2);
		$nb_pg = floor($this->user_obj->littre_pg_possible /0.8);

		if($nb_vg > $nb_pg)
			$nb_ok = $nb_pg;

		else if($nb_vg < $nb_pg)
			$nb_ok = $nb_vg;

		else
			$nb_ok = $nb_vg;

		$argent_user = $this->user_obj->user_infos->argent;
		$prix_total_estimation_de_prod = $this->prix_vingt_quatre_vingt * $nb_ok;
		//donne le prix total que couterais toute la création de base dans cette sorte ci
		// il faut mtn déterminer si le joueur peux tout faire avec

		if($prix_total_estimation_de_prod <= $argent_user || $prix_total_estimation_de_prod == $argent_user)
		{
			return $nb_ok; // il peux de toute facon tout créer
		}
		else
		{
			return $nb_ok_after_calcule_argent = floor($argent_user / $this->prix_vingt_quatre_vingt);
			//il faut déterminer cmb il peux en faire avec sont argent
		}


	}

	public function nb_cinquante_cinquante()
	{
		//calcule sur bases des littre de bases que le joueur possède , le nombre de bases en 50/50 qu'il peux faire
		$nb_vg = floor($this->user_obj->littre_vg_possible /0.5);
		$nb_pg = floor($this->user_obj->littre_pg_possible /0.5);

		if($nb_vg > $nb_pg)
			$nb_ok = $nb_pg;

		else if($nb_vg < $nb_pg)
			$nb_ok = $nb_vg;

		else
			$nb_ok = $nb_vg;

		$argent_user = $this->user_obj->user_infos->argent;
		$prix_total_estimation_de_prod = $this->prix_cinquante_cinquante * $nb_ok;
		//donne le prix total que couterais toute la création de base dans cette sorte ci
		// il faut mtn déterminer si le joueur peux tout faire avec

		if($prix_total_estimation_de_prod <= $argent_user || $prix_total_estimation_de_prod == $argent_user)
		{
			return $nb_ok; // il peux de toute facon tout créer
		}
		else
		{
			return $nb_ok_after_calcule_argent = floor($argent_user / $this->prix_cinquante_cinquante);
			//il faut déterminer cmb il peux en faire avec sont argent
		}

	}

	public function nb_quatre_vingt_vingt()
	{
		//calcule sur bases des littre de bases que le joueur possède , le nombre de bases en 80/20 qu'il peux faire
		$nb_vg = floor($this->user_obj->littre_vg_possible /0.8);
		$nb_pg = floor($this->user_obj->littre_pg_possible /0.2);

		if($nb_vg > $nb_pg)
			$nb_ok = $nb_pg;

		else if($nb_vg < $nb_pg)
			$nb_ok = $nb_vg;
		
		else
			$nb_ok = $nb_vg;

		$argent_user = $this->user_obj->user_infos->argent;
		$prix_total_estimation_de_prod = $this->prix_quatre_vingt_vingt * $nb_ok;
		//donne le prix total que couterais toute la création de base dans cette sorte ci
		// il faut mtn déterminer si le joueur peux tout faire avec

		if($prix_total_estimation_de_prod <= $argent_user || $prix_total_estimation_de_prod == $argent_user)
		{
			return $nb_ok; // il peux de toute facon tout créer
		}
		else
		{
			return $nb_ok_after_calcule_argent = floor($argent_user / $this->prix_quatre_vingt_vingt);
			//il faut déterminer cmb il peux en faire avec sont argent
		}
	}

	public function nb_bases_at_cent_vg()
	{
		//calcule sur bases des littre de bases que le joueur possède , le nombre de bases en 100/0 qu'il peux faire
		$nb_ok = floor($this->user_obj->littre_vg_possible);

		$argent_user = $this->user_obj->user_infos->argent;
		$prix_total_estimation_de_prod = $this->prix_cent * $nb_ok;
		//donne le prix total que couterais toute la création de base dans cette sorte ci
		// il faut mtn déterminer si le joueur peux tout faire avec

		if($prix_total_estimation_de_prod <= $argent_user || $prix_total_estimation_de_prod == $argent_user)
		{
			return $nb_ok; // il peux de toute facon tout créer
		}
		else
		{
			return $nb_ok_after_calcule_argent = floor($argent_user / $this->prix_cent);
			//il faut déterminer cmb il peux en faire avec sont argent
		}

	}

}
