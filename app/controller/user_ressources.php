<?php
Class user_ressources extends user_batiments
{
	public function __construct()
	{
		parent::__construct();
	}


	public function calc_and_maj_ressource_user_in_db()
	{
		$production_vg_sec = round((($this->champ_glycerine->production /60)/60),3);
		$production_pg_sec = round((($this->usine_propylene->production /60)/60),3);


		//determine combien de ressource le joueur gagne en une seconde car dans la bsd c'est en heure
		//reset les ressources gangée à zero pour éviter les accumulation
		$ressource_win_culture_vg = 0;
		$ressource_win_usine_pg = 0;

		$ressource_win_culture_vg = round($this->user_infos->diff_time * $production_vg_sec, 3);
		$ressource_win_usine_pg = round($this->user_infos->diff_time * $production_pg_sec, 3);

		//on remet a 0 le temps de la derniere mise a jour
		$this->user_infos->diff_time = 0;
		$this->user_infos->last_connect = $this->user_infos->time_now;

		$new_numb_ressource_culture_vg = $this->user_infos->last_culture_vg + $ressource_win_culture_vg;
		$new_numb_ressource_usine_pg = $this->user_infos->last_usine_pg + $ressource_win_usine_pg;

		$req_sql = new stdClass;
		$req_sql->table = "login";
		$req_sql->where = "id = ".$this->user_infos->id;
		$req_sql->ctx = new stdClass;
		$req_sql->ctx->last_culture_vg = $new_numb_ressource_culture_vg;
		$req_sql->ctx->last_usine_pg = $new_numb_ressource_usine_pg;

		$this->update($req_sql);
		unset($req_sql);
	}



 	public function get_string_all_id_aromes()
 	{
 		$string_id_arome = "";
 		$req_sql = new stdClass();
		$req_sql->table = "aromes";
		$req_sql->var = "id";
		$array_id_arome = $this->select($req_sql);

		foreach($array_id_arome as $row_id_aromes)
		{
			$string_id_arome .= $row_id_aromes->id.",";
		}
		return $string_id_arome;
 	}




 	public function set_all_arome_for_tpl()
 	{
		$this->nb_arome_total = 0;


		$arome_list = new stdClass();
		$arome_list->table = "aromes";
		$arome_list->var = "id, marque, nom";
		$arome_list->order = "marque";
		$res_sql_arome_list = $this->select($arome_list);



		//recupere un tableau contenant tout les id des aromes disponible dans la table aromes
		$array_total_aromes = self::return_id_array_table_arome($res_sql_arome_list);

		//tri du tableau pour avoir les marque triée 
		$array_product_in_stock_tri = new ArrayObject($res_sql_arome_list);
		$array_product_in_stock_tri->asort();


		$tab_final_all_arome_traiter = array();
		$i = 0;

		foreach($array_product_in_stock_tri as $row)
		{
			if(!isset($tab_final_all_arome_traiter[$row->marque]))
			{
				$tab_final_all_arome_traiter[$row->marque] = array();
				end($tab_final_all_arome_traiter);
			}
			

			if(key($tab_final_all_arome_traiter) == $row->marque)
			{
				$name_image = $row->marque;
				$name_image .= "_".trim($row->nom).".jpg";
				$name_image = str_replace(" ", "_", $name_image);
				$name_image = mb_convert_case($name_image, MB_CASE_LOWER, "UTF-8"); 
				$name_image = "/images/aromes/".$row->marque."/".$name_image;

				$tab_final_all_arome_traiter[$row->marque][$i] = new stdClass();
				$tab_final_all_arome_traiter[$row->marque][$i]->nom = $row->nom;
				$tab_final_all_arome_traiter[$row->marque][$i]->id = $row->id;
				$tab_final_all_arome_traiter[$row->marque][$i]->img = $name_image;
				$tab_final_all_arome_traiter[$row->marque][$i]->marque = $row->marque;
			}
			$i++;
		}

		return $tab_final_all_arome_traiter;
 	}

	public function set_arome_acquis_for_tpl()
	{
		$this->nb_arome_total = 0;
		$this->nb_arome_total_acquis = 0;


		$arome_list = new stdClass();
		$arome_list->table = "aromes";
		$arome_list->var = "id, marque, nom";
		$arome_list->order = "marque";
		$res_sql_arome_list = $this->select($arome_list);

		//recupere un tableau avec les ids des aromes non posseder par le joueur
		//contient tout les id des aromes non connu
		$data_from_bsd = substr($this->user_infos->list_arome_not_have, 0,-1);
		$array_not_have = explode(",", $data_from_bsd);
		


		//recupere un tableau contenant tout les id des aromes disponible dans la table aromes
		$array_total_aromes = self::return_id_array_table_arome($res_sql_arome_list);

		//calcule la différence entre les deux et en ressort un tableau avec tout les id des aromes acquis
		$array_id_arome_acquis  = array_diff($array_total_aromes, $array_not_have);


		foreach($res_sql_arome_list as $key_aromes => $value_arome)
		{
			$this->nb_arome_total++;
			foreach($array_id_arome_acquis as $row_acquis)
			{
				if((string)$row_acquis == (string)$value_arome->id)
				{
					$this->nb_arome_total_acquis++;
					$tab_final_arome_acquis[] = $value_arome;
				}
			}
		}
		
		$tab_final_arome_acquis_traiter = array();
		$i=0;

		if(isset($tab_final_arome_acquis))
		{
			foreach($tab_final_arome_acquis as $row)
			{
				if(!isset($tab_final_arome_acquis_traiter[$row->marque]))
				{
					$tab_final_arome_acquis_traiter[$row->marque] = array();
					end($tab_final_arome_acquis_traiter);
				}

				if(key($tab_final_arome_acquis_traiter) == $row->marque)
				{
					$name_image = $row->marque;
					$name_image .= "_".trim($row->nom).".jpg";
					$name_image = str_replace(" ", "_", $name_image);
					$name_image = mb_convert_case($name_image, MB_CASE_LOWER, "UTF-8"); 
					$name_image = "/images/aromes/".$row->marque."/".$name_image;

					$tab_final_arome_acquis_traiter[$row->marque][$i] = new stdClass();
					$tab_final_arome_acquis_traiter[$row->marque][$i]->nom = $row->nom;
					$tab_final_arome_acquis_traiter[$row->marque][$i]->id = $row->id;
					$tab_final_arome_acquis_traiter[$row->marque][$i]->img = $name_image;
					$tab_final_arome_acquis_traiter[$row->marque][$i]->marque = $row->marque;

				}
				else
				{
					$tab_final_arome_acquis_traiter[$row->marque] = array();
					end($tab_final_arome_acquis_traiter);
				}
				$i++;
			}
			return $tab_final_arome_acquis_traiter;
		}
		else
		{
			return false;
		}
	}

	public function get_arome_win_for_tpl()
	{

		//traiement de la chaine pour la requete 
		$this->id_arome_win = explode(",", $this->user_infos->id_arome_win);
		$where = "";
		
		foreach($this->id_arome_win as $key => $row)
		{
			if($row == "")
				unset($this->id_arome_win[$key]);
			else
				$where .= " id = ".$row." AND";
		}
		$where = substr($where, 0, -3);

		$arome_win = new stdClass();
		$arome_win->table = "aromes";
		$arome_win->var = "id, marque, nom";
		$arome_win->order = "marque";
		$arome_win->where = $where;

		return $this->select($arome_win);
	}

	public function return_id_array_table_arome(&$array_aromes_trier)
	{
		$array_id_aromes = array();
		
		foreach($array_aromes_trier as $key_aromes => $value_aromes)
		{
			$array_id_aromes[] = $value_aromes->id;
		}
		return $array_id_aromes;
	}


	public function render_arome_win($tab_final_arome_acquis)
	{
		$tab_final_arome_acquis_traiter = array();
		$i=0;

		foreach($tab_final_arome_acquis as $row)
		{
			if(!isset($tab_final_arome_acquis_traiter[$row->marque]))
			{
				$tab_final_arome_acquis_traiter[$row->marque] = array();
				end($tab_final_arome_acquis_traiter);
			}

			if(key($tab_final_arome_acquis_traiter) == $row->marque)
			{
				$name_image = $row->marque;
				$name_image .= "_".trim($row->nom).".jpg";
				$name_image = str_replace(" ", "_", $name_image);
				$name_image = mb_convert_case($name_image, MB_CASE_LOWER, "UTF-8"); 
				$name_image = "/images/aromes/".$row->marque."/".$name_image;

				$tab_final_arome_acquis_traiter[$row->marque][$i] = new stdClass();
				$tab_final_arome_acquis_traiter[$row->marque][$i]->nom = $row->nom;
				$tab_final_arome_acquis_traiter[$row->marque][$i]->id = $row->id;
				$tab_final_arome_acquis_traiter[$row->marque][$i]->img = $name_image;
				$tab_final_arome_acquis_traiter[$row->marque][$i]->marque = $row->marque;

			}
			else
			{
				$tab_final_arome_acquis_traiter[$row->marque] = array();
				end($tab_final_arome_acquis_traiter);
			}
			$i++;
		}
		return $tab_final_arome_acquis_traiter;
	}



 	public function set_list_product_acquis_for_tpl()
 	{
 		//on genere le tab qui contiendra tout lesp rod
 		$array_product_in_stock = array();

		//on explode la liste des produit qui était sous forme de chaine
		if(isset($this->product->list_product) && $this->product->list_product != "")
		{
			$data_from_user_product = substr($this->product->list_product, 0,-1);
			$array_product_in_stock_not_traited = explode(",", $data_from_user_product);
		}
		else
		{
			return false;
		}


 		$i = 0;
 		foreach($array_product_in_stock_not_traited as $row_product)
		{
			preg_match('/\(([0-9]+):([0-9]+):([0-9]+):([0-9]+)\)/', $row_product, $match);

			$req_sql = new stdClass();
			$req_sql->table = "aromes";
			$req_sql->where = "id = '".$match[2]."'";
			$req_sql->var = "marque, nom";
			$res_sql = $this->select($req_sql);
			$res_sql = $res_sql[0];

			$array_product_in_stock[$i] = new stdClass();
			$array_product_in_stock[$i]->marque = $res_sql->marque;
			$array_product_in_stock[$i]->nom = $res_sql->nom;
			$array_product_in_stock[$i]->id = $match[2];
			$array_product_in_stock[$i]->nb = $match[1];
			$array_product_in_stock[$i]->base_bsd = $match[3];
			$array_product_in_stock[$i]->date_peremption = $match[4];

			if($match[3] == "2080")
				$match[3] = "20% VG / 80% PG";

			else if($match[3] == "5050")
				$match[3] = "50% VG / 50% PG";

			else if($match[3] == "8020")
				$match[3] = "80% VG / 20% PG";

			else if($match[3] == "1000")
				$match[3] = "100% VG / 0% PG";

			$array_product_in_stock[$i]->base = $match[3];
			$i++;
		}
		//ici on a générer avec des requeste le meme tableau mais avec toutes les infos du produict

		//tri du tableau pour avoir les marque triée 
		$array_product_in_stock_tri = new ArrayObject($array_product_in_stock);
		$array_product_in_stock_tri->asort();


		$tab_final_arome_acquis_traiter = array();
		$i = 0;

		foreach($array_product_in_stock_tri as $row)
		{
			if(!isset($tab_final_arome_acquis_traiter[$row->marque]))
			{
				$tab_final_arome_acquis_traiter[$row->marque] = array();
				end($tab_final_arome_acquis_traiter);
			}

			if(key($tab_final_arome_acquis_traiter) == $row->marque)
			{
				$name_image = $row->marque;
				$name_image .= "_".trim($row->nom).".jpg";
				$name_image = str_replace(" ", "_", $name_image);
				$name_image = mb_convert_case($name_image, MB_CASE_LOWER, "UTF-8"); 
				$name_image = "/images/aromes/".$row->marque."/".$name_image;

				$tab_final_arome_acquis_traiter[$row->marque][$i] = new stdClass();
				$tab_final_arome_acquis_traiter[$row->marque][$i]->nom = $row->nom;
				$tab_final_arome_acquis_traiter[$row->marque][$i]->id = $row->id;
				$tab_final_arome_acquis_traiter[$row->marque][$i]->img = $name_image;
				$tab_final_arome_acquis_traiter[$row->marque][$i]->marque = $row->marque;
				$tab_final_arome_acquis_traiter[$row->marque][$i]->nb =  $row->nb;
				$tab_final_arome_acquis_traiter[$row->marque][$i]->base = $row->base;
				$tab_final_arome_acquis_traiter[$row->marque][$i]->base_bsd = $row->base_bsd;
				$tab_final_arome_acquis_traiter[$row->marque][$i]->date_peremption_unix = $row->date_peremption;
				$tab_final_arome_acquis_traiter[$row->marque][$i]->date_peremption_to_rest = $this->convert_sec_unix_in_time_real_to_rest($row->date_peremption);

			}
			else
			{
				$tab_final_arome_acquis_traiter[$row->marque] = array();
				end($tab_final_arome_acquis_traiter);
			}
			$i++;
		}

		return $tab_final_arome_acquis_traiter;
 	}

	public function calcul_nb_product_total()
	{

		if(isset($this->product->list_product) && $this->product->list_product != "")
		{
			//mtn que l'on a la liste des product dispo de la table de l'user, on traie pour avoir un array propre id nb
			//on enleve la derniere virgule de la table
			$tmp_user_product_bsd = new StdClass;
			$tmp_user_product_bsd->list_product = new stdClass;
			$tmp_user_product_bsd->list_product = $this->product->list_product;

			$tmp_user_product_bsd->list_product = substr($tmp_user_product_bsd->list_product, 0, -1);
			$tmp_user_product_bsd->list_product = array(explode(",", $tmp_user_product_bsd->list_product));

			//un petit foreach sur le preg match pour récuper un tab propre avec les id et les nb
			//et calcule du nb total de product fini
			$array_final_id_nb = array();
			$total_nb_product = 0;
			foreach($tmp_user_product_bsd->list_product[0] as $row_product)
			{
				preg_match('/\(([0-9]+):([0-9]+):([0-9]+):([0-9]+)\)/', $row_product, $match);
				$total_nb_product += $match[1];
			}
			$this->user_infos->nb_product_total = $total_nb_product;
		}
		else
		{
			$this->user_infos->nb_product_total = '0';
		}
	}

	public function maj_product_list_in_bsd($id, $nb, $bases, $date_peremption, $ajout_or_delete = '+')
	{
		$tab_product_recept = array();
		$tab_product_recept["nb"] = $nb;
		$tab_product_recept["id"] = $id;
		$tab_product_recept["bases"] = $bases;
		$tab_product_recept["date_peremption"] = $date_peremption;


		// mais on en crée une copie pour pas foutr en l'air les autre fonction
		//on dois aller chehcer la liste à chauqe fois dans la base car le progamme n'a pas encore encoder les nouvelle donnée car scrpit pas fini
		$arome_win = new stdClass();
		$arome_win->table = "product";
		$arome_win->var = "*";
		$arome_win->where = "id_user = '".$this->user_infos->id."'";
		$tmp_user_product_bsd = $this->select($arome_win);
		$tmp_user_product_bsd = $tmp_user_product_bsd[0]->list_product;

		$tab_product_in_stock = array();

		if($tmp_user_product_bsd != "")
		{
			//on explode le string de la base de données des product pour travailler
			$tmp_user_product_bsd = substr($tmp_user_product_bsd, 0, -1);
			$tmp_user_product_bsd = array(explode(",", $tmp_user_product_bsd));

			$i = 0;


			//on forceah l'explode pour avoir un tab propre avec un matching
			foreach($tmp_user_product_bsd as $row_product)
			{
				foreach($row_product as $row)
				{
					preg_match('/\(([0-9]+):([0-9]+):([0-9]+):([0-9]+)\)/', $row, $match);
					$tab_product_in_stock[$i]["nb"] = $match[1];
					$tab_product_in_stock[$i]["id"] = $match[2];
					$tab_product_in_stock[$i]["bases"] = $match[3];
					$tab_product_in_stock[$i]["date_peremption"] = $match[4];
					$i++;
				}

			}
		}

		if($ajout_or_delete == '+')
		{
			if(isset($tab_product_in_stock[0]))
			{
				//on fait toutes les verif pour voir si on a déjà du produit et on ajoute ou supprime
				foreach($tab_product_in_stock as $key => $prod_in_stock)
				{
					if($prod_in_stock['id'] == $tab_product_recept['id'])
					{
						//on le possède en stock donc on peux vérif si la bases est la meme
						if($prod_in_stock['bases'] == $tab_product_recept['bases'])
						{

							if($prod_in_stock['date_peremption'] <= $tab_product_recept['date_peremption'])
							{
								$ajout = 0;
								continue;
							}
							else
							{
								//on ajoute simplement a NB le nouveau nombre
								$tab_product_in_stock[$key]['nb'] += $tab_product_recept['nb'];
								$ajout = 1;
								break;
							}
						}
						else
						{
							$ajout = 0;
							continue;
						}
					}
					else
					{
						$ajout = 0;
						continue;
					}
				}

				if($ajout == 0)
				{
					//ça veux dire que on a peux être le produits mais on l'as pas dans cette bases
					//dnc on dois le rajouter a la fin du tab
					array_push($tab_product_in_stock, $tab_product_recept);
				}
			}
			else
			{
				array_push($tab_product_in_stock, $tab_product_recept);
				//ici ça veux dire que l'on a rien comme produits, donc on peux ajouter direct;
			}
		}
		else if($ajout_or_delete == "-")
		{

			//ça veux dire que l'on veux delete du produits, attention que si l'on tombe à 0 il faut absolument supprimer la (50,50,50) de la bases
			if(isset($tab_product_in_stock[0]))
			{
				//on fait toutes les verif pour voir si on a déjà du produit et on ajoute ou supprime
				foreach($tab_product_in_stock as $key => $prod_in_stock)
				{
					if($prod_in_stock['id'] == $tab_product_recept['id'] && $prod_in_stock['bases'] == $tab_product_recept['bases'] && $prod_in_stock['date_peremption'] == $tab_product_recept['date_peremption'])
					{
						$tab_product_in_stock[$key]['nb'] -= $tab_product_recept['nb'];
						if($tab_product_in_stock[$key]['nb'] == "0")
						{
							unset($tab_product_in_stock[$key]);
						}	
					}
					else
						continue;
				}
			}
			else
			{
				//c'est impossible mais dans le doute
				$_SESSION['error'] = "une erreur est survenue, veuillez prendre contact avec l'administrateur";
			}
		}



		//il faut mettre la bases de données à jours apres avoir reconstruit la chaine de caractere
		$new_string_product_for_bsd = "";

		foreach($tab_product_in_stock as $new_row_product)
		{
			$new_string_product_for_bsd .= "(". implode(":", $new_row_product) ."),";
		}

		//on met a jour la base de données avec le noveau string des products
		$req_sql = new stdClass;
		$req_sql->ctx = new stdClass;
		$req_sql->ctx->list_product = $new_string_product_for_bsd;
		$req_sql->table = "product";
		$req_sql->where = "id_user = ".$this->user_infos->id;
		$this->update($req_sql);
		unset($req_sql);

	}


	public function maj_pipette($nb, $add_or_del = "-")
	{
		//function qui permet de rajouter ou d'enlever un nombre défini de pipette de remplissage
		if($add_or_del == "-")
		{
			$nb = (int) $nb;

			$req_sql = new stdClass;
			$req_sql->ctx = new stdClass;
			$req_sql->ctx->pipette = $this->hardware->pipette - $nb;
			$req_sql->table = "hardware";
			$req_sql->where = "id_user = ".$this->user_infos->id;
			$this->update($req_sql);
			unset($req_sql);
		}
		else
		{
			$nb = (int) $nb;

			$req_sql = new stdClass;
			$req_sql->ctx = new stdClass;
			$req_sql->ctx->pipette = $this->hardware->pipette + $nb;
			$req_sql->table = "hardware";
			$req_sql->where = "id_user = ".$this->user_infos->id;
			$this->update($req_sql);
			unset($req_sql);
		}
	}

	public function maj_flacon($nb, $add_or_del = "-")
	{
		//function qui permet de rajouter ou d'enlever un nombre défini de pipette de remplissage
		if($add_or_del == "-")
		{
			$nb = (int) $nb;

			$req_sql = new stdClass;
			$req_sql->ctx = new stdClass;
			$req_sql->ctx->flacon = $this->hardware->flacon - $nb;
			$req_sql->table = "hardware";
			$req_sql->where = "id_user = ".$this->user_infos->id;
			$this->update($req_sql);
			unset($req_sql);
		}
		else
		{
			$nb = (int) $nb;

			$req_sql = new stdClass;
			$req_sql->ctx = new stdClass;
			$req_sql->ctx->flacon = $this->hardware->flacon + $nb;
			$req_sql->table = "hardware";
			$req_sql->where = "id_user = ".$this->user_infos->id;
			$this->update($req_sql);
			unset($req_sql);
		}
	}

	public function maj_frigo($nb, $add_or_del = "-")
	{
		//function qui permet de rajouter ou d'enlever un nombre défini de pipette de remplissage
		if($add_or_del == "-")
		{
			$nb = (int) $nb;

			$req_sql = new stdClass;
			$req_sql->ctx = new stdClass;
			$req_sql->ctx->frigo = $this->hardware->frigo - $nb;
			$req_sql->table = "hardware";
			$req_sql->where = "id_user = ".$this->user_infos->id;
			$this->update($req_sql);
			unset($req_sql);
		}
		else
		{
			$nb = (int) $nb;

			$req_sql = new stdClass;
			$req_sql->ctx = new stdClass;
			$req_sql->ctx->frigo = $this->hardware->frigo + $nb;
			$req_sql->table = "hardware";
			$req_sql->where = "id_user = ".$this->user_infos->id;
			$this->update($req_sql);
			unset($req_sql);
		}
	}




 	public function verify_peremption_product()
 	{
 		if(isset($this->product->list_product) && !empty($this->product->list_product))
 		{
 			$list_product = $this->product->list_product;	


			//on explode le string de la base de données des product pour travailler
			$tmp_user_product_bsd = substr($list_product, 0, -1);
			$tmp_user_product_bsd = array(explode(",", $tmp_user_product_bsd));

			$tab_product_in_stock = array();
			$array_poubelle = array();
			$i = 0;
			$j = 0;
			foreach($tmp_user_product_bsd as $row_product)
			{
				foreach($row_product as $key_product => $value_product)
				{
					preg_match('/\(([0-9]+):([0-9]+):([0-9]+):([0-9]+)\)/', $value_product, $match);
					$tab_product_in_stock[$i]["nb"] = $match[1];
					$tab_product_in_stock[$i]["id"] = $match[2];
					$tab_product_in_stock[$i]["bases"] = $match[3];
					$tab_product_in_stock[$i]["date_peremption"] = $match[4];
					

					//mtn on va vérifié la date de préemption, ajouter un array dnas le user avec les produit périmé et les afficher dans un new onglet

					if($tab_product_in_stock[$i]["date_peremption"] < date("U"))
					{
						$array_poubelle[$j] = $value_product;
						//on l'ajoute au array poubelle et on le delete de l'autre array
						$this->maj_product_list_in_bsd($tab_product_in_stock[$i]["id"], $tab_product_in_stock[$i]["nb"], $tab_product_in_stock[$i]["bases"], $tab_product_in_stock[$i]["date_peremption"], $ajout_or_delete = '-');
						
						$j++;
					}

					$i++;
				}
			}
 		}
 		else
 			return 0;
 	}


	public function ajout_bases_in_bsd($row_post, $value_post, $moins_plus)
	{
		$stx_bases = "bases_".$row_post;
		$bases_before = $this->bases->$stx_bases;


		
		if($moins_plus == "-")
			$bases_after = $bases_before - $value_post;	

		else if($moins_plus == "+")
			$bases_after = $bases_before + $value_post;

		else
			$bases_after = $bases_before - $value_post;

		$req_sql = new stdClass;
		$req_sql->table = "bases";
		$req_sql->where = "id_user = '".$this->user_infos->id."'";
		$req_sql->ctx = new stdClass;
		$var_bsd = "bases_".$row_post;
		$req_sql->ctx->$var_bsd = $bases_after;
		$res_sql = $this->update($req_sql);
		unset($req_sql);
		//idealement recevra un tableau associatif avec le nom de la bses avec un autre array dedans  qui aura le prix total a déduire grace a la fct dans le bases module et la quantité a ajoutée en bases
	}

	public function verifiy_argent_user($value_verif)
	{
		if((int)$value_verif <= (int)$this->user_infos->argent)
			return 1;
		
		else
		{
			$_SESSION["error"] = "Erreur vous ne possédez pas assez d'argent pour tous créer";
			return 0;
		}
	}


	public function set_litter_vg($littre_vg_possible)
	{
		$req_sql = new stdClass;
		$req_sql->table = "login";
		$req_sql->where = "id = '".$this->user_infos->id."'";
		$req_sql->ctx = new stdClass;
		$req_sql->ctx->litter_vg = $this->user_infos->litter_vg + $littre_vg_possible;
		$res_sql = $this->update($req_sql);
		unset($req_sql);
	}

	public function set_litter_pg($littre_pg_possible)
	{
		$req_sql = new stdClass;
		$req_sql->table = "login";
		$req_sql->where = "id = '".$this->user_infos->id."'";
		$req_sql->ctx = new stdClass;
		$req_sql->ctx->litter_pg = $this->user_infos->litter_pg + $littre_pg_possible;
		$res_sql = $this->update($req_sql);
		unset($req_sql);
	}

	public function set_argent_user($prix_a_deduire, $moins_plus = "-")
	{
		

		$argent_before = $this->user_infos->argent;
		
		if($moins_plus == "-")
		{
			$this->set_point_user($prix_a_deduire);
			$argent_after = $argent_before - $prix_a_deduire;
		}
		else if($moins_plus == "+")
		{
			$this->set_point_user_vente($prix_a_deduire);
			$argent_after = $argent_before + $prix_a_deduire;
		}
			

		$req_sql = new stdClass;
		$req_sql->table = "login";
		$req_sql->where = "id = '".$this->user_infos->id."'";
		$req_sql->ctx = new stdClass;
		$req_sql->ctx->argent = $argent_after;
		$res_sql = $this->update($req_sql);
		unset($req_sql);
	}

	public function set_point_user($argent_depenser)
	{
		$point_before = $this->user_infos->point;
		$point_gagner = $argent_depenser/1000;
		$point_after = $point_before + $point_gagner;

		$req_sql = new stdClass;
		$req_sql->table = "login";
		$req_sql->where = "id = '".$this->user_infos->id."'";
		$req_sql->ctx = new stdClass;
		$req_sql->ctx->point = $point_after;
		$res_sql = $this->update($req_sql);
		unset($req_sql);
	}

	public function set_point_user_vente($argent_depenser)
	{
		$point_before = $this->user_infos->point_vente;
		$point_gagner = $argent_depenser/1000;
		$point_after = $point_before + $point_gagner;

		$req_sql = new stdClass;
		$req_sql->table = "login";
		$req_sql->where = "id = '".$this->user_infos->id."'";
		$req_sql->ctx = new stdClass;
		$req_sql->ctx->point_vente = $point_after;
		$res_sql = $this->update($req_sql);
		unset($req_sql);
	}


	public function set_ressource_brut_user($vg_to_operate = 0, $pg_to_operate = 0, $moins_plus = "-")
	{
		$vg_before = $this->user_infos->last_culture_vg;
		$pg_before = $this->user_infos->last_usine_pg;
		
		if($moins_plus == "-")
		{
			$pg_after = $pg_before - $pg_to_operate;
			$vg_after = $vg_before - $vg_to_operate;
		}
		else if($moins_plus == "+")
		{
			$pg_after = $pg_before + $pg_to_operate;
			$vg_after = $vg_before + $vg_to_operate;
		}
		else
		{
			$pg_after = $pg_before - $pg_to_operate;
			$vg_after = $vg_before - $vg_to_operate;
		}
		

		$req_sql = new stdClass;
		$req_sql->table = "login";
		$req_sql->where = "id = '".$this->user_infos->id."'";
		$req_sql->ctx = new stdClass;
		$req_sql->ctx->last_culture_vg = $vg_after;
		$req_sql->ctx->last_usine_pg = $pg_after;
		$res_sql = $this->update($req_sql);
		unset($req_sql);

		
	}

	public function set_ressource_litter_user($litter_vg_to_operate = 0, $litter_pg_to_operate = 0, $moins_plus = "-")
	{
		$vg_before = $this->user_infos->litter_vg;
		$pg_before = $this->user_infos->litter_pg;
		
		if($moins_plus == "-")
		{
			$pg_after = $pg_before - $litter_pg_to_operate;
			$vg_after = $vg_before - $litter_vg_to_operate;
		}
		else if($moins_plus == "+")
		{
			$pg_after = $pg_before + $litter_pg_to_operate;
			$vg_after = $vg_before + $litter_vg_to_operate;
		}
		else
		{
			$pg_after = $pg_before - $litter_pg_to_operate;
			$vg_after = $vg_before - $litter_vg_to_operate;
		}
		
		$req_sql = new stdClass;
		$req_sql->table = "login";
		$req_sql->where = "id = '".$this->user_infos->id."'";
		$req_sql->ctx = new stdClass;
		$req_sql->ctx->litter_vg = $vg_after;
		$req_sql->ctx->litter_pg = $pg_after;
		$res_sql = $this->update($req_sql);
		unset($req_sql);
		
	}
}
