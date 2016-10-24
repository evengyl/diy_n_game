<?php 
Class labos_bases extends base_module
{
	public $alert_construction_en_cours = 0;
	public $name_batiment = "level_labos_bases";
	public $max_level_batiment = 80;

	public function __construct()
	{	
		parent::__construct(__CLASS__);

		$this->alert_construction_en_cours = $this->user->check_construction_en_cours($this->name_batiment, $this->user->labos_bases->prix);	


		if($this->user->user_infos->level_labos_bases == $this->max_level_batiment)
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
					$time_finish = $this->user->user_infos->time_now + $this->user->labos_bases->time_construct;

					$this->user->insert_construction_en_cours($this->name_batiment, $time_finish);	
					$this->user->set_argent_user($this->user->labos_bases->prix, "-");
					//ici je rappel la fonction qui gere la table user pour mettre a jour le fait qu'un batiment est lancé
					$this->alert_construction_en_cours = 1;
					$this->user->get_variable_user();
				}
			}
		}
		//dans tout les cas il faut set la variable du temps parce que sinon aucun affichage de temps pour le joueur
		$time_finish = $this->user->set_time_finish($this->name_batiment);

		return $this->assign_var("user", $this->user)->assign_var("time_finish", $time_finish)->assign_var("in_make", $this->alert_construction_en_cours)->render();
	}
}