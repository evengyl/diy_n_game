<?php


Class user extends all_query
{
	//doit se 
		//zone de test des ressources 
		// tout ce passe en seconde c'est plus simple 

	public $user_infos;
	public $champ_glycerine;
	public $usine_propylene;
	public $labos_bases;
	public $bases;
	public $construction;
	public $search_arome;
	public $time_now;

	public function __construct()
	{
		if(Config::$is_connect == 1)
		{
			$this->get_variable_user();
			$this->time_now = date("U");			
			$this->validate_construct();
			$this->validate_search_arome();
			$this->get_variable_user();			
		}
		else
		{
			return false;
		}

	}

	public function reset_user_login_table()
	{
		$this->user_infos = new stdClass();
		$req_sql = new stdClass;
		$req_sql->table = "login";
		$req_sql->var = "*";
		$req_sql->where = "login ='".$_SESSION['pseudo']."'";
		$res_fx = $this->select($req_sql);

		foreach($res_fx[0] as $key => $values)
		{
			$this->user_infos->$key = $values;			
		}
		unset($res_fx);
	}
	
	public function get_variable_user()
	{
		global $error;

		if(isset($_SESSION['pseudo']))
		{

			if($_SESSION['pseudo'] != "" || $_SESSION['pseudo'] != " ")
			{


				$this->user_infos = new stdClass();
				$req_sql = new stdClass;
				$req_sql->table = "login";
				$req_sql->var = "*";
				$req_sql->where = "login ='".$_SESSION['pseudo']."'";
				$res_fx = $this->select($req_sql);

				foreach($res_fx[0] as $key => $values)
				{
					$this->user_infos->$key = $values;			
				}
				unset($res_fx);




				$req_sql = new stdClass;
				$req_sql->table = "raccord";
				$req_sql->var = "*";
				$res_fx = $this->select($req_sql);

				foreach($res_fx as $row)
				{
					$this->{$row->name_controller} = new stdClass();
					$req_sql = new stdClass;
					$req_sql->table = $row->table_batiment;
					$req_sql->var = "*";
					$name_level = "level_".$row->table_batiment;
					$req_sql->where = "level = '".$this->user_infos->$name_level."'";
					$res_fx = $this->select($req_sql);
					$this->{$row->name_controller} = $res_fx[0];
				}
				unset($res_fx);


				$this->bases = new stdClass();
				$req_sql = new stdClass;
				$req_sql->table = "bases";
				$req_sql->var = "*";
				$req_sql->where = "id_user = '".$this->user_infos->id."'";
				$res_fx = $this->select($req_sql);
				foreach($res_fx[0] as $key => $values)
				{
					$this->bases->$key = $values;
				}
				unset($res_fx);


				$this->construction = new stdClass();
				$req_sql = new stdClass;
				$req_sql->table = "construction_en_cours";
				$req_sql->var = "*";
				$req_sql->where = "";
				$res_fx = $this->select($req_sql);
				if(!empty($res_fx))
				{
					foreach($res_fx as $key => $values)
					{
						$this->construction->$key = $values;
					}
				}
				unset($res_fx);

				$this->search_arome = new stdClass();
				$req_sql = new stdClass;
				$req_sql->table = "search_arome";
				$req_sql->var = "*";
				$req_sql->where = "id_user = '".$this->user_infos->id."'";
				$res_fx = $this->select($req_sql);
				if(!empty($res_fx))
				{
					foreach($res_fx as $key => $values)
					{
						$this->search_arome->$key = $values;
					}
				}
				unset($res_fx);

			}
			else
			{
				$error[] = "la mise a niveau des variable user a pausé un soucis, user.class.php -> set_variable_user";
			}
		}
		else
		{
			$error[] = "pas de variable is_connect dans le set_variable_user donc pas connecté";
		}
	}


	public function validate_construct()
	{

		$req_sql = new stdClass;
		$req_sql->table = "construction_en_cours";
		$req_sql->var = "*";
		$req_sql->where = "id_user= '".$this->user_infos->id."'";
		$res_sql = $this->select($req_sql);
		unset($req_sql);

		if(!empty($res_sql))
		{
			foreach($res_sql as $row_construct)
			{
				if($row_construct->time_finish <= $this->time_now)
				{
					//on indique dans la base que le level est changer 
					$set_level_up = $this->user_infos->{$row_construct->name_batiment}+1;
					$req_sql = new stdClass;
					$req_sql->table = "login";
					$req_sql->where = "id = '".$row_construct->id_user."'";
					$req_sql->ctx = new stdClass;
					$req_sql->ctx->{$row_construct->name_batiment} = $set_level_up;
					$this->update($req_sql);

					//et on delete la ligne qui est finie;
					$del_sql = new stdClass;
					$del_sql->table = "construction_en_cours";
					$del_sql->where = "id = '".$row_construct->id."' AND id_user = '".$this->user_infos->id."'";
					$this->delete($del_sql);
				}
			}
		}		
	}

	public function validate_search_arome()
	{
		$req_sql = new stdClass;
		$req_sql->table = "search_arome";
		$req_sql->var = "*";
		$req_sql->where = "id_user= '".$this->user_infos->id."'";
		$res_sql = $this->select($req_sql);
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
					$req_sql->where = "id = '".$this->user_infos->id."'";
					$res_fx = $this->select($req_sql);

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
							$this->update($req_sql);
						}

						//et on delete la ligne qui est finie;
						$del_sql = new stdClass;
						$del_sql->table = "search_arome";
						$del_sql->where = "id = '".$row_search->id."' AND id_user = '".$this->user_infos->id."'";
						$this->delete($del_sql);
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

	private function traitement_arome_chain_bsd($data_from_bsd)
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
} 