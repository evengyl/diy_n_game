<?

function affiche_pre($var_a_print)
{
    ?><div class='col-xs-12' style='margin-bottom:50px;'><pre><?
        print_r($var_a_print);
    ?></pre></div><?
}


class user_a
{
	public $a;

	public function __construct()
	{
		$this->a = "tata";
		echo 'tata';
	}

	public function test()
	{
		affiche_pre("je suis un test de method");
	}
}


class user_b extends user_a
{
	public $d;

	public function __construct()
	{
		parent::__construct();
		$this->d = "tatata";
	}
}


class user_c extends user_b
{
	public $g;

	public function __construct()
	{
		parent::__construct();
		$this->g = "tatatata";
	}
}




 
class singleton
{
 
   private static $_instance = null;


   private function __construct()
   {
   		$this->user = new user_c;
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

  $user_a = singleton::getInstance();
  $user_b = singleton::getInstance();





