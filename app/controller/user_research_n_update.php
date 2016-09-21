<?php


Class user_research_n_update extends user
{
	public $time_now = 0;

	public function __construct($user)
	{
		$this->time_now = date("U");
		$this->validate_update($user);
		$this->validate_search_arome($user);
	}



	public function validate_update($user)
	{
		$req_sql = new stdClass;
		$req_sql->table = "update_en_cours";
		$req_sql->var = "*";
		$req_sql->where = "id_user= '".$user->user_infos->id."'";
		$res_sql = all_query::select($req_sql);
		unset($req_sql);


		if(!empty($res_sql))
		{
			foreach($res_sql as $row_update)
			{
				if($row_update->time_finish <= $this->time_now)
				{
					//on indique dans la base que le level est changer 
					$set_level_up = $user->amelioration_var_config->{$row_update->name_batiment}+1;
					$req_sql = new stdClass;
					$req_sql->table = "amelioration_var_config";
					$req_sql->where = "id_user = '".$row_update->id_user."'";
					$req_sql->ctx = new stdClass;
					$req_sql->ctx->{$row_update->name_batiment} = $set_level_up;
					all_query::update($req_sql);

					//et on delete la ligne qui est finie;
					$del_sql = new stdClass;
					$del_sql->table = "update_en_cours";
					$del_sql->where = "id = '".$row_update->id."' AND id_user = '".$user->user_infos->id."'";
					all_query::delete($del_sql);
				}
			}
		}		
	}

	public function validate_search_arome($user)
	{
		$req_sql = new stdClass;
		$req_sql->table = "search_arome";
		$req_sql->var = "*";
		$req_sql->where = "id_user= '".$user->user_infos->id."'";
		$res_sql = all_query::select($req_sql);
		unset($req_sql);


		if(!empty($res_sql))
		{
			foreach($res_sql as $row_search)
			{
				if($row_search->time_finish <= $this->time_now)
				{
					$array_arome_not_have = array();

					$this->search_arome = new stdClass();
					$req_sql = new stdClass;
					$req_sql->table = "login";
					$req_sql->var = "list_arome_not_have";
					$req_sql->where = "id = '".$user->user_infos->id."'";
					$res_fx = all_query::select($req_sql);

					if(!empty($res_fx))
					{
						foreach($res_fx as $key => $values)
						{
							$array_arome_not_have[$key] = $values;
						}

						//pourcentage de réussite récupérer de la ligne dans la base
						$pourcent_win = $row_search->pourcent_win;

						//va renvoyer un 0 ou un 1 pour voir si il a réussi son jet de dés
						$win_or_loose = $this->sort_win_or_lose($pourcent_win);

						//envoi la chaine de caractere de la base de données avec les ids en chaine et les retourne en tableau lisible
						$array_id_arome_player_not_had = $this->traitement_arome_chain_bsd($array_arome_not_have[0]->list_arome_not_have);

						// sortira simplement un random de 0 ou un id d'arome que le joueur n'a pas
						$id_ok_win = $this->sort_one_arome_rand_non_acquis($array_id_arome_player_not_had, $win_or_loose);

						if($id_ok_win != 0)
						{
							//on set l'arome gagné dans le user pour l'utiliser dans le tpl arome list
							$user->user_infos->id_arome_win .= $id_ok_win.",";

							foreach($array_id_arome_player_not_had as $key => $id_arome_not_have)
							{
								if($id_arome_not_have == $id_ok_win)
									unset($array_id_arome_player_not_had[$key]);
							}
							$string_for_bsd = implode(',', $array_id_arome_player_not_had).",";

							if($string_for_bsd == ",")
								$string_for_bsd = "";
						
							$req_sql = new stdClass;
							$req_sql->table = "login";
							$req_sql->where = "id = '".$row_search->id_user."'";
							$req_sql->ctx = new stdClass;
							$req_sql->ctx->list_arome_not_have = $string_for_bsd;
							all_query::update($req_sql);
						}

						//et on delete la ligne qui est finie;
						$del_sql = new stdClass;
						$del_sql->table = "search_arome";
						$del_sql->where = "id = '".$row_search->id."' AND id_user = '".$user->user_infos->id."'";
						all_query::delete($del_sql);
					}
					unset($res_fx);
				}
			}
		}	
	}



	private function sort_win_or_lose($pourcent_win)
	{
		$rand_array = array();
		$i = 0;
		//simulation d'un array representant les pourcent
		while($i <= 100)
		{
			$rand_array[$i+1] = "0";
			$i++;
		}

		foreach($rand_array as $key => $value)
		{
			if(intval($pourcent_win) > 0)
			{
				$rand_array[$key] = 1;
				(int)$pourcent_win--;
			}
		}

		return $rand_array[array_rand($rand_array, 1)];
	}

	public function traitement_arome_chain_bsd($data_from_bsd)
	{
		//contient tout les id des aromes non connu
		$data_from_bsd = substr($data_from_bsd, 0,-1);
		$data_explode = explode(",", $data_from_bsd);
		return $data_explode;
	}


	private function sort_one_arome_rand_non_acquis($array_id_arome_player_not_had, $win_or_loose)
	{
		if($win_or_loose)
			return $array_id_arome_player_not_had[array_rand($array_id_arome_player_not_had,1)];
		else
			return 0;
	}

	public function insert_search_arome($pourcent_to_win, $price_value_search, $time_finish)
	{
		$req_sql = new stdClass;
		$req_sql->ctx = new stdClass;
		$req_sql->ctx->id_user = $this->user_obj->user_infos->id;
		$req_sql->ctx->price_value_search = $price_value_search;
		$req_sql->ctx->time_finish = $time_finish;
		$req_sql->ctx->pourcent_win = $pourcent_to_win;
		$req_sql->table = "search_arome";
		$this->insert_into($req_sql);
	}

	public function insert_search_update_en_cours($name_batiment, $time_finish, $real_name_search)
	{
		$req_sql = new stdClass;
		$req_sql->ctx = new stdClass;
		$req_sql->ctx->id_user = $this->user_obj->user_infos->id;
		$req_sql->ctx->name_batiment = $name_batiment;
		$req_sql->ctx->time_finish = $time_finish;
		$req_sql->ctx->real_name_search = $real_name_search;
		$req_sql->table = "update_en_cours";
		$this->insert_into($req_sql);

	}

	protected function check_update_en_cours($name_batiment_from_controller = "", $prix_level_up)
	{
		if(!empty($this->user_obj->update))
		{	
		//comme il y a des construction en cours il faut les faire vérifié pour voir si celle de notr ebatiments est dedans	
			foreach($this->user_obj->update as $row_update)
			{
				if($row_update->name_batiment == $name_batiment_from_controller)
					return 1;	//la consctruction était déjà lancée quand le joueur c'est logger
			}
			//si il sort de la boucle c'est qu'il n'a rien trouver dans la base
			//mais avant ça on va vérifié si il a l'argent nécessaire
			if($this->user_obj->user_infos->argent >= $prix_level_up)
				return 0;	//la tout est ok rien n'est lancé et il as assez d'argnet
			else
				return 2;	//2 egale que on a pas l'argent
		}
		else
		{
			//mais avant ça on va vérifié si il a l'argent nécessaire
			if($this->user_obj->user_infos->argent >= $prix_level_up)
				return 0;
			else
				return 2;	
		}
	}

} 