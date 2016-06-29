<?php


Class user extends all_query
{
	public $user_infos; // ne surtout pas changer de place cette proprietes
	public $time_now;
	public $champ_glycerine;
	public $usine_propylene;
	public $labos_bases;
	public $bases;
	public $construction;
	public $search_arome;


	public function __construct()
	{
		$this->time_now = date("U");
		$this->get_variable_user();
	}


	public function get_variable_user()
	{
		global $error;

		if(isset($_SESSION['pseudo']))
		{

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
				if(!empty($res_fx))
				{
					foreach($res_fx[0] as $key => $values)
					{
						$this->bases->$key = $values;
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
				$error[] = "la mise a niveau des variable user a pausé un soucis, user.php -> get_variable_user";
			}
		}
		else
		{
			$error[] = "pas de variable is_connect dans le get_variable_user donc pas connecté";
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





} 