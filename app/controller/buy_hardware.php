<?php 

Class buy_hardware extends base_module
{

	public function __construct(&$_app)
	{		
		$_app->module_name = __CLASS__;
		parent::__construct($_app);
		$this->_app->navigation->set_breadcrumb("Consommation");

		if(isset($_POST) && $_POST != "")
		{
			$this->traitement_post($_POST);
		}


		$this->user->get_variable_user();
		$this->get_html_tpl =  $this->assign_var('user', $this->user)->render_tpl();
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
			(int)$total_price = Config::$price_pipette_10;
		if($nb_to_buy == 100)
			(int)$total_price = Config::$price_pipette_100;
		if($nb_to_buy == 1000)
			(int)$total_price = Config::$price_pipette_1000;
		if($nb_to_buy == 10000)
			(int)$total_price = Config::$price_pipette_10000;

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
