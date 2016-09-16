<?php 

Class buy_hardware extends base_module
{

	public function __construct($module_tpl_name, &$user)
	{		
		parent::__construct($module_tpl_name, $user);

		if($_POST != "")
		{
			$this->traitement_post($_POST, $user);
			$user->get_variable_user();
		}
			

		return $this->assign_var('user', $user)->render();
	}

	public function traitement_post($post, $user)
	{
		if(isset($post['buy_frigo_1']))
			$this->receive_nb_frigo(1, $user);

		if(isset($post['buy_frigo_10']))
			$this->receive_nb_frigo(10, $user);

		if(isset($post['buy_pipette_1']))
			$this->receive_nb_pipette(1, $user);

		if(isset($post['buy_pipette_10']))
			$this->receive_nb_pipette(10, $user);

		if(isset($post['buy_pipette_100']))
			$this->receive_nb_pipette(100, $user);

		if(isset($post['buy_flacon_10']))
			$this->receive_nb_flacon(10, $user);

		if(isset($post['buy_flacon_100']))
			$this->receive_nb_flacon(100, $user);

		if(isset($post['buy_flacon_1000']))
			$this->receive_nb_flacon(1000, $user);

	}

	public function receive_nb_frigo($nb_to_buy, $user)
	{
		if($nb_to_buy == 1)
			(int)$total_price = Config::$price_frigo;
		if($nb_to_buy == 10)
			(int)$total_price = Config::$price_frigo_10;

		if($this->verifiy_argent_user($total_price))
		{
			$this->set_argent_user($total_price);
			user_ressources::maj_frigo($nb_to_buy, "+", $user);
		}

	}

	public function receive_nb_pipette($nb_to_buy, $user)
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
			user_ressources::maj_pipette($nb_to_buy, "+", $user);
		}
	}

	public function receive_nb_flacon($nb_to_buy, $user)
	{
		if($nb_to_buy == 10)
			(int)$total_price = Config::$price_flacon_10;
		if($nb_to_buy == 100)
			(int)$total_price = Config::$price_flacon_100;
		if($nb_to_buy == 1000)
			(int)$total_price = Config::$price_flacon_1000;

		if($this->verifiy_argent_user($total_price))
		{
			$this->set_argent_user($total_price);
			user_ressources::maj_flacon($nb_to_buy, "+", $user);
		}
	}
}
