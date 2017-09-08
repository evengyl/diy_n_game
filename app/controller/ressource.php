<?php 
Class ressource extends base_module
{

	public function __construct(&$_app)
	{		
		$_app->module_name = __CLASS__;
		parent::__construct($_app);

		//converti les point en point avec virgule francaise
		affiche_pre($this->user);
		$this->user->get_variable_user();
		$this->user->user_infos->point = str_replace(".", ",", $this->user->user_infos->point);
		$this->user->user_infos->point_vente = str_replace(".", ",", $this->user->user_infos->point_vente);



		$this->get_html_tpl =  $this->assign_var("user", $this->user)->render_tpl();
	}

}


