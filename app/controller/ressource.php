<?php 
Class ressource extends base_module
{

	public function __construct($module_tpl_name, &$user)
	{		
		parent::__construct($module_tpl_name, $user);

		//converti les point en point avec virgule francaise
		$user->user_infos->point = str_replace(".", ",", $user->user_infos->point);
		$user->user_infos->point_vente = str_replace(".", ",", $user->user_infos->point_vente);

		return $this->assign_var("user", $user)->render();
	}

}


