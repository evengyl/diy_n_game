<?php
Class user_ressources extends user
{
	public $time_now;
	public function __construct($user)
	{
		if(Config::$is_connect == 1)
		{
			$this->time_now = date("U");

			//si je fait comme ça avec le user et le break je ne for que le user infos comme voulu !! <3
			//car le user infos c'est le premier objet set dans le user
			if(isset($user))
			{
				foreach($user as $row_user)
				{
					$this->calc_diff_time($row_user);
					$this->maj_time_last_connect_in_db($row_user);

					//calcule combien de ressource le joueur gagne en seconde;
					$row_user->production_vg_sec = $this->calc_ressource_per_sec_vg($user->champ_glycerine->production);
					$row_user->production_pg_sec = $this->calc_ressource_per_sec_pg($user->usine_propylene->production);

					//calcule combien il en a gagner depuis la derniere mise a jours des ressources
					$this->calc_ressource_win($row_user);
					$this->maj_ressource_in_db($row_user);
					break;
				}
			}
	
		}
	}

	

	private function maj_ressource_in_db($row_user)
	{
		$req_sql = new stdClass;
		$req_sql->ctx = new stdClass;

		$row_user->new_numb_ressource_culture_vg = $row_user->last_culture_vg + $row_user->ressource_win_culture_vg;
		$row_user->new_numb_ressource_usine_pg = $row_user->last_usine_pg + $row_user->ressource_win_usine_pg;

		$req_sql->ctx->last_culture_vg = $row_user->new_numb_ressource_culture_vg;
		$req_sql->ctx->last_usine_pg = $row_user->new_numb_ressource_usine_pg;

		$req_sql->table = "login";
		$req_sql->where = "id = ".$row_user->id;
		$this->update($req_sql);
		unset($req_sql);
	}

	private function calc_ressource_win($row_user)
	{
		//determine combien de ressource le joueur gagne en une seconde car dans la bsd c'est en heure



		//reset les ressources gangée à zero pour éviter les accumulation
		$row_user->ressource_win_culture_vg = 0;
		$row_user->ressource_win_usine_pg = 0;

		$row_user->ressource_win_culture_vg = round($row_user->diff_time * $row_user->production_vg_sec, 3);
		$row_user->ressource_win_usine_pg = round($row_user->diff_time * $row_user->production_pg_sec, 3);

		//on remet a 0 le temps de la derniere mise a jour
		$row_user->diff_time = 0;
		$row_user->last_connect = $this->time_now;

		
	}

	private function calc_ressource_per_sec_vg($production_vg)
	{
		return round((($production_vg /60)/60),3);
	}

	private function calc_ressource_per_sec_pg($production_pg)
	{
		return round((($production_pg /60)/60),3);
	}

	private function maj_avertissement($row_user)
	{
		$req_sql = new stdClass;
		$req_sql->ctx = new stdClass;
		$old_values_avertissement = $row_user->avertissement;
		$req_sql->ctx->avertissement = $old_values_avertissement+1;
		$req_sql->ctx->last_connect = $this->time_now;
		$req_sql->table = "login";
		$req_sql->where = "id = ".$row_user->id;
		$this->update($req_sql);
		unset($req_sql);
		//met dans la base de donnée un petit +1 pour avertissement
	}

	private function calc_diff_time($row_user)
	{
		if($this->time_now > $row_user->last_connect)
		{
			$row_user->diff_time = 0;
			$row_user->diff_time = $this->time_now - $row_user->last_connect;
		}
		else if($this->time_now == $row_user->last_connect)
		{
			$row_user->diff_time = 0;
		}
		else
		{
			$row_user->diff_time = 0;
			$subject = "Attention le joueur : ".$row_user->login." a un last connect plus grand que le time UNIX , il s'agit ou d'une erreur ou d'une piratage des données.";
			mail(parent::$mail, "Message d'erreur du site Diy N Game.", $subject);
			?><script>alert("Une erreur est survenue ou alors vous avez tenté de faire les petits malins... première avertissement...")</script><?
			$this->maj_avertissement($row_user);
		}

		//quand on a set le temps de différence , on remet a jour le temps dans la base de données a date time stamp pour que le calcule 
		//de la différence de temps soit correct
	}

	private function maj_time_last_connect_in_db($row_user)
	{

		//sert a set au time now la base de donnée last connect
		$req_sql = new stdClass;
		$req_sql->ctx = new stdClass;
		$req_sql->ctx->last_connect = date("U");
		$req_sql->table = "login";
		$req_sql->where = "id = ".$row_user->id;
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
		$array_total_aromes = $this->return_id_array_table_arome($res_sql_arome_list);

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
		
		$tab_final_arome_acquis_traiter = user_ressources::traitement_array_final_aromes($tab_final_arome_acquis);
		return $tab_final_arome_acquis_traiter;
	}


	public function traitement_array_final_aromes($tab_final_arome_acquis)
	{
		//astuce pour ne pas avoir un element en moins dans le tableau lors de la premire passe pour inscrire le nom de la marque dans le tab

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


}
