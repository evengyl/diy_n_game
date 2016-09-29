<?php 
Class champ_glycerine extends base_module
{
	public $alert_construction_en_cours = 0;
	public $name_batiment = "level_culture_vg";


	public function __construct($module_tpl_name, &$user)
	{	
		parent::__construct($module_tpl_name, $user);

		$this->alert_construction_en_cours = user_batiments::check_construction_en_cours($this->name_batiment, $this->user_obj->champ_glycerine->prix);	

		if(isset($_POST['construct']))
		{

			if($_POST['construct'] == 'level_culture_vg')
			{
				//on check si une cronstruction de type level_culture_vg est en cours, et on set la var alert a 0 si pas et a 1 si il y a une construction

				if($this->alert_construction_en_cours == 0)
				{
					// on va recuprer les données en base de données et on applique sur la table des construction le level suivant OK
					$time_finish = $this->time_finish_construct($this->user_obj->champ_glycerine->time_construct);
					user_batiments::insert_construction_en_cours($this->name_batiment, $time_finish);
					//ici je rappel la fonction qui gere la table user pour mettre a jour le fait qu'un batiment est lancé
					$this->set_argent_user($this->user_obj->champ_glycerine->prix, "-");
					$this->user_obj->get_variable_user();
					$this->alert_construction_en_cours = 1;
				}
			}
		}
		else
		{
			$time_finish = 0;
		}
		//dans tout les cas il faut set la variable du temps parce que sinon aucun affichage de temps pour le joueur
		$this->set_time_finish($this->name_batiment);

		return $this->assign_var("user", $this->user_obj)->assign_var("time_finish", $time_finish)->assign_var("in_make", $this->alert_construction_en_cours)->render();
	}

}