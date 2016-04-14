<?php 
class game_home extends base_module
{
	public $name_tpl;
	public $page_tpl;

	public function __construct($name_module, $name_tpl)
	{	
		$this->name_tpl = $name_tpl;	
		$this->page_tpl = $this->render_tpl($name_tpl);

		$breadcrumb = $this->generate_breadcrumb(array("Accueil" => "?page=game_home", "Présentation générale" => "?page=game_home"));

		return $this->page_tpl = $breadcrumb."".$this->page_tpl;
	}




}
