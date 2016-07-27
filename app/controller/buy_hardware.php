<?php 

Class buy_hardware extends base_module
{

	public function __construct($module_tpl_name, &$user)
	{		
		parent::__construct($module_tpl_name, $user);

		if($_POST != "")
		{
			$this->traitement_post($_POST);
			$user->get_variable_user();
		}
			

		return $this->assign_var('user', $user)->render();
	}

	public function traitement_post($post)
	{
		if(isset($post['buy_frigo_1']))
			$this->receive_nb_frigo(1);

		if(isset($post['buy_frigo_10']))
			$this->receive_nb_frigo(10);

		if(isset($post['buy_pipette_1']))
			$this->receive_nb_pipette(1);

		if(isset($post['buy_pipette_10']))
			$this->receive_nb_pipette(10);

		if(isset($post['buy_pipette_100']))
			$this->receive_nb_pipette(100);

	}

	public function receive_nb_frigo($nb_to_buy)
	{
		if($nb_to_buy == 1)
			(int)$total_price = Config::$price_frigo;
		if($nb_to_buy == 10)
			(int)$total_price = Config::$price_frigo_10;

		if($this->verifiy_argent_user($total_price))
		{
			$this->set_argent_user($total_price);
			$this->ajout_frigo_to_bsd($nb_to_buy);
		}

	}

	public function receive_nb_pipette($nb_to_buy)
	{
		if($nb_to_buy == 1)
			(int)$total_price = Config::$price_pipette;
		if($nb_to_buy == 10)
			(int)$total_price = Config::$price_pipette_10;
		if($nb_to_buy == 100)
			(int)$total_price = Config::$price_pipette_100;

		if($this->verifiy_argent_user($total_price))
		{
			$this->set_argent_user($total_price);
			$this->ajout_pipette_to_bsd($nb_to_buy);
		}
	}

	public function ajout_frigo_to_bsd($nb)
	{
		$req_sql = new stdClass;
		$req_sql->table = "hardware";
		$req_sql->where = "id_user = '".$this->user_obj->user_infos->id."'";
		$req_sql->ctx = new stdClass;
		$req_sql->ctx->frigo = (int)$this->user_obj->hardware->frigo + (int)$nb;
		$res_sql = $this->update($req_sql);
		unset($req_sql);
	}

	public function ajout_pipette_to_bsd($nb)
	{
		$req_sql = new stdClass;
		$req_sql->table = "hardware";
		$req_sql->where = "id_user = '".$this->user_obj->user_infos->id."'";
		$req_sql->ctx = new stdClass;
		$req_sql->ctx->pipette = (int)$this->user_obj->hardware->pipette + (int)$nb;
		$res_sql = $this->update($req_sql);
		unset($req_sql);
	}



}
