<?php


Class user extends all_query
{
	//doit se 
		//zone de test des ressources 
		// tout ce passe en seconde c'est plus simple 

	public $user_infos;
	public $culture_vg;
	public $usine_pg;
	public $time_now;

	public function __construct()
	{
		if(Config::$is_connect == 1)
		{
			$this->set_time_now();
			$this->set_variable_user();
			$this->validate_construct();
			$this->maj_ressource($this->culture_vg);
			$this->maj_ressource($this->usine_pg);
		}
		else
		{
			return false;
		}

	}

	private function set_time_now()
	{
		$this->time_now = date("U");
	}

	private function set_variable_user()
	{
		global $error;

		if(isset($_SESSION['pseudo']))
		{

			if($_SESSION['pseudo'] != "" || $_SESSION['pseudo'] != " ")
			{
				$this->user_infos = new stdClass();
				$req_sql = "SELECT * FROM login WHERE login ='".$_SESSION['pseudo']."'";
				$res_fx = $this->other_query($req_sql);
				foreach($res_fx[0] as $key => $values)
				{
					$this->user_infos->$key = $values;					
				}
				unset($res_fx);


				$this->culture_vg = new stdClass();
				$req_sql_vg = "SELECT * FROM culture_vg WHERE level = '".$this->user_infos->level_culture_vg."'";
				$res_fx = $this->other_query($req_sql_vg);
				foreach($res_fx[0] as $key => $values)
				{
					$this->culture_vg->$key = $values;
				}
				unset($res_fx);



				$this->usine_pg = new stdClass();
				$req_sql_pg = "SELECT * FROM usine_pg WHERE level = '".$this->user_infos->level_usine_pg."'";
				$res_fx = $this->other_query($req_sql_pg);
				foreach($res_fx[0] as $key => $values)
				{
					$this->usine_pg->$key = $values;
				}
				unset($res_fx);


				$this->construction = new stdClass();
				$req_sql_construction = "SELECT * FROM construction_en_cours";
				$res_fx = $this->other_query($req_sql_construction);
				if(!empty($res_fx))
				{
					foreach($res_fx as $key => $values)
					{
						$this->construction->$key = $values;
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

	private function maj_ressource()
	{
		$this->user_infos->time_diff = $this->calc_diff_time($this->user_infos->last_connect);


		//determine combien de ressource le joueur gagne en une seconde car dans la bsd c'est en heure
		$this->calc_ressource_per_sec_vg($this->culture_vg->production);
		$this->calc_ressource_per_sec_pg($this->usine_pg->production);


		//reset les ressources gangée à zero pour éviter les accumulation
		$this->user_infos->ressource_win_culture_vg = 0;
		$this->user_infos->ressource_win_usine_pg = 0;

		$this->user_infos->ressource_win_culture_vg = round($this->user_infos->time_diff * $this->culture_vg->production_sec, 2);
		$this->user_infos->ressource_win_usine_pg = round($this->user_infos->time_diff * $this->usine_pg->production_sec, 2);

		$this->maj_time_last_connect_in_db();

		$this->maj_ressource_in_db();
	}

	private function maj_ressource_in_db()
	{
		$req_sql = new stdClass;
		$req_sql->ctx = array();

		$this->user_infos->new_numb_ressource_culture_vg = $this->user_infos->last_culture_vg + $this->user_infos->ressource_win_culture_vg;
		$this->user_infos->new_numb_ressource_usine_pg = $this->user_infos->last_usine_pg + $this->user_infos->ressource_win_usine_pg;

		$req_sql->ctx["last_culture_vg"] = $this->user_infos->new_numb_ressource_culture_vg;
		$req_sql->ctx["last_usine_pg"] = $this->user_infos->new_numb_ressource_usine_pg;
		$req_sql->table = "login";
		$req_sql->where = "id = ".$this->user_infos->id;
		$this->update($req_sql);
		unset($req_sql);
	}


	private function maj_time_last_connect_in_db()
	{
		$req_sql = new stdClass;
		$req_sql->ctx = array();
		$req_sql->ctx["last_connect"] = date("U");
		$req_sql->table = "login";
		$req_sql->where = "id = ".$this->user_infos->id;
		$this->update($req_sql);
		unset($req_sql);
	}




	private function calc_ressource_per_sec_vg($ressource_per_hour)
	{
		$this->culture_vg->production_sec = round((($this->culture_vg->production /60)/60),2);
	}

	private function calc_ressource_per_sec_pg($ressource_per_hour)
	{
		$this->usine_pg->production_sec = round((($this->usine_pg->production /60)/60),2);
	}

	private function calc_diff_time($last_time_user)
	{

		if($this->time_now > $last_time_user)
		{
			$diff_time = $this->time_now - $last_time_user;
		}
		else if($this->time_now == $last_time_user)
		{
			$diff_time = 0;
		}
		else
		{
			$subject = "Attention le joueur : ".$this->user_infos->login." a un last connect plus grand que le time UNIX , il s'agit ou d'une erreur ou d'une piratage des données.";
			mail(parent::$mail, "Message d'erreur du site Diy N Game.", $subject);
			?><script>alert("Une erreur est survenue ou alors vous avez tenté de faire les petits malins... première avertissement...")</script><?
			$this->maj_avertissement();
			return 0;
		}

		return $diff_time;
	}

	private function maj_avertissement()
	{
		$req_sql = new stdClass;
		$req_sql->ctx = array();
		$old_values_avertissement = $this->user_infos->avertissement;
		$req_sql->ctx["avertissement"] = $old_values_avertissement+1;
		$req_sql->table = "login";
		$req_sql->where = "id = ".$this->user_infos->id;
		$this->update($req_sql);
		unset($req_sql);
		//met dans la base de donnée un petit +1 pour avertissement
	}


	private function validate_construct()
	{
		$req_sql = "SELECT * FROM construction_en_cours WHERE id_user= '".$this->user_infos->id."'";
		$res_sql = $this->other_query($req_sql);
		if(!empty($res_sql))
		{
			foreach($res_sql as $row_construct)
			{
				
				if($row_construct->time_finish <= $this->time_now)
				{
						//on indique dans la base que le level est changer 
					$set_level_up = $this->user_infos->{$row_construct->name_batiment}+1;
					$req_sql = "UPDATE login SET ".$row_construct->name_batiment." = '".$set_level_up."' WHERE id = '".$row_construct->id_user."'";
					$this->query_simple($req_sql);
					$this->delete_row($table = "construction_en_cours", $where = "id = '".$row_construct->id."' AND id_user = '".$this->user_infos->id."'");
				}
				else
				{
					$time_restant = $row_construct->time_finish - $this->time_now;
					$row_construct->time_to_finish = $time_restant;
					$req_sql = "UPDATE construction_en_cours SET time_to_finish = '".$time_restant."' WHERE id = '".$row_construct->id."' AND id_user = '".$row_construct->id_user."'";
					$this->query_simple($req_sql);
				}
			}
		}


		
	}
} 