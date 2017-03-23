<?php 

Class user_set_global_var extends user_research_n_update
{

	public function __construct()
	{		
		parent::__construct();
    }	

    public function set_global__nb_plantes_for_littre()
    {
        //gain total
        $pourcent_down = $this->labos_bases->pourcent_down;

        Config::$nb_plantes_for_littre = Config::$nb_plantes_for_littre_at_start_game_labos_0 - ((Config::$nb_plantes_for_littre_at_start_game_labos_0 / 100) * $pourcent_down);
    }

    public function set_global__nb_propylene_for_littre()
    {
        //gain total
        $pourcent_down = $this->labos_bases->pourcent_down;

        Config::$nb_propylene_for_littre = Config::$nb_propylene_for_littre_at_start_game_labos_0 - ((Config::$nb_propylene_for_littre_at_start_game_labos_0 / 100) * $pourcent_down);
    }


    public function set_global__price_search_1()
    {
    	//gain total
    	$gain_per_level_search_arome = $this->gain_per_level_search_arome * $this->amelioration_var_config->price_search_1;

    	Config::$price_search_1 = Config::$price_search_1 - ((Config::$price_search_1 / 100)*$this->gain_per_level_search_arome);
    }
    public function set_global__price_search_2()
    {
        //gain total
        $gain_per_level_search_arome = $this->gain_per_level_search_arome * $this->amelioration_var_config->price_search_2;

        Config::$price_search_2 = Config::$price_search_2_de_base - ((Config::$price_search_2_de_base / 100)*$this->gain_per_level_search_arome);
    }
    public function set_global__price_search_3()
    {
    	//gain total
    	$gain_per_level_search_arome = $this->gain_per_level_search_arome * $this->amelioration_var_config->price_search_3;

    	Config::$price_search_3 = Config::$price_search_3 - ((Config::$price_search_3 / 100)*$this->gain_per_level_search_arome);
    }




    public function set_global__chance_to_win_1()
    {
    	//en %
    	$gain_per_level = 1;
    	//gain total
    	$gain_per_level = $gain_per_level * $this->amelioration_var_config->chance_to_win_1;

    	Config::$chance_to_win_1 = Config::$chance_to_win_1 + $gain_per_level;
    }
    public function set_global__chance_to_win_2()
    {
    	//en %
    	$gain_per_level = 1;
    	//gain total
    	$gain_per_level = $gain_per_level * $this->amelioration_var_config->chance_to_win_2;

    	Config::$chance_to_win_2 = Config::$chance_to_win_2 + $gain_per_level;
    }
    public function set_global__chance_to_win_3()
    {
    	//en %
    	$gain_per_level = 1;
    	//gain total
    	$gain_per_level = $gain_per_level * $this->amelioration_var_config->chance_to_win_3;

    	Config::$chance_to_win_3 = Config::$chance_to_win_3 + $gain_per_level;
    }




    public function set_global__time_search_for_one_k_argent_depenser()
    {
        //en sec
        $gain_per_level = 60;
        //gain total
        $gain_per_level = $gain_per_level * $this->amelioration_var_config->time_search_for_one_k_argent_depenser;

        Config::$time_search_for_one_k_argent_depenser = Config::$time_search_for_one_k_argent_depenser - $gain_per_level;

    }




    public function set_global__prix_vingt_quatre_vingt()
    {
        //en %
        $gain_per_level = 3;
        //gain total
        $gain_per_level = $gain_per_level * $this->amelioration_var_config->prix_vingt_quatre_vingt;

        Config::$prix_vingt_quatre_vingt = Config::$prix_vingt_quatre_vingt - ((Config::$prix_vingt_quatre_vingt / 100)*$gain_per_level);
    }
    public function set_global__prix_cinquante_cinquante()
    {
        //en %
        $gain_per_level = 3;
        //gain total
        $gain_per_level = $gain_per_level * $this->amelioration_var_config->prix_cinquante_cinquante;

        Config::$prix_cinquante_cinquante = Config::$prix_cinquante_cinquante - ((Config::$prix_cinquante_cinquante / 100)*$gain_per_level);
    }
    public function set_global__prix_quatre_vingt_vingt()
    {
        //en %
        $gain_per_level = 3;
        //gain total
        $gain_per_level = $gain_per_level * $this->amelioration_var_config->prix_quatre_vingt_vingt;

        Config::$prix_quatre_vingt_vingt = Config::$prix_quatre_vingt_vingt - ((Config::$prix_quatre_vingt_vingt / 100)*$gain_per_level);
    }
    public function set_global__prix_cent()
    {
        //en %
        $gain_per_level = 3;
        //gain total
        $gain_per_level = $gain_per_level * $this->amelioration_var_config->prix_cent;

        Config::$prix_cent = Config::$prix_cent - ((Config::$prix_cent / 100)*$gain_per_level);
    }
}
