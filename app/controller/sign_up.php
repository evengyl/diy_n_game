<?php 

Class sign_up extends base_module
{
	public $test;
	public function __construct($module_tpl_name)
	{		

		$this->test = "test";

		parent::__construct($module_tpl_name);

		return $this->assign_var("test", "test")->render();
	}












}


