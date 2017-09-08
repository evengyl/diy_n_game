<?
Class home extends base_module
{
	public function __construct(&$_app)
	{		
		$_app->module_name = __CLASS__;
		parent::__construct($_app);
		$this->_app->navigation->set_breadcrumb("Page d'acceuil");

		
		$this->get_html_tpl =  $this->render_tpl();
	}

}


