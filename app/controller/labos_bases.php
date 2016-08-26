<?php 
Class labos_bases extends base_module
{
	public $alert_construction_en_cours = 0;
	public $name_batiment = "level_labos_bases";
	public $max_level_batiment = 80;

	public function __construct($module_tpl_name, &$user)
	{	
		parent::__construct($module_tpl_name, $user);

		$this->alert_construction_en_cours = $this->check_construction_en_cours($this->name_batiment, $user->labos_bases->prix);	


		if($user->user_infos->level_labos_bases == $this->max_level_batiment)
		{
			// 3 signifie que le level max à été atteint
			$this->alert_construction_en_cours = 3;
		}

		if(isset($_POST['construct']) && $this->alert_construction_en_cours != 3)
		{

			if($_POST['construct'] == 'level_labos_bases')
			{
				//on check si une cronstruction de type level_culture_vg est en cours, et on set la var alert a 0 si pas et a 1 si il y a une construction

				if($this->alert_construction_en_cours == 0)
				{
					// on va recuprer les données en base de données et on applique sur la table des construction le level suivant OK
					$this->time_finish_construct($user->labos_bases->time_construct);

						$this->insert_construction_en_cours($this->name_batiment, $this->time_finish);	
						$this->set_argent_user($user->labos_bases->prix, "-");
						//ici je rappel la fonction qui gere la table user pour mettre a jour le fait qu'un batiment est lancé
						$user->get_variable_user();
						$this->alert_construction_en_cours = 1;
					
					
				}
			}
		}
		//dans tout les cas il faut set la variable du temps parce que sinon aucun affichage de temps pour le joueur
		$this->set_time_finish($this->name_batiment);

		return $this->assign_var("user", $user)->assign_var("time_finish", $this->time_finish)->assign_var("in_make", $this->alert_construction_en_cours)->render();
	}

}