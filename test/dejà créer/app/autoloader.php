<?php
namespace Evengyl;


Class AutoLoader
{
    static function autoload($name_class)
    {
        $name_class = str_replace('Evengyl\\', '', $name_class);
        $name_class = str_replace('\\', '/', $name_class);



        if(preg_match("/Database/", $name_class))
		{
            require "db/Database.php";
        }
        else if(preg_match("/App/", $name_class))
        {
            require "db/App.php";
        }

        else
        {
            require $name_class . ".class.php";
        }
    }

    /**
     *
     */
    static function register()
    {

        spl_autoload_register(array(__CLASS__, 'autoload'));
    }
}
