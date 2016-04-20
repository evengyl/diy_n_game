<?php 

Class champ_glycerine extends base_module
{
	private $time_finish;
	private $alert_construction_en_cours;

	public function __construct($module_tpl_name, $user = "", $var_in_match ="")
	{		
		parent::__construct($module_tpl_name);
		

		if($var_in_match == "vg")
		{

			if(!$this->check_construction_en_cours($user, $var_in_match))
			{
				// on va recuprer les données en base de données et on applique sur la table des construction le level suivant OK
				// d'abord vérifier si aucune construction de se batiment n'est en route si oui, le signaler dans le TPL
				$this->time_finish_construct($user->culture_vg->time_construct);
				$req_sql = "INSERT INTO construction_en_cours (id_user, name_batiment, time_finish) 
							VALUES ('".$user->user_infos->id."', '".$var_in_match."', '".$this->time_finish."')";
				$this->query_simple($req_sql);				
			}
		}

		if(!$this->check_construction_en_cours($user, $var_in_match))
		{
			$this->alert_construction_en_cours = true;
		}

		return $this->assign_var("user", $user)->assign_var("in_make", $this->alert_construction_en_cours)->render();
	}

	private function time_finish_construct($time_construct)
	{
		$this->time_finish = "";
		$time_now = date("U");
		$this->time_finish = $time_now + $time_construct;
	}

	private function check_construction_en_cours($user, $var_in_match)
	{
		if($user->construction)
		{	
		//comme il y a des construction en cours il faut les faire vérifié pour voir si celle de notr ebatiments est dedans		
			foreach($user->construction as $row_construct)
			{
				if($row_construct->name_batiment == $var_in_match)
					return true;
			}
			
		}
		else
			return false;
	}

}
