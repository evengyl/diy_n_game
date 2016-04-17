<?
Class router
{
	private $get = [];
	private $echo_get;
	private $route;

	public function router($get = array())
	{
		$this->route = $get;
		$this->is_connect = Config::$is_connect;;

		global $error, $bread;

		//ici on recois les gets directement depuis l'index, il faut les traiter et les renvoiyer 
		//le routeur doit permettre d'appeler des module
		if(isset($this->route['page']))
		{
			if($this->route['page'] == 'home')
				$this->get('home')->assign_mod();

			else if($this->route['page'] == 'sign_up')
				$this->get('sign_up')->assign_bread(array("Page d'inscription" => $this->route['page']))->assign_mod();
			
			else if($this->route['page'] == 'login')
		 		$this->get('login')->assign_bread(array("Page de connexion" => $this->route['page']))->assign_mod();

		 	else if($this->route['page'] == 'game_home')
				$this->get('game_home')->is_connect()->assign_mod();

			else if($this->route['page'] == 'test')
				$this->get('test')->assign_tpl();

			else if($this->route['page'] == 'contact')
				$this->get('contact')->assign_bread(array("Page de contact", $this->route['page']))->assign_mod();
			
			else
				$error[] = "Le call _GET au routeur n'existe pas:  controller = Router";
		}
		

		

		




//$error[] = "Vous n'êtes pas connecter donc vous ne pouvez pas accèder au jeu.";



	}


	private function is_connect()
	{
		if($this->is_connect == 1)
			return $this;
		else
		{
			$this->route['page'] = 'login';
			$this->router($this->route['page']);
		}
			
	}

	private function assign_bread($bread = array())
	{
		$bread = $bread;
		return $this;
	}

	private function get($get)
	{
		$this->echo_get = $this->route['page'];
		return $this;
	}

	private function assign_tpl()
	{
		echo "__TPL_".$this->route['page']."__";
	}

	private function assign_mod()
	{
		echo "__MOD_".$this->route['page']."__";
	}


}