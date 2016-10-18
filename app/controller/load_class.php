<?

class Autoloader
{
    static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }


    static function autoload($class)
    {

        
        if($class == "_db_connect" || $class == "Config")
        	require "../app/modele/".$class.".class.php";
        else if($class == "router")
        	require "../app/".$class.".php";
        else if($class == "config")
            require "../app/modele/".$class.".class.php";
        else
        	require $class.'.php';
    }

}



?>