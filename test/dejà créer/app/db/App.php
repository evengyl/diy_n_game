<?php
namespace Evengyl\db;

Class App
{


    private static $_instance;

    public static $_nb_articles_random_home_page = 4;

    private static $database;

    const DB_NAME = "game_robot";
    const DB_USER = "root";
    const DB_PASS = "darkevengyl";
    const DB_HOST = "localhost";

    const LOGO = "Robot";


    public static function get_instance()
    {
        if(is_null(self::$_instance))
        {
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    public static function DB()
    {
        if(self::$database == null)
        {
            self::$database = new \Evengyl\db\Database(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST);

        }
        return  self::$database;


    }
    public static function set_logo_website()
    {
        $name_website = self::LOGO;
        $name_website = strtolower($name_website);

        $name_website = "/images/logo_" . $name_website . ".png";
        return $name_website;
    }

    public static function affiche_pre($text)
    {
        ?><pre><?php print_r($text); ?></pre><?php
    }
}

?>