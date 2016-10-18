<?php 
Class header extends base_module
{

	public function __construct()
	{		
		parent::__construct(__CLASS__);

		return $this->assign_var("user", $this->user)->render();
	}

}


