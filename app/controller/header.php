<?php 
Class header extends base_module
{

	public function __construct($module_tpl_name, $user = "", $is_connect= "")
	{		
		parent::__construct($module_tpl_name);

		return $this->assign_var("user", $user)->assign_var("is_connect", $is_connect)->render();
	}

}


