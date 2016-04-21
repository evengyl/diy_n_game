<?php 

Class champ_glycerine extends base_module
{
	private $time_finish;
	private $alert_construction_en_cours = 0;
	private $infos_vg;

	public function __construct($module_tpl_name, $user = "", $var_in_match ="")
	{		
		parent::__construct($module_tpl_name);

		//on check si une cronstruction de type level_culture_vg est en cours, et on set la var alert a 0 si pas et a 1 si il y a une construction
		$this->check_construction_en_cours($user, $var_in_match);

		//on check si le bouton de construction a été validé, et on crée le champs de ctrt dans la base de données
		if($var_in_match == "level_culture_vg")
		{
			if($this->alert_construction_en_cours == 0)
			{
				// on va recuprer les données en base de données et on applique sur la table des construction le level suivant OK
				// d'abord vérifier si aucune construction de se batiment n'est en route si oui, le signaler dans le TPL
				$this->time_finish_construct($user->culture_vg->time_construct);

				$req_sql = "INSERT INTO construction_en_cours (id_user, name_batiment, time_finish) 
							VALUES ('".$user->user_infos->id."', '".$var_in_match."', '".$this->time_finish."')";
				$this->query_simple($req_sql);
				//ici je rappel la fonction qui gere la table user pour mettre a jour le fait qu'un batiment est lancé
				$user->set_variable_user();
				unset($_GET['construct']);
				$this->alert_construction_en_cours = 1;
			}
		}

		$this->set_time_finish($user);


		return $this->assign_var("user", $user)->assign_var("time_finish", $this->time_finish)->assign_var("in_make", $this->alert_construction_en_cours)->render();
	}

	private function set_time_finish($user)
	{
		foreach($user->construction as $row_construct)
		{
			if($row_construct->name_batiment == "level_culture_vg")
			{
				$this->time_finish = $row_construct->time_finish;
			}
		}
	}

	private function time_finish_construct($time_construct)
	{
		$this->time_finish = "";
		$time_now = date("U");
		$this->time_finish = $time_now + $time_construct;
	}

	private function check_construction_en_cours($user, $var_in_match)
	{
		$req_sql = ("SELECT * FROM construction_en_cours WHERE id_user = '".$user->user_infos->id."'");
		$res_sql = $this->other_query($req_sql);

		if(!empty($res_sql))
		{	
		//comme il y a des construction en cours il faut les faire vérifié pour voir si celle de notr ebatiments est dedans		
			foreach($res_sql as $row_construct)
			{
				if($row_construct->name_batiment == $var_in_match)
				{
					//on viens de lancer l'appel pour mettre en route une construction
					$this->alert_construction_en_cours = 1;
				}
				else if($row_construct->name_batiment == "level_culture_vg")
				{
					//la consctruction était déjà lancée quand le joueur c'est logger
					$this->alert_construction_en_cours = 1;	
				}
				else
				{
					//sinon ben les construction sont pas en route donc on peux lancer la construction
					$this->alert_construction_en_cours = 0;		
				}
			}			
		}
		else
		{
			//du coup y a rien qu'est lancé on peux lancer sans soucis
			$this->alert_construction_en_cours = 0;
		}
	}

}
