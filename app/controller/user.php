<?php


Class user extends all_query
{



	//a test 
	public $gain_per_level_search_arome;


	public function __construct()
	{
		if(Config::$is_connect == 1)
		{
			parent::__construct();
		}
	}


	public function get_variable_user()
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
				if($key == 'id' || $key == 'id_user')
					continue;
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

		$this->product = new stdClass();
		$req_sql = new stdClass;
		$req_sql->table = "product";
		$req_sql->var = "*";
		$req_sql->where = "id_user = '".$this->user_infos->id."'";
		$res_fx = $this->select($req_sql);
		if(!empty($res_fx))
		{
			foreach($res_fx[0] as $key => $values)
			{
				if($key == 'id' || $key == 'id_user')
					continue;
				$this->product->$key = $values;
			}
		}
		unset($res_fx);

		$this->nb_arome = new stdClass();
		$req_sql = new stdClass;
		$req_sql->table = "aromes";
		$req_sql->var = "id";
		$res_fx = $this->select($req_sql);
		if(!empty($res_fx))
		{
			$this->user_infos->nb_arome_total = count($res_fx);
		}
		unset($res_fx);

	}
}