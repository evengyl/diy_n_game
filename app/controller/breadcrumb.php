<?php

Class breadcrumb extends base_module
{

	public function __construct($module_tpl_name, $user = "", $is_connect= "")
	{	
		global $bread;	
		parent::__construct($module_tpl_name);
		if(isset($bread[0]))
		{
			$breadcrumb = $this->generate_breadcrumb(array("Accueil" => "?page=home", $bread[0] => "?page=".$bread[1]));
		}
		else
		{
			$breadcrumb = $this->generate_breadcrumb(array("Accueil" => "?page=home"));
		}

		
		return $this->assign_var("user", $user)->assign_var("is_connect", $is_connect)->assign_var("breadcrumb", $breadcrumb)->render();
	}

}


