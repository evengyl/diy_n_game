<?php 

Class stockage extends base_module
{
	public $tab_final_arome_acquis_traiter;

	public function __construct(&$_app)
	{		
		$_app->module_name = __CLASS__;
		parent::__construct($_app);
		$this->_app->navigation->set_breadcrumb("Consommation");

		//on vérifie si l'user à quelque chose en stock ou pas
		if(!empty($this->user->product->list_product))
			$this->tab_final_arome_acquis_traiter = $this->get_list_product();

		$this->get_html_tpl =  $this->assign_var("tab_final_arome_acquis_traiter", $this->tab_final_arome_acquis_traiter)->render_tpl();
	}

	public function get_list_product()
	{
		$tab_final_arome_acquis_traiter = $this->user->set_list_product_acquis_for_tpl();

		return $tab_final_arome_acquis_traiter;
	}
}
