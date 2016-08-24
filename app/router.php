<?
Class router
{
	private $get = array();
	private $echo_get;
	public $route = array();

	public function router($get = array())
	{

		
		$this->route = $get;
		
		if(!isset($this->route['construct']))
			$this->route['construct'] = "";


		$this->is_connect = Config::$is_connect;

		global $error;
		//ici on recois les gets directement depuis l'index, il faut les traiter et les renvoiyer 
		//le routeur doit permettre d'appeler des module
		if(isset($this->route['page']))
		{

				if($this->route['page'] == 'home')
					$this->get()->assign_bread($title_brd = "")->assign_mod();

				else if($this->route['page'] == 'sign_up')
					$this->get()->assign_bread($title_brd = "Page d'inscription")->assign_mod();

				else if($this->route['page'] == 'tools_admin')
					$this->get()->is_connect()->assign_bread($title_brd = "Page d'administration diverse")->assign_mod();
				
				else if($this->route['page'] == 'login')
			 		$this->get()->assign_bread($title_brd = "Page de connexion")->assign_mod();

			 	else if($this->route['page'] == 'game_home')
					$this->get()->is_connect()->assign_bread($title_brd = "Présentation général de votre entreprise")->assign_mod();

				else if($this->route['page'] == 'test')
					$this->get()->assign_bread($title_brd = "test")->assign_mod();

				else if($this->route['page'] == 'contact')
					$this->get()->assign_bread($title_brd = "Page de contact")->assign_mod();

				else if($this->route['page'] == 'champ_glycerine')
					$this->get()->is_connect()->assign_bread($title_brd = "Culture des champs de Glycérine")->assign_mod_var($this->route['construct']);

				else if($this->route['page'] == 'usine_propylene')
					$this->get()->is_connect()->assign_bread($title_brd = "Installation industrielle de propylène")->assign_mod_var($this->route['construct']);
				
				else if($this->route['page'] == 'labos_bases')
					$this->get()->is_connect()->assign_bread($title_brd = "Laboratoire pharmaceutique de mélanges")->assign_mod_var($this->route['construct']);

				else if($this->route['page'] == 'synthese_bases')
					$this->get()->is_connect()->assign_bread($title_brd = "Laboratoire pharmaceutique de synthétisation")->assign_mod();

				else if($this->route['page'] == 'search_arome')
					$this->get()->is_connect()->assign_bread($title_brd = "Liste des aromes des laboratoires de recherche")->assign_mod();
				
				else if($this->route['page'] == 'labos_update_tools')
					$this->get()->is_connect()->assign_bread($title_brd = "Laboratoires de recherche et d'amélioration")->assign_mod();

				else if($this->route['page'] == 'buy_hardware')
					$this->get()->is_connect()->assign_bread($title_brd = "Central d'achat pour la conception de juice")->assign_mod();

				else if($this->route['page'] == 'remplissage_produit')
					$this->get()->is_connect()->assign_bread($title_brd = "Usine de remplassage des flacons en produits finis")->assign_mod();

				else if($this->route['page'] == 'my_account')
					$this->get()->is_connect()->assign_bread($title_brd = "Mon compte")->assign_mod();

				else if($this->route['page'] == 'documentation')
					$this->get()->assign_bread($title_brd = "Documentation")->assign_mod();

							
				else
				{
					unset($this->route['page']);
					$error[] = "Le call _GET au routeur n'existe pas:  controller = Router on passe au construct";
				}

			

		}

	}


	private function is_connect()
	{
		if($this->is_connect == 1)
			return $this;
		else
		{
			$this->route['page'] = 'login';
			$this->router($this->route['page']);
			return $this;
		}
			
	}

	private function get()
	{
		return $this;
	}

	private function assign_tpl()
	{
		echo "__TPL_".$this->route['page']."__";
	}

	private function assign_bread($title_brd)
	{
		echo "__MOD_breadcrumb(".$title_brd.")__";
		return $this;
	}

	private function assign_mod()
	{
		echo "__MOD_".$this->route['page']."__";
	}

	private function assign_mod_var($var)
	{
		echo "__MOD_".$this->route['page']."(".$var.")__";
	}


	private function assign_mod2_var($var)
	{
		echo "__MOD2_".$this->route['page']."(".$var.")__";
	}

}