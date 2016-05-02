<?
Class router
{
	private $get = [];
	private $echo_get;
	private $route;

	public function router($get = array())
	{

		
		$this->route = $get;
		
		if(!isset($this->route['construct'])) $this->route['construct'] = "";
			
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
							
				else
					unset($this->route['page']);
					$error[] = "Le call _GET au routeur n'existe pas:  controller = Router on passe au construct";
			

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


}