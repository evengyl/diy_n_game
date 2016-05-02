<?php 

Class usine_propylene extends base_module
{
	
	public $alert_construction_en_cours = 0;
	public $name_batiment = "level_usine_pg";

	public function __construct($module_tpl_name, $user = "", $var_in_match ="")
	{		
		parent::__construct($module_tpl_name);
		//on check si une cronstruction de type level_culture_vg est en cours, et on set la var alert a 0 si pas et a 1 si il y a une construction
		$this->check_construction_en_cours($user, $var_in_match, $this->name_batiment);

		//on check si le bouton de construction a été validé, et on crée le champs de ctrt dans la base de données
		if($var_in_match == $this->name_batiment)
		{
			if($this->alert_construction_en_cours == 0)
			{
				// on va recuprer les données en base de données et on applique sur la table des construction le level suivant OK
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
		//dans tout les cas il faut set la variable du temps parce que sinon aucun affichage de temps pour le joueur
		$this->set_time_finish($user, $this->name_batiment);


		return $this->assign_var("user", $user)->assign_var("time_finish", $this->time_finish)->assign_var("in_make", $this->alert_construction_en_cours)->render();
	}

}
