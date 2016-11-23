<?php

Class user_account extends user
{
	public function __construct()
	{
		parent::__construct();
	}

	public function calc_diff_time()
	{
		if($this->user_infos->time_now > $this->user_infos->last_connect)
		{
			$this->user_infos->diff_time = 0;
			$this->user_infos->diff_time = $this->user_infos->time_now - $this->user_infos->last_connect;
		}
		else if($this->user_infos->time_now == $this->user_infos->last_connect)
		{
			$this->user_infos->diff_time = 0;
		}
		else
		{
			$this->user_infos->diff_time = 0;
			$subject = "Attention le joueur : ".$this->user_infos->login." a un last connect plus grand que le time UNIX , il s'agit ou d'une erreur ou d'une piratage des données.";
			mail(Config::$mail, "Message d'erreur du site Diy N Game.", $subject);
			?><script>alert("Une erreur est survenue ou alors vous avez tenté de faire les petits malins... avertissement recu...")</script><?
			$this->maj_avertissement_db();
		}

		//quand on a set le temps de différence , on remet a jour le temps dans la base de données a date time stamp pour que le calcule 
		//de la différence de temps soit correct
	}

	public function maj_last_connect_db()
	{
		//sert a set au time now la base de donnée last connect
		$req_sql = new stdClass;
		$req_sql->ctx = new stdClass;
		$req_sql->ctx->last_connect = date("U");
		$req_sql->table = "login";
		$req_sql->where = "id = ".$this->user_infos->id;
		$this->update($req_sql);
		unset($req_sql);
	}

	public function check_post_sign_up_and_my_account($text)
	{
		$text = trim($text);
		$text = htmlentities($text);
		$nb_char = strlen($text);
		if($nb_char <= 6)
			return 0;		
		else
			return $text;

	}


	public function maj_avertissement_db()
	{
		$req_sql = new stdClass;
		$req_sql->ctx = new stdClass;
		$old_values_avertissement = $this->user_infos->avertissement;
		$req_sql->ctx->avertissement = $old_values_avertissement+1;
		$req_sql->ctx->last_connect = $this->user_infos->time_now;
		$req_sql->table = "login";
		$req_sql->where = "id = ".$this->user_infos->id;
		$this->update($req_sql);
		unset($req_sql);
		//met dans la base de donnée un petit +1 pour avertissement
	}
	
}
