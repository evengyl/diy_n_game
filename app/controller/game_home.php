<?php 

Class game_home extends base_module
{
	public function __construct($module_tpl_name, $user = "")
	{		
		parent::__construct($module_tpl_name);

		
		return $this->assign_var("user", $user)->render();
	}

}



