<?php
Class user_batiments extends user_account
{
	public function __construct()
	{
		parent::__construct();
	}

	public function validate_construct()
	{
		$req_sql = new stdClass;
		$req_sql->table = "user_batiments_in_construct";
		$req_sql->var = "*";
		$req_sql->where = "id_user= '".$this->user_infos->id."'";
		$res_sql = $this->select($req_sql);
		unset($req_sql);

		if(!empty($res_sql))
		{
			foreach($res_sql as $row_construct)
			{
				if($row_construct->time_finish <= $this->user_infos->time_now)
				{
					//on indique dans la base que le level est changer 
					$set_level_up = $this->user_list_batiments->{$row_construct->name_batiment}+1;
					$req_sql = new stdClass;
					$req_sql->table = "user_list_batiments";
					$req_sql->where = "id_user = '".$row_construct->id_user."'";
					$req_sql->ctx = new stdClass;
					$req_sql->ctx->{$row_construct->name_batiment} = $set_level_up;
					$this->update($req_sql);

					//et on delete la ligne qui est finie;
					$del_sql = new stdClass;
					$del_sql->table = "user_batiments_in_construct";
					$del_sql->where = "id = '".$row_construct->id."' AND id_user = '".$this->user_infos->id."'";
					$this->delete($del_sql);
				}
			}
		}		
	}

 	public function set_time_finish($name_batiment)
	{
		foreach($this->user_batiments_in_construct as $row_construct)
		{
			if($row_construct->name_batiment == $name_batiment)
			{
				return $row_construct->time_finish;
			}
		}
	}


	public function insert_construction_en_cours($name_batiment, $time_finish)
	{
		$req_sql = new stdClass;
		$req_sql->ctx = new stdClass;
		$req_sql->ctx->id_user = $this->user_infos->id;
		$req_sql->ctx->name_batiment = $name_batiment;
		$req_sql->ctx->time_finish = $time_finish;
		$req_sql->table = "user_batiments_in_construct";
		$this->insert_into($req_sql);

	}

	public function check_construction_en_cours($name_batiment_from_controller = "", $prix_level_up)
	{
		if(!empty($this->user_batiments_in_construct))
		{	
		//comme il y a des construction en cours il faut les faire vérifié pour voir si celle de notr ebatiments est dedans	
			foreach($this->user_batiments_in_construct as $row_construct)
			{
				if($row_construct->name_batiment == $name_batiment_from_controller)
					return 1;	//la consctruction était déjà lancée quand le joueur c'est logger
			}
		}
		return 0;
	}






	public function convert_sec_unix_in_time_real_to_rest($time_finish)
	{
		$time_now = date("U");
		$time_finish = $time_finish - $time_now;
		$jours = floor($time_finish/86400);
		$reste = $time_finish%86400;
		$heures = floor($reste/3600);
		$reste = $reste%3600;
		$minutes = floor($reste/60);
		$secondes = $reste%60;
		return $jours." Jours - ".$heures."h : ".$minutes."m : ".$secondes."s";
	}


	public function convert_sec_unix_in_time_real($time_to_convert)
	{
		$time_now = date("U");
		$time_to_convert = $time_now - $time_to_convert;
		$jours = floor($time_to_convert/86400);
		$reste = $time_to_convert%86400;
		$heures = floor($reste/3600);
		$reste = $reste%3600;
		$minutes = floor($reste/60);
		$secondes = $reste%60;
		return $jours." Jours - ".$heures."h : ".$minutes."m : ".$secondes."s";
	}

	public function convert_sec_in_time_real($time_to_convert)
	{
		$jours = floor($time_to_convert/86400);
		$reste = $time_to_convert%86400;
		$heures = floor($reste/3600);
		$reste = $reste%3600;
		$minutes = floor($reste/60);
		$secondes = $reste%60;
		return $jours." Jours - ".$heures."h : ".$minutes."m : ".$secondes."s";
	}




 	public function set_prod_fer()
 	{
		$tmp_level = $this->user_list_batiments->lvl_mine_fer;
		$prod_fer = new stdClass();
		$prod_fer->level = $tmp_level;
		$prod_fer->production = floor(((pow($tmp_level,1.55) * 42)) * Config::$rate_vg_prod);
		$prod_fer->prix = floor((pow($tmp_level,2.1) * 42));
		$prod_fer->time_construct = floor(((pow($tmp_level,2) * 42)) * 4);
		$prod_fer->time_real_construct = $this->convert_sec_in_time_real($prod_fer->time_construct);
		$this->champ_glycerine = $prod_fer;
 	}


 	public function set_object_user_tab_prod_pg()
 	{
		$tmp_level = $this->user_infos->level_usine_pg;
		$obj_user_prod_pg = new stdClass();
		$obj_user_prod_pg->level = $tmp_level;
		$obj_user_prod_pg->production = floor(((pow($tmp_level,1.45) * 42)) * Config::$rate_pg_prod);
		$obj_user_prod_pg->prix = floor((pow($tmp_level,2.2) * 42));
		$obj_user_prod_pg->time_construct = floor(((pow($tmp_level,2) * 42)) * 4.5);
		$obj_user_prod_pg->time_real_construct = $this->convert_sec_in_time_real($obj_user_prod_pg->time_construct);
		$this->usine_propylene = $obj_user_prod_pg;
 	}


 	public function set_object_user_tab_labos()
 	{
		$tmp_level = $this->user_infos->level_labos_bases;
		$obj_user_labos = new stdClass();
		$obj_user_labos->level = $tmp_level;
		$obj_user_labos->pourcent_down = $tmp_level * Config::$rate_labos_pourcent_down;
		$obj_user_labos->prix = floor((pow($tmp_level,2.5) * 42));
		$obj_user_labos->time_construct = floor(((pow($tmp_level,2) * 42)) * 6);
		$obj_user_labos->time_real_construct = $this->convert_sec_in_time_real($obj_user_labos->time_construct);
		$this->labos_bases = $obj_user_labos;
 	}

} 