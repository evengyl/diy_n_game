<?
Class tools_admin extends base_module
{

	public function __construct()
	{		
		parent::__construct(__CLASS__);

		//je veux que ce controller puisse recevoir un post

		return $this->assign_var("user",$this)->render();
	}

}
