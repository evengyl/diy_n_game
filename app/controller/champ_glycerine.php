<?php 

Class champ_glycerine extends base_module
{
	
	public $alert_construction_en_cours = 0;
	public $name_batiment = "level_culture_vg";

	public function __construct($module_tpl_name, $user = "", $var_in_match ="")
	{		
		parent::__construct($module_tpl_name);
		//on check si une cronstruction est en cours, et on set la var alert a 0 
		//si pas et a 1 si il y a une construction ou a deux si la personne n'a pas d'argnet assez
		$this->check_construction_en_cours($user, $var_in_match, $this->name_batiment);

		//on check si le bouton de construction a été validé, et on crée le champs de ctrt dans la base de données
		if($var_in_match == $this->name_batiment)
		{
			if($this->alert_construction_en_cours == 0)
			{
				// on va recuprer les données en base de données et on applique sur la table des construction le level suivant OK
				$this->time_finish_construct($user->culture_vg->time_construct);

				$this->insert_construction_en_cours($user->user_infos->id, $var_in_match, $this->time_finish);
				//ici je rappel la fonction qui gere la table user pour mettre a jour le fait qu'un batiment est lancé
				$this->set_argent_user($user->usine_pg->prix, $user);
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
