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
	public $time_now;

	public function __construct()
	{
		if(Config::$is_connect == 1)
		{
			$this->get_variable_user();
			$this->time_now = date("U");			
			$this->validate_construct();
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




				$this->obj = new stdClass();
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
} 