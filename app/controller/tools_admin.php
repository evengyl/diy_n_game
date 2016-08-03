<?
Class tools_admin extends base_module
{

	public function __construct($module_tpl_name, &$user)
	{		
		parent::__construct($module_tpl_name, $user);

		//je veux que ce controller puisse recevoir un post

		return $this->assign_var("user",$user)->render();
	}

}
