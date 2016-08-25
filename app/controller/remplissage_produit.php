<?php 

Class remplissage_produit extends base_module
{

	public $tab_final_arome_acquis = array();
	public $tab_final_arome_acquis_traiter = array();

	public function __construct($module_tpl_name, &$user)
	{		
		parent::__construct($module_tpl_name, $user);

		$this->tab_final_arome_acquis_traiter = user_ressources::set_arome_acquis_for_tpl($user);

		affiche_pre($this->tab_final_arome_acquis_traiter);

		return $this->assign_var("user", $user)->render();
	}
}
