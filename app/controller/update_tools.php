<?php 

Class update_tools extends base_module
{

	public function __construct($module_tpl_name, &$user)
	{		
		parent::__construct($module_tpl_name, $user);


		//ce moduel servira pour setter les amélioration de tempsd ou de cout que l'on pourra faire dans le centre de recherhce et d'amélioration
		return $this->render();
	}


}
