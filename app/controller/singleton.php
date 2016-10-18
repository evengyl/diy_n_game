<?
class singleton
{
 
   private static $_instance = null;
   public $user;

   private function __construct()
   {
      $this->user = new min_require();
   }
 

   public static function getInstance()
   {
     if(is_null(self::$_instance))
     {
        self::$_instance = new singleton();  
     }
 
     return self::$_instance;
   }

}


