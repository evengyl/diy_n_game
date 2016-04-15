<?php


Class user extends all_query
{
	//doit se 
		//zone de test des ressources 
		// tout ce passe en seconde c'est plus simple 

	public $user_infos;
	public $vg;
	public $pg;


	public function __construct()
	{
		$this->set_variable_user();
		$this->maj_ressource($this->vg);
		$this->maj_ressource($this->pg);
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


				$this->vg = new stdClass();
				$req_sql_vg = "SELECT * FROM culture_vg WHERE level = '".$this->user_infos->level_culture_vg."'";
				$res_fx = $this->other_query($req_sql_vg);
				foreach($res_fx[0] as $key => $values)
				{
					$this->vg->$key = $values;
				}
				unset($res_fx);



				$this->pg = new stdClass();
				$req_sql_pg = "SELECT * FROM usine_pg WHERE level = '".$this->user_infos->level_usine_pg."'";
				$res_fx = $this->other_query($req_sql_pg);
				foreach($res_fx[0] as $key => $values)
				{
					$this->pg->$key = $values;
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
		$this->calc_ressource_per_sec_vg($this->vg->production);
		$this->calc_ressource_per_sec_pg($this->pg->production);


		//reset les ressources gangée à zero pour éviter les accumulation
		$this->user_infos->ressource_win_culture_vg = 0;
		$this->user_infos->ressource_win_usine_pg = 0;

		$this->user_infos->ressource_win_culture_vg = round($this->user_infos->time_diff * $this->vg->production_sec, 2);
		$this->user_infos->ressource_win_usine_pg = round($this->user_infos->time_diff * $this->pg->production_sec, 2);

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
		$this->vg->production_sec = round((($this->vg->production /60)/60),2);
	}

	private function calc_ressource_per_sec_pg($ressource_per_hour)
	{
		$this->pg->production_sec = round((($this->pg->production /60)/60),2);
	}

	private function calc_diff_time($last_time_user)
	{
		$time_now = date("U");

		if($time_now > $last_time_user)
		{
			$diff_time = $time_now - $last_time_user;
		}
		else if($time_now == $last_time_user)
		{
			$diff_time = 0;
		}
		else
		{
			$subject = "Attention le joueur : ".$this->user_infos->login." a un last connect plus grand que le time UNIX , il s'agit ou d'une erreur ou d'une piratage des données.";
			mail("dark.evengyl@gmail.com", "Message d'erreur du site Diy N Game.", $subject);
			$_SESSION['error'] = "Une erreur est survenue ou alors vous avez tenté de faire les petits malins... première avertissement...";
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

}