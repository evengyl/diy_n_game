<?php
Class user_ressources extends user
{
	public $time_now;

	public function __construct($user)
	{
		$this->time_now = date("U");

		//si je fait comme ça avec le user et le break je ne for que le user infos comme voulu !! <3
		//car le user infos c'est le premier objet set dans le user
		if(isset($user))
		{
			$this->set_tab_prod_vg($user->user_infos->level_culture_vg, $user);
			$this->set_tab_prod_pg($user->user_infos->level_usine_pg, $user);
			$this->set_tab_labos($user->user_infos->level_labos_bases, $user);
			$this->verify_peremption_product($user);

			foreach($user as $row_user)
			{
				$this->calc_and_maj_ressource_user_in_db($row_user, $user);
				break;
			}

			//calcule le nombre de produits que le user à au total
			$this->calcul_nb_product_total($user);
		}
	}

	

	public function calc_and_maj_ressource_user_in_db($row_user, $user)
	{
		$production_vg_sec = round((($user->champ_glycerine->production /60)/60),3);
		$production_pg_sec = round((($user->usine_propylene->production /60)/60),3);


		//determine combien de ressource le joueur gagne en une seconde car dans la bsd c'est en heure
		//reset les ressources gangée à zero pour éviter les accumulation
		$ressource_win_culture_vg = 0;
		$ressource_win_usine_pg = 0;

		$ressource_win_culture_vg = round($row_user->diff_time * $production_vg_sec, 3);
		$ressource_win_usine_pg = round($row_user->diff_time * $production_pg_sec, 3);

		//on remet a 0 le temps de la derniere mise a jour
		$row_user->diff_time = 0;
		$row_user->last_connect = $this->time_now;


		$new_numb_ressource_culture_vg = $row_user->last_culture_vg + $ressource_win_culture_vg;
		$new_numb_ressource_usine_pg = $row_user->last_usine_pg + $ressource_win_usine_pg;

		$req_sql = new stdClass;
		$req_sql->table = "login";
		$req_sql->where = "id = ".$row_user->id;
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

	public function set_arome_acquis_for_tpl($user)
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
		$data_from_bsd = substr($user->user_infos->list_arome_not_have, 0,-1);
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

	public function get_arome_win_for_tpl(&$user)
	{

		//traiement de la chaine pour la requete 
		$user->id_arome_win = explode(",", $user->user_infos->id_arome_win);
		$where = "";
		
		foreach($user->id_arome_win as $key => $row)
		{
			if($row == "")
				unset($user->id_arome_win[$key]);
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



 	public function set_list_product_acquis_for_tpl($user)
 	{
 		//on genere le tab qui contiendra tout lesp rod
 		$array_product_in_stock = array();

		//on explode la liste des produit qui était sous forme de chaine
		if(isset($user->product->list_product) && $user->product->list_product != "")
		{
			$data_from_user_product = substr($user->product->list_product, 0,-1);
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
				$tab_final_arome_acquis_traiter[$row->marque][$i]->date_peremption_to_rest = Base_module::convert_sec_unix_in_time_real_to_rest($row->date_peremption);

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

	public function calcul_nb_product_total($user)
	{

		if(isset($user->product->list_product) && $user->product->list_product != "")
		{
			//mtn que l'on a la liste des product dispo de la table de l'user, on traie pour avoir un array propre id nb
			//on enleve la derniere virgule de la table
			$tmp_user_product_bsd = new StdClass;
			$tmp_user_product_bsd->list_product = new stdClass;
			$tmp_user_product_bsd->list_product = $user->product->list_product;

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
			$user->user_infos->nb_product_total = $total_nb_product;
		}
		else
		{
			$user->user_infos->nb_product_total = '0';
		}
	}

	public function maj_product_list_in_bsd($id, $nb, $bases, $date_peremption, $ajout_or_delete = '+', $user)
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
		$arome_win->where = "id_user = '".$user->user_infos->id."'";
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
		$req_sql->where = "id_user = ".$user->user_infos->id;
		$this->update($req_sql);
		unset($req_sql);

	}


	public function maj_pipette($nb, $add_or_del = "-", $user)
	{
		//function qui permet de rajouter ou d'enlever un nombre défini de pipette de remplissage
		if($add_or_del == "-")
		{
			$nb = (int) $nb;

			$req_sql = new stdClass;
			$req_sql->ctx = new stdClass;
			$req_sql->ctx->pipette = $user->hardware->pipette - $nb;
			$req_sql->table = "hardware";
			$req_sql->where = "id_user = ".$user->user_infos->id;
			$this->update($req_sql);
			unset($req_sql);
		}
		else
		{
			$nb = (int) $nb;

			$req_sql = new stdClass;
			$req_sql->ctx = new stdClass;
			$req_sql->ctx->pipette = $user->hardware->pipette + $nb;
			$req_sql->table = "hardware";
			$req_sql->where = "id_user = ".$user->user_infos->id;
			$this->update($req_sql);
			unset($req_sql);
		}
	}

	public function maj_flacon($nb, $add_or_del = "-", $user)
	{
		//function qui permet de rajouter ou d'enlever un nombre défini de pipette de remplissage
		if($add_or_del == "-")
		{
			$nb = (int) $nb;

			$req_sql = new stdClass;
			$req_sql->ctx = new stdClass;
			$req_sql->ctx->flacon = $user->hardware->flacon - $nb;
			$req_sql->table = "hardware";
			$req_sql->where = "id_user = ".$user->user_infos->id;
			$this->update($req_sql);
			unset($req_sql);
		}
		else
		{
			$nb = (int) $nb;

			$req_sql = new stdClass;
			$req_sql->ctx = new stdClass;
			$req_sql->ctx->flacon = $user->hardware->flacon + $nb;
			$req_sql->table = "hardware";
			$req_sql->where = "id_user = ".$user->user_infos->id;
			$this->update($req_sql);
			unset($req_sql);
		}
	}

	public function maj_frigo($nb, $add_or_del = "-", $user)
	{
		//function qui permet de rajouter ou d'enlever un nombre défini de pipette de remplissage
		if($add_or_del == "-")
		{
			$nb = (int) $nb;

			$req_sql = new stdClass;
			$req_sql->ctx = new stdClass;
			$req_sql->ctx->frigo = $user->hardware->frigo - $nb;
			$req_sql->table = "hardware";
			$req_sql->where = "id_user = ".$user->user_infos->id;
			$this->update($req_sql);
			unset($req_sql);
		}
		else
		{
			$nb = (int) $nb;

			$req_sql = new stdClass;
			$req_sql->ctx = new stdClass;
			$req_sql->ctx->frigo = $user->hardware->frigo + $nb;
			$req_sql->table = "hardware";
			$req_sql->where = "id_user = ".$user->user_infos->id;
			$this->update($req_sql);
			unset($req_sql);
		}
	}




 	public function verify_peremption_product($user)
 	{
 		if(isset($user->product->list_product) && !empty($user->product->list_product))
 		{
 			$list_product = $user->product->list_product;	


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
						$this->maj_product_list_in_bsd($tab_product_in_stock[$i]["id"], $tab_product_in_stock[$i]["nb"], $tab_product_in_stock[$i]["bases"], $tab_product_in_stock[$i]["date_peremption"], $ajout_or_delete = '-', $user);
						
						$j++;
					}

					$i++;
				}
			}
 		}
 		else
 			return 0;
 	}



 	public function set_tab_prod_vg($level_champ_glycerine, $user)
 	{
		$tmp_level = $level_champ_glycerine;
		$obj_user_prod_vg = new stdClass();
		$obj_user_prod_vg->level = $tmp_level;
		$obj_user_prod_vg->production = floor(((pow($tmp_level,1.6) * 42)) * Config::$rate_vg_prod);
		$obj_user_prod_vg->prix = floor((pow($tmp_level,2.1) * 42));
		$obj_user_prod_vg->time_construct = floor(((pow($tmp_level,2) * 42)) * 4);
		$user->champ_glycerine = $obj_user_prod_vg;
 	}


 	public function set_tab_prod_pg($level_usine_propylene, $user)
 	{
		$tmp_level = $level_usine_propylene;
		$obj_user_prod_pg = new stdClass();
		$obj_user_prod_pg->level = $tmp_level;
		$obj_user_prod_pg->production = floor(((pow($tmp_level,1.4) * 42)) * Config::$rate_pg_prod);
		$obj_user_prod_pg->prix = floor((pow($tmp_level,2.2) * 42));
		$obj_user_prod_pg->time_construct = floor(((pow($tmp_level,2) * 42)) * 4.5);
		$user->usine_propylene = $obj_user_prod_pg;
 	}


 	public function set_tab_labos($level_labos_bases, $user)
 	{
		$tmp_level = $level_labos_bases;
		$obj_user_labos = new stdClass();
		$obj_user_labos->level = $tmp_level;
		$obj_user_labos->pourcent_down = $tmp_level * Config::$rate_labos_pourcent_down;
		$obj_user_labos->prix = floor((pow($tmp_level,2.5) * 42));
		$obj_user_labos->time_construct = floor(((pow($tmp_level,2) * 42)) * 6);
		$user->labos_bases = $obj_user_labos;
 	}
}
