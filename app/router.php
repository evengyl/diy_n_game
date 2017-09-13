<?
Class router
{
	public $route;

	public function __construct($route, &$_app)
	{
		$this->route = $route;
		$_app->route = $route;
		

		if(isset($this->route))
		{
			switch($this->route)
			{
				case 'home':
				$this->assign_mod();
				break;

				case 'sign_up':
					$this->assign_mod();
					break;

				case 'admin':
					$this->is_connect()->assign_mod();
					break;
				
				case 'login':
			 		$this->assign_mod();
			 		break;

			 	case 'game_home':
					$this->is_connect()->assign_mod();
					break;

				case 'test':
					$this->assign_mod();
					break;

				case 'contact':
					$this->assign_mod();
					break;

				case 'mine_de_fer':
					$this->is_connect()->assign_mod();
					break;

				case 'usine_propylene':
					$this->is_connect()->assign_mod();
					break;
				
				case 'labos_bases':
					$this->is_connect()->assign_mod();
					break;

				case 'synthese_bases':
					$this->is_connect()->assign_mod();
					break;

				case 'search_arome':
					$this->is_connect()->assign_mod();
					break;
				
				case 'labos_update_tools':
					$this->is_connect()->assign_mod();
					break;

				case 'buy_hardware':
					$this->is_connect()->assign_mod();
					break;

				case 'remplissage_produit':
					$this->is_connect()->assign_mod();
					break;

				case 'stockage':
					$this->is_connect()->assign_mod();
					break;

				case 'classement':
					$this->is_connect()->assign_mod();
					break;

				case 'my_account':
					$this->is_connect()->assign_mod();
					break;

				case 'shop':
					$this->is_connect()->assign_mod();
					break;

				case 'documentation':
					$this->assign_mod();
					break;

				case 'note_and_version':
					$this->assign_tpl();
					break;

				case 'partenaire':
					$this->assign_tpl();
					break;

				case 'aide':
					$this->assign_tpl();
					break;

				case 'avatar':
					$this->assign_mod();
					break;

				case 'password_change':
					$this->assign_mod('my_account');
					break;

				case 'mail_box':
					$this->assign_mod('my_account');
					break;
				

				default:
					$_SESSION['error'] = "Cette route n'existe pas, veuiller vérifier le nom donner dans vos controlleurs ou si ce controlleur existe dans la table de routage : ".$this->route;
					unset($this->route);
			}
		}
	}


	protected function is_connect()
	{
		if(Config::$is_connect == 1)
			return $this;
		else
		{
			//permet de retourner sur la page login quand une page non permise est demandée
			$this->route = 'security';
			return $this;
		}
	}



	protected function assign_mod($specific_module = false, $module_secondaire = false, $var_module = false, $tpl = false)
	{
		if($tpl)
			$pre_echo_mod = "__TPL";
		else
			$pre_echo_mod = "__MOD";

		if($module_secondaire)
			$pre_echo_mod .= "2_";
		else
			$pre_echo_mod .= "_";

		if($specific_module)
			$pre_echo_mod .= $specific_module;
		else
			$pre_echo_mod .= $this->route;

		if($var_module)
			$pre_echo_mod .= "(".$var_module.")";


		$pre_echo_mod .= "__";
		echo $pre_echo_mod;
	}
}