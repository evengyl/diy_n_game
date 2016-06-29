<?php 
Class labos_bases extends base_module
{
	public $alert_construction_en_cours = 0;
	public $name_batiment = "level_labos_bases";

	public function __construct($module_tpl_name, &$user)
	{	
		parent::__construct($module_tpl_name, $user);

		$this->alert_construction_en_cours = $this->check_construction_en_cours($this->name_batiment, $this->user_obj->labos_bases->prix);	


		if(isset($_POST['construct']))
		{

			if($_POST['construct'] == 'level_labos_bases')
			{
				//on check si une cronstruction de type level_culture_vg est en cours, et on set la var alert a 0 si pas et a 1 si il y a une construction

				if($this->alert_construction_en_cours == 0)
				{
					// on va recuprer les données en base de données et on applique sur la table des construction le level suivant OK
					$this->time_finish_construct($this->user_obj->labos_bases->time_construct);
					$this->insert_construction_en_cours($this->name_batiment, $this->time_finish);
					//ici je rappel la fonction qui gere la table user pour mettre a jour le fait qu'un batiment est lancé
					$this->set_argent_user($this->user_obj->labos_bases->prix, "-");
					$this->user_obj->get_variable_user();
					$this->alert_construction_en_cours = 1;
				}
			}
		}
		//dans tout les cas il faut set la variable du temps parce que sinon aucun affichage de temps pour le joueur
		$this->set_time_finish($this->name_batiment);

		return $this->assign_var("user", $this->user_obj)->assign_var("time_finish", $this->time_finish)->assign_var("in_make", $this->alert_construction_en_cours)->render();
	}

}