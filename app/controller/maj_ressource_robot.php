<?

class maj_ressource_robot extends base_module
{
	private $user_infos;
	private $time_now;


	public function __construct()
	{
		$this->set_time_now();
		$this->set_infos_user();

		foreach($this->user_infos as $row_user)
		{
			$this->calc_diff_time($row_user);
			$this->maj_time_last_connect_in_db($row_user);

			//calcule combien de ressource le joueur gagne en seconde;
			$row_user->production_vg_sec = $this->calc_ressource_per_sec_vg($row_user->production_vg);
			$row_user->production_pg_sec = $this->calc_ressource_per_sec_pg($row_user->production_pg);

			//calcule combien il en a gagner depuis la derniere mise a jours des ressources
			$this->calc_ressource_win($row_user);
			$this->maj_ressource_in_db($row_user);
		}
	}

	public function set_infos_user()
	{

		$this->user_infos = new stdClass();
		$res_fx = $this->other_query(
		"SELECT login.id,
		login.login,
		login.avertissement,
		login.last_connect,
		login.level_culture_vg, 
		login.level_usine_pg,
		login.level_labos_bases,
		login.last_culture_vg as champ_vg,
		login.last_usine_pg as usine_pg,
		culture_vg.production as production_vg,
        usine_pg.production as production_pg,
        labos_bases.pourcent_down as pourcent_down
        
        FROM login, culture_vg, usine_pg, labos_bases
		WHERE culture_vg.level = login.level_culture_vg 
		AND usine_pg.level = login.level_usine_pg
		AND labos_bases.level = login.level_labos_bases
		");

		foreach($res_fx as $key => $values)
		{
			$this->user_infos->$key = $values;					
		}
		unset($res_fx);		

	}

	private function maj_ressource_in_db($row_user)
	{
		$req_sql = new stdClass;
		$req_sql->ctx = new stdClass;

		$row_user->new_numb_ressource_culture_vg = $row_user->champ_vg + $row_user->ressource_win_culture_vg;
		$row_user->new_numb_ressource_usine_pg = $row_user->usine_pg + $row_user->ressource_win_usine_pg;

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




	private function set_time_now()
	{
		$this->time_now = date("U");
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
	
}
