<?php

class Config
{
    public static $hote = "localhost";
    public static $user = "root";
    public static $Mpass = "darkevengyl";
    public static $base = 'diy_n_game';

    public static $path_public = "../public";
    public static $base_path = "/diy_n_game";

    public static $mail = "dark.evengyl@gmail.com";
    public static $is_connect = 0;



    public static function set_name_base($base)
    {
        self::$base = $base;
    }



    public static $list_req_sql = array();

    public static function set_list_req_sql($req_sql)
    {
        self::$list_req_sql[] = $req_sql;    
    }


    

    //name for présenation général de l'entreprise.
    public static $level_culture_vg = "Champs de Glycérine";
    public static $level_usine_pg = "Usines de production de Propylène";
    public static $level_labos_bases = "Laboratoire d'amélioration des bases";

    public static $price_search_1_name = "Amélioration du prix de la recherche d'arômes de stade 1";
    public static $price_search_2_name = "Amélioration du prix de la recherche d'arômes de stade 2";
    public static $price_search_3_name = "Amélioration du prix de la recherche d'arômes de stade 3";

    public static $chance_to_win_1_name = "Augmente les chances de trouver un arômes pour le stade de recherche 1";
    public static $chance_to_win_2_name = "Augmente les chances de trouver un arômes pour le stade de recherche 2";
    public static $chance_to_win_3_name = "Augmente les chances de trouver un arômes pour le stade de recherche 3";

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
    public static $argent = 1500;
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
    public static $nb_random_prod_shop = 20;
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
