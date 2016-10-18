<?php 

Class test extends base_module
{
	public function __construct()
	{		
		parent::__construct(__CLASS__);

		return $this->assign_var("user", $this)->render();
	}

}
