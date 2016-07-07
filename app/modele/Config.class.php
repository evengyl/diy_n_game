<?php

class Config
{
    public static $hote = "localhost";
    public static $user = "root";
    public static $Mpass = "darkevengyl";
    public static $base = 'diy_n_game';

    public static $path_app = "../app";
    public static $path_public = "../public";
    public static $base_path = "/diy_n_game";

    public static $mail = "dark.evengyl@gmail.com";

    /* variable de bases */

//name for présenation général de l'entreprise.
    public static $level_culture_vg = "Champs de Glycérine";
    public static $level_usine_pg = "Usines de production de Propylène";
    public static $level_labos_bases = "Laboratoire d'amélioration des bases";

    public static $price_search_1_name = "Amélioration du prix de la recherche d'arômes de stade 1";
    public static $price_search_2_name = "Amélioration du prix de la recherche d'arômes de stade 2";
    public static $price_search_3_name = "Amélioration du prix de la recherche d'arômes de stade 3";


    public static $last_culture_vg = 1000;
    public static $last_usine_pg = 1000;
    public static $argent = 1500;
    public static $litter_vg = 10;
    public static $litter_pg = 10;

    public static $bases_2080 = 0;
    public static $bases_5050 = 0;
    public static $bases_8020 = 0;
    public static $bases_1000 = 0;

    /* fin des vairiable de base */

    /*varible utilisée par les controller */
    //pour ajouter des recherche il faut ajouter ici, dans le tpl labos update, dans la base de données, et dans le module labos update
    //et faire les fonction de set dans le set update var global
            public static $nb_plantes_for_littre = 3000;
            public static $nb_propylene_for_littre = 2100;


        //arome list
            public static $price_search_1 = 1000;
            public static $price_search_2 = 2500;
            public static $price_search_3 = 5000;

            public static $chance_to_win_1 = 10;
            public static $chance_to_win_2 = 25;
            public static $chance_to_win_3 = 50;
            public static $time_search_for_one_k_argent_depenser = 3600;
        //end

        //synthses des bases 
            public static $prix_vingt_quatre_vingt = 450;
            public static $prix_cinquante_cinquante = 400;
            public static $prix_quatre_vingt_vingt = 370;
            public static $prix_cent = 350;
        //end


    /* fin des var utilisée par les controller */

    public static $is_connect;

    public static function set_name_base($base)
    {
        self::$base = $base;
    }



    public static $list_req_sql = array();

    public static function set_list_req_sql($req_sql)
    {
        self::$list_req_sql[] = $req_sql;    
    }



    
}

