<?php 

Class labos_update_tools extends base_module
{
	public $alert_construction_en_cours = 0;

	public $array_name_search_and_price = array(
           "price_search_1" => 10000,
           "price_search_2" => 15000,
           "price_search_3" => 20000,
           "chance_to_win_1" => 20000,
           "chance_to_win_2" => 30000,
           "chance_to_win_3" => 40000,
           "time_search_for_one_k_argent_depenser" => 50000,
           "prix_vingt_quatre_vingt" => 5000,
           "prix_cinquante_cinquante" => 5000,
           "prix_quatre_vingt_vingt" => 5000,
           "prix_cent" => 5000);

	public function __construct($module_tpl_name, &$user)
	{		
		parent::__construct($module_tpl_name, $user);

		//va vérifier si une recherhce est lancée		
		foreach($this->array_name_search_and_price as $row_name => $row_price)
		{
			$this->alert_construction_en_cours = $this->check_update_en_cours($row_name, $row_price);
			if($this->alert_construction_en_cours == 1) // si il y a une recherche on interromp la boucle
				break;
		}


		if($this->alert_construction_en_cours == 0)
		{
			if(isset($_POST['price']) && isset($_POST['name_search']))
			{
				$price = $_POST['price'];
				$name_batiment = $_POST['name_search'];

				$this->time_finish_construct(5400);
				$real_name_search = $name_batiment."_name";

				$this->insert_search_update_en_cours($name_batiment, $this->time_finish, Config::$$real_name_search);

				//$this->set_argent_user($price, "-");
				$this->user_obj->get_variable_user();
							//ça veux dire qu'il y a une recherhce en cours donc il faut set le temps de finition
				$this->alert_construction_en_cours = 1;
			}
		}


		return $this->assign_var("user", $user)->assign_var("time_finish", $this->time_finish)->assign_var("in_make", $this->alert_construction_en_cours)->render();
	}

}
