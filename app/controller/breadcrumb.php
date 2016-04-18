<?php

Class breadcrumb extends base_module
{

	public function __construct($module_tpl_name, $user, $var_in_match)
	{	

		parent::__construct($module_tpl_name);


		if(!empty($var_in_match))
		{
			$breadcrumb = $this->generate_breadcrumb(array("Accueil" => "?page=home", $var_in_match => "?page=".$_GET['page']));
		
		}
		else if(isset($_GET['page']))
		{
			$breadcrumb = $this->generate_breadcrumb(array("Accueil" => "?page=home", $_GET['page'] => "?page=".$_GET['page']));
		}
		else
		{
			$breadcrumb = $this->generate_breadcrumb(array("Accueil" => "?page=home"));
		}

		


		return $this->assign_var("breadcrumb", $breadcrumb)->render();
	}

}


