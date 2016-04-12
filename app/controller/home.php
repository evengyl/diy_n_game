<?php 
class home extends base_module
{
	public $name_tpl;
	public $page_tpl;

	public function __construct($name_tpl)
	{		
		$this->page_tpl = $this->render_tpl($name_tpl);

		$breadcrumb = $this->generate_breadcrumb(array("Accueil" => "?page=home"));

		$this->page_tpl = $breadcrumb."".$this->page_tpl;
	}




}

global $matching_tpl;
$return_controller = new home($matching_tpl);