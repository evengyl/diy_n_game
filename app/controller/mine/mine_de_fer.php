<?php 
Class mine_de_fer extends base_module
{
	public $if_construct = 0;
	public $if_enough_money = 0;
	public $name_batiment = "lvl_mine_fer";


	public function __construct(&$_app)
	{	
		$_app->module_name = __CLASS__;
		parent::__construct($_app);
		$this->_app->navigation->set_breadcrumb("Mine de fer");



		//Partie vérification et application de la construction
		$this->if_construct = $this->user->check_construction_en_cours($this->name_batiment, $this->user->champ_glycerine->prix);
		$this->if_enough_money = $this->user->verifiy_argent_user($this->user->champ_glycerine->prix);
				//on check si une cronstruction est en cours, et on set la var alert a 0 si pas et a 1 si il y a une construction et deux si pas assez d'argnet

		if(isset($_POST['construct']))
		{

			if($_POST['construct'] == 'lvl_mine_fer')
			{
				if($this->if_construct == 0 && $this->if_enough_money == 1)
				{
					// on va recuprer les données en base de données et on applique sur la table des construction le level suivant OK
			
					$time_finish = $this->user->user_infos->time_now + $this->user->champ_glycerine->time_construct;

					$this->user->insert_construction_en_cours($this->name_batiment, $time_finish);
					//ici je rappel la fonction qui gere la table user pour mettre a jour le fait qu'un batiment est lancé
					$this->user->set_argent_user($this->user->champ_glycerine->prix, "-");
					$this->if_construct = 1;
				}
			}
		}
		
		$time_finish = $this->user->set_time_finish($this->name_batiment);

		$this->get_html_tpl =  $this->assign_var("user", $this->user)
								->assign_var("time_finish", $time_finish)
								->assign_var("in_make", $this->if_construct)
								->render_tpl();
	}
}