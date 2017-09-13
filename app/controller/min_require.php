<?php 

Class min_require extends user_set_global_var
{
    public $user_infos;
    public $product;
    public $champ_glycerine;
    public $usine_propylene;
    public $labos_bases;
    public $bases;
    public $amelioration_var_config;
    public $search_arome;
    public $construction;
    public $update;
    public $hardware;

	public function __construct()
	{
		parent::__construct();

        if(isset($_SESSION['is_connect']))
        {
            if($_SESSION['is_connect'])
            {
                if(!isset($this->user_infos->is_ok) || !$this->user_infos->is_ok)
                {
                    //user start
                    $this->get_variable_user();
                    $this->user_infos->time_now = date("U");
                    $this->user_infos->id_arome_win = "";
                    $this->user_infos->diff_time = "";
                    $this->user_infos->nb_product_total = "";
                    $this->user_infos->list_arome_not_have = $this->compare_id_not_have_with_bsd(); //au cas ou des aromes sont suprimer, ou ajouter , il faut mettre les liste à jours
                    //user end

                    //user_account start
                    $this->calc_diff_time();
                    $this->maj_last_connect_db();
                    //user_account end

                    //user_batiment start
                    $this->validate_construct();
                    $this->set_prod_fer();
                    $this->set_object_user_tab_prod_pg();
                    $this->set_object_user_tab_labos();
                    //user_batiment end

                    //user_ressources start
                    $this->verify_peremption_product();
                    $this->calc_and_maj_ressource_user_in_db();
                    $this->calcul_nb_product_total();
                    //user_ressources end

                    //user_update start
                    $this->validate_update();
                    $this->validate_search_arome();
                    //user_update end

                    //user_set_global start
                    $this->gain_per_level_search_arome = 5;
                    $this->set_global__price_search_1();
                    $this->set_global__price_search_2();
                    $this->set_global__price_search_3();
                    $this->set_global__chance_to_win_1();
                    $this->set_global__chance_to_win_2();
                    $this->set_global__chance_to_win_3();
                    $this->set_global__time_search_for_one_k_argent_depenser();
                    $this->set_global__prix_vingt_quatre_vingt();
                    $this->set_global__prix_cinquante_cinquante();
                    $this->set_global__prix_quatre_vingt_vingt();
                    $this->set_global__prix_cent();
                    $this->set_global__nb_plantes_for_littre();
                    $this->set_global__nb_propylene_for_littre();
                    //user_set_global end

                    //pour eviter les double requete
                    $this->user_infos->is_ok = false;
                }
            }

        }
    }	
}
