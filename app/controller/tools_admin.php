<?
Class tools_admin extends base_module
{

	public function __construct(&$_app)
	{		
		$_app->module_name = __CLASS__;
		parent::__construct($_app);
		$this->_app->navigation->set_breadcrumb("Consommation");

		//je veux que ce controller puisse recevoir un post

		$this->get_html_tpl =  $this->assign_var("user",$this)->render_tpl();
	}

}
