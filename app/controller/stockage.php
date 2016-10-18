<?php 

Class stockage extends base_module
{
	public $tab_final_arome_acquis_traiter;

	public function __construct()
	{		
		parent::__construct(__CLASS__);

		//on vérifie si l'user à quelque chose en stock ou pas
		if(!empty($this->product->list_product))
			$this->tab_final_arome_acquis_traiter = $this->get_list_product();

		return $this->assign_var("tab_final_arome_acquis_traiter", $this->tab_final_arome_acquis_traiter)->render();
	}

	public function get_list_product()
	{
		$tab_final_arome_acquis_traiter = $this->set_list_product_acquis_for_tpl();

		return $tab_final_arome_acquis_traiter;
	}



}
