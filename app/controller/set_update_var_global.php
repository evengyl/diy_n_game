<?php 

Class set_update_var_global extends base_module
{

	public function __construct($module_tpl_name = "", &$user)
	{		
		parent::__construct($module_tpl_name, $user);

		$this->set_global__price_search_1($user);
		$this->set_global__price_search_2($user);
		$this->set_global__price_search_3($user);
        $this->set_global__chance_to_win_1($user);
        $this->set_global__chance_to_win_2($user);
        $this->set_global__chance_to_win_3($user);
        $this->set_global__time_search_for_one_k_argent_depenser($user);

        
		//ce module va gerer les amélioration créee dans la bases de données concernant les recherhce pour améliorer les var du global

    }	

    public function set_global__price_search_1($user)
    {
    	//en %
    	$gain_per_level = 5;
    	//gain total
    	$gain_per_level = $gain_per_level * $user->amelioration_var_config->price_search_1;

    	Config::$price_search_1 = Config::$price_search_1 - ((Config::$price_search_1 / 100)*$gain_per_level);
    }
    public function set_global__price_search_2($user)
    {
    	//en %
    	$gain_per_level = 5;
    	//gain total
    	$gain_per_level = $gain_per_level * $user->amelioration_var_config->price_search_2;

    	Config::$price_search_2 = Config::$price_search_2 - ((Config::$price_search_2 / 100)*$gain_per_level);
    }
    public function set_global__price_search_3($user)
    {
    	//en %
    	$gain_per_level = 5;
    	//gain total
    	$gain_per_level = $gain_per_level * $user->amelioration_var_config->price_search_3;

    	Config::$price_search_3 = Config::$price_search_3 - ((Config::$price_search_3 / 100)*$gain_per_level);
    }




    public function set_global__chance_to_win_1($user)
    {
    	//en %
    	$gain_per_level = 1;
    	//gain total
    	$gain_per_level = $gain_per_level * $user->amelioration_var_config->chance_to_win_1;

    	Config::$chance_to_win_1 = Config::$chance_to_win_1 + $gain_per_level;
    }
    public function set_global__chance_to_win_2($user)
    {
    	//en %
    	$gain_per_level = 1;
    	//gain total
    	$gain_per_level = $gain_per_level * $user->amelioration_var_config->chance_to_win_2;

    	Config::$chance_to_win_2 = Config::$chance_to_win_2 + $gain_per_level;
    }
    public function set_global__chance_to_win_3($user)
    {
    	//en %
    	$gain_per_level = 1;
    	//gain total
    	$gain_per_level = $gain_per_level * $user->amelioration_var_config->chance_to_win_3;

    	Config::$chance_to_win_3 = Config::$chance_to_win_3 + $gain_per_level;
    }




    public function set_global__time_search_for_one_k_argent_depenser($user)
    {
        //en sec
        $gain_per_level = 60;
        //gain total
        $gain_per_level = $gain_per_level * $user->amelioration_var_config->time_search_for_one_k_argent_depenser;

        Config::$time_search_for_one_k_argent_depenser = Config::$time_search_for_one_k_argent_depenser - $gain_per_level;

    }



    
    public function set_global__prix_vingt_quatre_vingt()
    {

    }
    public function set_global__prix_cinquante_cinquante()
    {

    }
    public function set_global__prix_quatre_vingt_vingt()
    {

    }
    public function set_global__prix_cent()
    {

    }
}
