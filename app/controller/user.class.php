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

}