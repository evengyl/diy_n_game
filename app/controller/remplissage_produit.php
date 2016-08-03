<?php 

Class remplissage_produit extends base_module
{

	public function __construct($module_tpl_name, &$user)
	{		
		parent::__construct($module_tpl_name, $user);

		return $this->render();
	}
}
