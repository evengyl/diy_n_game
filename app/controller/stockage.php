<?php 

Class stockage extends base_module
{
	public $tab_final_arome_acquis_traiter;

	public function __construct($module_tpl_name, &$user)
	{		
		parent::__construct($module_tpl_name, $user);

		$this->tab_final_arome_acquis_traiter = $this->get_list_product($user);

		return $this->assign_var("tab_final_arome_acquis_traiter", $this->tab_final_arome_acquis_traiter)->render();
	}

	public function get_list_product($user)
	{
		$tab_final_arome_acquis_traiter = user_ressources::set_list_product_acquis_for_tpl($user);
		return $tab_final_arome_acquis_traiter;
	}
}
