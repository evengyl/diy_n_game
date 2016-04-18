<?php

Class breadcrumb extends base_module
{

	public function __construct($module_tpl_name)
	{	

		parent::__construct($module_tpl_name);

		if(isset($_GET['page']))
		{
			$breadcrumb = $this->generate_breadcrumb(array("Accueil" => "?page=home", $_GET['page'] => "?page=".$_GET['page']));
		}
		else
		{
			$breadcrumb = $this->generate_breadcrumb(array("Accueilf" => "?page=home"));
		}
		
		return $this->assign_var("breadcrumb", $breadcrumb)->render();
	}

}


