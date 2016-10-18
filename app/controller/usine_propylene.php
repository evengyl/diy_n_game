<?
Class usine_propylene extends base_module
{
	public $alert_construction_en_cours = 0;
	public $name_batiment = "level_usine_pg";
	public $name_batiment_in_user_var = "usine_propylene";


	public function __construct()
	{	
		parent::__construct(__CLASS__);

		$this->alert_construction_en_cours = $this->user->check_construction_en_cours($this->name_batiment, $this->user->usine_propylene->prix);	

				//on check si une cronstruction de type level_culture_vg est en cours, et on set la var alert a 0 si pas et a 1 si il y a une construction

		if(isset($_POST['construct']))
		{

			if($_POST['construct'] == 'level_usine_pg')
			{
				if($this->alert_construction_en_cours == 0)
				{
					// on va recuprer les données en base de données et on applique sur la table des construction le level suivant OK
			
					$time_finish = $this->user->user_infos->time_now + $this->user->{$this->name_batiment_in_user_var}->time_construct;

					$this->user->insert_construction_en_cours($this->name_batiment, $time_finish);
					//ici je rappel la fonction qui gere la table user pour mettre a jour le fait qu'un batiment est lancé
					$this->user->set_argent_user($this->user->usine_propylene->prix, "-");
					$this->alert_construction_en_cours = 1;
					$this->user->get_variable_user();
				}
			}
		}

		$time_finish = $this->user->set_time_finish($this->name_batiment);

		return $this->assign_var("user", $this->user)->assign_var("time_finish", $time_finish)->assign_var("in_make", $this->alert_construction_en_cours)->render();
	}
}