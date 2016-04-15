<?php 

Class game_home extends base_module
{
	public function __construct($module_tpl_name, $user = "", $is_connect= "")
	{		
		parent::__construct($module_tpl_name);

		$breadcrumb = $this->generate_breadcrumb(array("Accueil" => "?page=accueil", "Présentation générale" => "?page=game_home"));
		
		return $this->assign_var("user", $user)->assign_var("is_connect", $is_connect)->assign_var("title", $breadcrumb)->render();
	}

}



