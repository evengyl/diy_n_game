<?php 
Class ressource extends base_module
{

	public function __construct()
	{		
		parent::__construct(__CLASS__);

		//converti les point en point avec virgule francaise
		$this->user->get_variable_user();
		$this->user->user_infos->point = str_replace(".", ",", $this->user->user_infos->point);
		$this->user->user_infos->point_vente = str_replace(".", ",", $this->user->user_infos->point_vente);



		return $this->assign_var("user", $this->user)->render();
	}

}


