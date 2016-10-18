<?php 

Class buy_hardware extends base_module
{

	public function __construct()
	{		
		parent::__construct(__CLASS__);

		if(isset($_POST) && $_POST != "")
		{
			$this->user->traitement_post($_POST);
		}



		return $this->assign_var('user', $this->user)->render();
	}

	public function traitement_post($post)
	{
		if(isset($post['buy_frigo']))
			$this->receive_nb_frigo($post['buy_frigo']);
		
		if(isset($post['buy_pipette']))
			$this->receive_nb_pipette($post['buy_pipette']);

		if(isset($post['buy_flacon']))
			$this->receive_nb_flacon($post['buy_flacon']);

	}

	public function receive_nb_frigo($nb_to_buy)
	{
		if($nb_to_buy == 1)
			(int)$total_price = Config::$price_frigo;
		if($nb_to_buy == 10)
			(int)$total_price = Config::$price_frigo_10;
		if($nb_to_buy == 100)
			(int)$total_price = Config::$price_frigo_100;
		if($nb_to_buy == 1000)
			(int)$total_price = Config::$price_frigo_1000;

		if($this->user->verifiy_argent_user($total_price))
		{
			$this->user->set_argent_user($total_price, "-");
			$this->user->maj_frigo($nb_to_buy, "+");
		}

	}

	public function receive_nb_pipette($nb_to_buy)
	{
		if($nb_to_buy == 10)
			(int)$total_price = Config::$price_pipette;
		if($nb_to_buy == 100)
			(int)$total_price = Config::$price_pipette_10;
		if($nb_to_buy == 1000)
			(int)$total_price = Config::$price_pipette_100;
		if($nb_to_buy == 10000)
			(int)$total_price = Config::$price_pipette_1000;

		if($this->user->verifiy_argent_user($total_price))
		{
			$this->user->set_argent_user($total_price, "-");
			$this->user->maj_pipette($nb_to_buy, "+");
		}
	}

	public function receive_nb_flacon($nb_to_buy)
	{
		if($nb_to_buy == 10)
			(int)$total_price = Config::$price_flacon_10;
		if($nb_to_buy == 100)
			(int)$total_price = Config::$price_flacon_100;
		if($nb_to_buy == 1000)
			(int)$total_price = Config::$price_flacon_1000;
		if($nb_to_buy == 10000)
			(int)$total_price = Config::$price_flacon_10000;

		if($this->user->verifiy_argent_user($total_price))
		{
			$this->user->set_argent_user($total_price, "-");
			$this->user->maj_flacon($nb_to_buy, "+");
		}
	}
}
