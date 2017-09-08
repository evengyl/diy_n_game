<?php

class Config
{
    public static $hote = "evengylbiznecro.mysql.db";
    public static $user = "evengylbiznecro";
    public static $Mpass = "Darkevengyl4";

    public static $base_path = "/diy_n_game";


    public static $prefix_sql = "";
    public static $base = "";
    public static $path_public = "";
    public static $mail = "";
    public static $footer_text = "";
    public static $name_website = "";
    public static $name_head_nav = "";


    public static $view_time_executed_in_footer_page = false;
    public static $view_sql_list = false;
    public static $time_start_exec = 0;

    public static $is_connect = 0;
    public static $list_req_sql = array();

    public static $view_tpl_in_source_code = 1;



   
    public static function set_config_compared_domain()
    {
        if($_SERVER['SERVER_NAME'] != 'diy-and-game.com')
        {
            self::$path_public = "../public";
            self::$base_path = "/diy_n_game";

            self::$hote = "localhost";
            self::$user = "root";
            self::$Mpass = "darkevengyl";

            self::$base = 'diy_n_game';
        }
    }



    public static function set_name_base($base)
    {
        self::$base = $base;
    }

    public static function set_config_base()
    {
        $_config = file_get_contents('../app/modele/Config.conf', 'r');

        $_config = json_decode($_config);
        foreach($_config as $row_config_key => $row_config_values)
        {
            self::${$row_config_key} = $row_config_values;
        }
    }

    public static function get_config_base()
    {
        $_config = file_get_contents('../app/modele/Config.conf');

        return json_decode($_config);
    }

    public static function push_config_base($_get_config_to_push)
    {
        $_get_config_to_push = json_encode($_get_config_to_push);
        file_put_contents('../app/modele/Config.conf', $_get_config_to_push);
    }

    public static function set_list_req_sql($req_sql)
    {
            self::$list_req_sql[] = $req_sql;    
    }
    public static function get_sql_list()
    {
        if(self::$view_sql_list)
            affiche_pre(self::$list_req_sql);
    }


    

    //name for présenation général de l'entreprise.
    public static $level_culture_vg = "Champs de Glycérine";
    public static $level_usine_pg = "Usines de production de Propylène";
    public static $level_labos_bases = "Laboratoire d'amélioration des bases";

    public static $price_search_1_name = "Amélioration du prix de la recherche d'arômes de stade Inférieur";
    public static $price_search_2_name = "Amélioration du prix de la recherche d'arômes de stade Intermédiaire";
    public static $price_search_3_name = "Amélioration du prix de la recherche d'arômes de stade Supérieur";

    public static $chance_to_win_1_name = "Augmente les chances de trouver un arômes pour le stade de recherche Inférieur";
    public static $chance_to_win_2_name = "Augmente les chances de trouver un arômes pour le stade de recherche Intermédiaire";
    public static $chance_to_win_3_name = "Augmente les chances de trouver un arômes pour le stade de recherche Supérieur";

    public static $time_search_for_one_k_argent_depenser_name = "Diminue le temps de recherche des arômes de 60 secondes";

    public static $prix_vingt_quatre_vingt_name = "Diminue le prix de production des bases mélangées brute  20%/80%";
    public static $prix_cinquante_cinquante_name = "Diminue le prix de production des bases mélangées brute  50%/50%";
    public static $prix_quatre_vingt_vingt_name = "Diminue le prix de production des bases mélangées brute  80%/20%";
    public static $prix_cent_name = "Diminue le prix de production des bases mélangées brute 100% VG";


    // valeur de ratio de production des ressources de bases du jeu (a changer si c'est trop ou trop peu)
    public static $rate_vg_prod = 1;
    public static $rate_pg_prod = 1;
    public static $rate_labos_pourcent_down = 1.2;
    //end

    //variable de bases inscrite dans la base de données au démarrage d'un new joueur
    public static $last_culture_vg = 1000;
    public static $last_usine_pg = 1000;
    public static $argent = 5000;
    public static $litter_vg = 10;
    public static $litter_pg = 10;
    public static $frigo = 1;
    public static $pipette = 10;
    public static $flacon = 100;

    public static $bases_2080 = 0;
    public static $bases_5050 = 0;
    public static $bases_8020 = 0;
    public static $bases_1000 = 0;
    //fin des vairiable de base


    /*varible utilisée par les controller */
    //pour ajouter des recherche il faut ajouter ici, dans le tpl labos update, dans la base de données, et dans le module labos update
    //et faire les fonction de set dans le set update var global
    public static $nb_plantes_for_littre_at_start_game_labos_0 = 6000;
    public static $nb_propylene_for_littre_at_start_game_labos_0 = 4200;

    public static $nb_plantes_for_littre = 13000;
    public static $nb_propylene_for_littre = 10000;


    //arome list
    public static $price_search_1 = 1000;
    public static $price_search_2 = 2500;
    public static $price_search_3 = 5000;
    public static $price_search_1_de_base = 1000;
    public static $price_search_2_de_base = 2500;
    public static $price_search_3_de_base = 5000;

    public static $chance_to_win_1 = 10;
    public static $chance_to_win_2 = 25;
    public static $chance_to_win_3 = 50;
    public static $chance_to_win_1_de_base = 10;
    public static $chance_to_win_2_de_base = 25;
    public static $chance_to_win_3_de_base = 50;
    public static $time_search_for_one_k_argent_depenser = 3600;
    //end

    //synthses des bases 
    public static $prix_vingt_quatre_vingt = 450;
    public static $prix_cinquante_cinquante = 400;
    public static $prix_quatre_vingt_vingt = 370;
    public static $prix_cent = 350;
    //end

    //hardawre 
    public static $price_frigo = 1500;
    public static $price_frigo_10 = 14000;
    public static $price_frigo_100 = 130000;
    public static $price_frigo_1000 = 1200000;

    public static $nb_product_per_frigo = 1000;
    public static $nb_product_per_frigo_10 = 10000;
    public static $nb_product_per_frigo_100 = 100000;
    public static $nb_product_per_frigo_1000 = 1000000;



    public static $price_pipette_10 = 5;
    public static $price_pipette_100 = 47;
    public static $price_pipette_1000 = 450;
    public static $price_pipette_10000 = 4300;


    public static $price_flacon_10 = 1;
    public static $price_flacon_100 = 9.5;
    public static $price_flacon_1000 = 80;
    public static $price_flacon_10000 = 750;
    

    //end


    //creation de produit
    public static $price_for_un_product = 2;
    public static $nb_pipette_per_product = 1;
    public static $nb_flacon_per_product = 1;
    public static $duree_peremption = 2592000;
    //end



    //vente des produits
    public static $duree_random_prod = 604800;
    public static $nb_random_prod_shop = 18;
    public static $sell_product_random = 15;
    public static $sell_product_not_random = 7;
    //end


    //amelioration et recherhce
        public static $array_name_search_and_price = 
            array(
               "price_search_1" => array('prix_level' => 10000, 'level_max' => 19),
               "price_search_2" => array('prix_level' => 15000, 'level_max' => 19),
               "price_search_3" => array('prix_level' => 20000, 'level_max' => 19),
               "chance_to_win_1" => array('prix_level' => 20000, 'level_max' => 50),
               "chance_to_win_2" => array('prix_level' => 30000, 'level_max' => 50),
               "chance_to_win_3" => array('prix_level' => 40000, 'level_max' => 50),
               "time_search_for_one_k_argent_depenser" => array('prix_level' => 50000, 'level_max' => 50),
               "prix_vingt_quatre_vingt" => array('prix_level' => 15000, 'level_max' => 30),
               "prix_cinquante_cinquante" => array('prix_level' => 15000, 'level_max' => 30),
               "prix_quatre_vingt_vingt" => array('prix_level' => 15000, 'level_max' => 30),
               "prix_cent" => array('prix_level' => 15000, 'level_max' => 30));

    /* fin des var utilisée par les controller */

    




    
}
