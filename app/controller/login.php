<?php 
class login extends base_module
{
	public $name_tpl;
	public $page_tpl;

	public function __construct($name_module, $name_tpl)
	{		
		$this->page_tpl = $this->render_tpl($name_tpl);

		$breadcrumb = $this->generate_breadcrumb(array("Accueil" => "?page=home", "Page de connexion" => "?page=login"));

		$this->page_tpl = $breadcrumb."".$this->page_tpl;
	}
}
