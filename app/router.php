<?
Class router
{
	private $parser;

	public function __construct()
	{
		$this->parser = new parser();
	}

	public function router($get = array())
	{
		global $error;
		if(!empty($get))
		{
			if(isset($get['page']))
			{
				switch($get['page'])
				{
					case 'home':
						$this->call_controller_tpl_router('home');
						break;
					case 'sign_up':
						$this->call_controller_tpl_router('sign_up');
						break;
					case 'login':
						$this->call_controller_tpl_router('login');
						break;
					case 'game_home':
						$this->call_controller_tpl_router('game_home');
						break;
					default:
						$error[] = "Le call _GET au routeur n'existe pas:  controller = Router";
						break;

				}

			}
		}
		else
			return;
		//ici on recois les gets directement depuis l'index, il faut les traiter et les renvoiyer 
		//le routeur doit permettre d'appeler des module


	}


	public function call_controller_tpl_router($var_in_get)
	{
		//appel le controller et ensuite le tpl
		$format_for_parser_mod = '__MOD_'.$var_in_get.'__';
		echo $this->parser->parser_main($format_for_parser_mod);
		//ici, si une erreur survient , le template ne sera pas généré du coup on recois le $error 

	}


	public function call_tpl_router($var_in_get)
	{
		
		$format_for_parser_tpl = '__TPL_'.$var_in_get.'__';
		echo $this->parser->parser_main($format_for_parser_tpl);
	}

}