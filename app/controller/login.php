<?php 

Class login extends base_module
{
	public function __construct($module_tpl_name)
	{		
		parent::__construct($module_tpl_name);

		$breadcrumb = $this->generate_breadcrumb(array("Accueil" => "?page=home", "Page de connexion" => "?page=login"));

		return $this->assign_var("title", $breadcrumb)->render();
	}

}
