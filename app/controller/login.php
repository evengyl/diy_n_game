<?php 
class login extends base_module
{
	public $name_tpl;
	public $page_tpl;

	public function __construct($name_tpl)
	{		
		$this->name_tpl = $name_tpl;		
		$this->page_tpl = $this->render_tpl($name_tpl);
	}
}

global $matching_tpl;
$return_controller = new login($matching_tpl);