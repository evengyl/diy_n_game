<?php 
class sign_up extends base_module
{
	public $name_tpl;
	public $page_tpl;

	public function __construct($module_name, $name_tpl)
	{		
		$this->name_tpl = $name_tpl;
		$this->page_tpl = $this->render_tpl($name_tpl);

		$breadcrumb = $this->generate_breadcrumb(array("Accueil" => "?page=home", "Page d'inscription" => "?page=sign_up"));

		return $this->page_tpl = $breadcrumb."".$this->page_tpl;
	}
}
