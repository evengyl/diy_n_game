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

		global $error;

		//ici on recois les gets directement depuis l'index, il faut les traiter et les renvoiyer 
		//le routeur doit permettre d'appeler des module
		if(isset($this->route['page']))
		{
			if($this->route['page'] == 'home')
				$this->get()->assign_mod();

			else if($this->route['page'] == 'sign_up')
				$this->get()->assign_mod();
			
			else if($this->route['page'] == 'login')
		 		$this->get()->assign_mod();

		 	else if($this->route['page'] == 'game_home')
				$this->get()->is_connect()->assign_bread()->assign_mod();

			else if($this->route['page'] == 'test')
				$this->get()->assign_tpl();

			else if($this->route['page'] == 'contact')
				$this->get()->assign_mod();
			
			else
				$error[] = "Le call _GET au routeur n'existe pas:  controller = Router";
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

	private function assign_bread()
	{
		return $this;
	}

	private function assign_mod()
	{
		echo "__MOD_breadcrumb(test)__    __MOD_".$this->route['page']."__";
	}


}