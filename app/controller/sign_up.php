<?php 

Class sign_up extends base_module
{
	public function __construct($module_tpl_name)
	{		
		parent::__construct($module_tpl_name);

		return $this->render();
	}

}

