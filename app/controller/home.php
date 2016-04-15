<?
Class home extends base_module
{
	public function __construct($module_tpl_name)
	{		
		parent::__construct($module_tpl_name);

		$breadcrumb = $this->generate_breadcrumb(array("Accueil" => "?page=home"));
		return $this->assign_var("title", $breadcrumb)->render();
	}

}


