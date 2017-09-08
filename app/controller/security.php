<?php 

Class security extends base_module
{
	public $sql = "";
	public function __construct(&$_app)
	{
		if(isset($_GET['logout']) && $_GET['logout'])
			$this->logout();

		if(!isset($_app->sql))		
			$_app->sql = new all_query();
		
		$_app->module_name = __CLASS__;
		parent::__construct($_app);

		

		//va checker a chaque page si on est bien logger
		if(isset($_POST['return_form_complet']) || isset($_POST['return_form_complet_lost_login']))
		{
			$login = new login($_app);
			Config::set_config_compared_domain();	
			Config::$is_connect =  $login->check_session($_POST);
		}
		else if(isset($_SESSION['pseudo']))
            Config::$is_connect =  1;
		else
            Config::$is_connect =  0;


        if(Config::$is_connect)
        	$_app->user = singleton::get_singleton();
		else
			$_app->user = "";
	}

	private function logout()
	{
		if(isset($_SESSION['pseudo']) && isset($_SESSION['level']) && isset($_SESSION['last_connect']) && isset($_SESSION['is_connect']))
		{
			session_destroy();
			header('Location: /diy_n_game/public/index.php');
		}
	}
}