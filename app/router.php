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

		if(isset($this->route['page']))
		{
			if($this->route['page'] == 'home')
				$this->assign_bread("")->assign_mod();

			else if($this->route['page'] == 'sign_up')
				$this->assign_bread("Page d'inscription")->assign_mod();

			else if($this->route['page'] == 'tools_admin')
				$this->is_connect()->assign_bread("Page d'administration diverse")->assign_mod();
			
			else if($this->route['page'] == 'login')
		 		$this->assign_bread("Page de connexion")->assign_mod();

		 	else if($this->route['page'] == 'game_home')
				$this->is_connect()->assign_bread("Présentation général de votre entreprise")->assign_mod();

			else if($this->route['page'] == 'test')
				$this->assign_bread("test")->assign_mod();

			else if($this->route['page'] == 'contact')
				$this->assign_bread("Page de contact")->assign_mod();

			else if($this->route['page'] == 'champ_glycerine')
				$this->is_connect()->assign_bread("Culture des champs de Glycérine")->assign_mod();

			else if($this->route['page'] == 'usine_propylene')
				$this->is_connect()->assign_bread("Installation industrielle de propylène")->assign_mod();
			
			else if($this->route['page'] == 'labos_bases')
				$this->is_connect()->assign_bread("Laboratoire pharmaceutique de mélanges")->assign_mod();

			else if($this->route['page'] == 'synthese_bases')
				$this->is_connect()->assign_bread("Laboratoire pharmaceutique de synthétisation")->assign_mod();

			else if($this->route['page'] == 'search_arome')
				$this->is_connect()->assign_bread("Liste des aromes des laboratoires de recherche")->assign_mod();
			
			else if($this->route['page'] == 'labos_update_tools')
				$this->is_connect()->assign_bread("Laboratoires de recherche et d'amélioration")->assign_mod();

			else if($this->route['page'] == 'buy_hardware')
				$this->is_connect()->assign_bread("Central d'achat pour la conception de juice")->assign_mod();

			else if($this->route['page'] == 'remplissage_produit')
				$this->is_connect()->assign_bread("Usine de remplassage des flacons en produits finis")->assign_mod();

			else if($this->route['page'] == 'stockage')
				$this->is_connect()->assign_bread("Listing des produits en stock")->assign_mod();

			else if($this->route['page'] == 'classement')
				$this->is_connect()->assign_bread("Classement général des meilleurs shops")->assign_mod();

			else if($this->route['page'] == 'my_account')
				$this->is_connect()->assign_bread("Mon compte")->assign_mod();

			else if($this->route['page'] == 'documentation')
				$this->assign_bread("Documentation")->assign_mod();

			else
			{
				unset($this->route['page']);
				$_SESSION['error'] = "Le call _GET au routeur n'existe pas:  controller = Router on passe au construct";
			}
		}
	}


	private function is_connect()
	{
		if(Config::$is_connect == 1)
			return $this;
		else
		{
			//permet de retourner sur la page login quand une page non permise est demandée
			$this->route['page'] = 'login';
			$this->router($this->route['page']);
			return $this;
		}
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