<?php 
Class ressource extends base_module
{

	public function __construct($module_tpl_name)
	{		
		parent::__construct($module_tpl_name);
		

		return $this->assign_var("user", $this->user_obj)->render();
	}

}


