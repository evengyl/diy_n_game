<?php


Class user extends all_query
{
	public $user_infos; // ne surtout pas changer de place cette proprietes
	public $product;
	public $champ_glycerine;
	public $usine_propylene;
	public $labos_bases;
	public $bases;
	public $amelioration_var_config;
	public $search_arome;
	public $construction;
	public $update;
	public $time_now;
	public $hardware;
	public $array_user_prod_vg;
	public $array_user_prod_pg;


	public function __construct()
	{
		$this->time_now = date("U");

		if(Config::$is_connect == 1)
		{
			$this->get_variable_user();
			$this->calc_diff_time($this->user_infos);
			$this->maj_time_last_connect_in_db($this->user_infos);
		}
	}


	public function get_variable_user()
	{
		if(!isset($this->user_infos))
			$this->user_infos = new stdClass();	
		$req_sql = new stdClass;
		$req_sql->table = "login";
		$req_sql->var = "*";
		$req_sql->where = "login ='".$_SESSION['pseudo']."'";
		$res_fx = $this->select($req_sql);

		foreach($res_fx[0] as $key => $values)
		{
			$this->user_infos->$key = $values;			
		}
		unset($res_fx);
	



		$this->hardware = new stdClass();
		$req_sql = new stdClass;
		$req_sql->table = "hardware";
		$req_sql->var = "*";
		$req_sql->where = "id_user = '".$this->user_infos->id."'";
		$res_fx = $this->select($req_sql);
		if(!empty($res_fx))
		{
			foreach($res_fx[0] as $key => $values)
			{
				$this->hardware->$key = $values;
			}
		}
		unset($res_fx);


		$this->bases = new stdClass();
		$req_sql = new stdClass;
		$req_sql->table = "bases";
		$req_sql->var = "*";
		$req_sql->where = "id_user = '".$this->user_infos->id."'";
		$res_fx = $this->select($req_sql);
		if(!empty($res_fx))
		{
			foreach($res_fx[0] as $key => $values)
			{
				if($key == 'id' || $key == 'id_user')
					continue;
				$this->bases->$key = $values;
			}
		}
		unset($res_fx);

		$this->amelioration_var_config = new stdClass();
		$req_sql = new stdClass;
		$req_sql->table = "amelioration_var_config";
		$req_sql->var = "*";
		$req_sql->where = "id_user = '".$this->user_infos->id."'";
		$res_fx = $this->select($req_sql);
		if(!empty($res_fx))
		{
			foreach($res_fx[0] as $key => $values)
			{
				$this->amelioration_var_config->$key = $values;
			}
		}
		unset($res_fx);


		$this->construction = new stdClass();
		$req_sql = new stdClass;
		$req_sql->table = "construction_en_cours";
		$req_sql->var = "*";
		$req_sql->where = "";
		$res_fx = $this->select($req_sql);
		if(!empty($res_fx))
		{
			foreach($res_fx as $key => $values)
			{
				$this->construction->$key = $values;
			}
		}
		unset($res_fx);

		$this->update = new stdClass();
		$req_sql = new stdClass;
		$req_sql->table = "update_en_cours";
		$req_sql->var = "*";
		$req_sql->where = "";
		$res_fx = $this->select($req_sql);
		if(!empty($res_fx))
		{
			foreach($res_fx as $key => $values)
			{
				$this->update->$key = $values;
			}
		}
		unset($res_fx);


		$this->search_arome = new stdClass();
		$req_sql = new stdClass;
		$req_sql->table = "search_arome";
		$req_sql->var = "*";
		$req_sql->where = "id_user = '".$this->user_infos->id."'";
		$res_fx = $this->select($req_sql);
		if(!empty($res_fx))
		{
			foreach($res_fx as $key => $values)
			{
				$this->search_arome->$key = $values;
			}
		}
		unset($res_fx);

		$this->product = new stdClass();
		$req_sql = new stdClass;
		$req_sql->table = "product";
		$req_sql->var = "*";
		$req_sql->where = "id_user = '".$this->user_infos->id."'";
		$res_fx = $this->select($req_sql);
		if(!empty($res_fx))
		{
			foreach($res_fx[0] as $key => $values)
			{
				if($key == 'id' || $key == 'id_user')
					continue;
				$this->product->$key = $values;
			}
		}
		unset($res_fx);

	}


	private function calc_diff_time($row_user)
	{
		if($this->time_now > $row_user->last_connect)
		{
			$row_user->diff_time = 0;
			$row_user->diff_time = $this->time_now - $row_user->last_connect;
		}
		else if($this->time_now == $row_user->last_connect)
		{
			$row_user->diff_time = 0;
		}
		else
		{
			$row_user->diff_time = 0;
			$subject = "Attention le joueur : ".$row_user->login." a un last connect plus grand que le time UNIX , il s'agit ou d'une erreur ou d'une piratage des données.";
			mail(parent::$mail, "Message d'erreur du site Diy N Game.", $subject);
			?><script>alert("Une erreur est survenue ou alors vous avez tenté de faire les petits malins... première avertissement...")</script><?
			$this->maj_avertissement($row_user);
		}

		//quand on a set le temps de différence , on remet a jour le temps dans la base de données a date time stamp pour que le calcule 
		//de la différence de temps soit correct
	}

	private function maj_time_last_connect_in_db($row_user)
	{
		//sert a set au time now la base de donnée last connect
		$req_sql = new stdClass;
		$req_sql->ctx = new stdClass;
		$req_sql->ctx->last_connect = date("U");
		$req_sql->table = "login";
		$req_sql->where = "id = ".$row_user->id;
		$this->update($req_sql);
		unset($req_sql);
	}

	public function check_post_sign_up_and_my_account($text)
	{
		$text = trim($text);
		$text = htmlentities($text);
		$nb_char = strlen($text);
		if($nb_char <= 6)
		{			
			return 0;		
		}
		else
		{
			return $text;
		}

	}
}
