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
			$this->set_variable_user();
		}
		else
		{
			return false;
		}

	}

	
	public function set_variable_user()
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


	public function validate_construct()
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
					//et on delete la ligne qui est finie;
					$this->delete_row($table = "construction_en_cours", $where = "id = '".$row_construct->id."' AND id_user = '".$this->user_infos->id."'");
				}
			}
		}		
	}
} 