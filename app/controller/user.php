<?php


Class user extends all_query
{
	public $user_infos; // ne surtout pas changer de place cette proprietes
	public $champ_glycerine;
	public $usine_propylene;
	public $labos_bases;
	public $bases;
	public $amelioration_var_config;
	public $search_arome;
	public $construction;
	public $update;
	public $time_now;
	public $hardware;
	public $array_user_prod_vg;
	public $array_user_prod_pg;


	public function __construct()
	{
		$this->time_now = date("U");

		if(Config::$is_connect == 1)
		{
			$this->get_variable_user();
			$this->set_tab_prod_vg($this->user_infos->level_culture_vg);
			$this->set_tab_prod_pg($this->user_infos->level_usine_pg);
			$this->set_tab_labos($this->user_infos->level_labos_bases);
		}

	}


	public function get_variable_user()
	{
		global $error;

		if($_SESSION['pseudo'] != "" || $_SESSION['pseudo'] != " ")
		{
			if(!isset($this->user_infos))
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


			$this->hardware = new stdClass();
			$req_sql = new stdClass;
			$req_sql->table = "hardware";
			$req_sql->var = "*";
			$req_sql->where = "id_user = '".$this->user_infos->id."'";
			$res_fx = $this->select($req_sql);
			if(!empty($res_fx))
			{
				foreach($res_fx[0] as $key => $values)
				{
					$this->hardware->$key = $values;
				}
			}
			unset($res_fx);


			$this->bases = new stdClass();
			$req_sql = new stdClass;
			$req_sql->table = "bases";
			$req_sql->var = "*";
			$req_sql->where = "id_user = '".$this->user_infos->id."'";
			$res_fx = $this->select($req_sql);
			if(!empty($res_fx))
			{
				foreach($res_fx[0] as $key => $values)
				{
					$this->bases->$key = $values;
				}
			}
			unset($res_fx);

			$this->amelioration_var_config = new stdClass();
			$req_sql = new stdClass;
			$req_sql->table = "amelioration_var_config";
			$req_sql->var = "*";
			$req_sql->where = "id_user = '".$this->user_infos->id."'";
			$res_fx = $this->select($req_sql);
			if(!empty($res_fx))
			{
				foreach($res_fx[0] as $key => $values)
				{
					$this->amelioration_var_config->$key = $values;
				}
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

			$this->update = new stdClass();
			$req_sql = new stdClass;
			$req_sql->table = "update_en_cours";
			$req_sql->var = "*";
			$req_sql->where = "";
			$res_fx = $this->select($req_sql);
			if(!empty($res_fx))
			{
				foreach($res_fx as $key => $values)
				{
					$this->update->$key = $values;
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
			$error[] = "Voir SESSION[] : Il y a une soucis avec la variable SESSION au niveau de l'user ";
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

 	public function set_tab_prod_vg($level_champ_glycerine)
 	{
		$tmp_level = $level_champ_glycerine;
		$obj_user_prod_vg = new stdClass();
		$obj_user_prod_vg->level = $tmp_level;
		$obj_user_prod_vg->production = floor(((pow($tmp_level,1.6) * 42)) * Config::$rate_vg_prod);
		$obj_user_prod_vg->prix = floor((pow($tmp_level,2.1) * 42));
		$obj_user_prod_vg->time_construct = floor(((pow($tmp_level,2) * 42)) * 2);
		$this->champ_glycerine = $obj_user_prod_vg;
 	}


 	public function set_tab_prod_pg($level_usine_propylene)
 	{
		$tmp_level = $level_usine_propylene;
		$obj_user_prod_pg = new stdClass();
		$obj_user_prod_pg->level = $tmp_level;
		$obj_user_prod_pg->production = floor(((pow($tmp_level,1.4) * 42)) * Config::$rate_pg_prod);
		$obj_user_prod_pg->prix = floor((pow($tmp_level,2.2) * 42));
		$obj_user_prod_pg->time_construct = floor(((pow($tmp_level,2.1) * 42)) * 2);
		$this->usine_propylene = $obj_user_prod_pg;
 	}


 	public function set_tab_labos($level_labos_bases)
 	{
		$tmp_level = $level_labos_bases;
		$obj_user_labos = new stdClass();
		$obj_user_labos->level = $tmp_level;
		$obj_user_labos->pourcent_down = $tmp_level * Config::$rate_labos_pourcent_down;
		$obj_user_labos->prix = floor((pow($tmp_level,2.5) * 42));
		$obj_user_labos->time_construct = floor(((pow($tmp_level,2.2) * 42)) * 2);
		$this->labos_bases = $obj_user_labos;
 	}





}
