<?php 

Class search_arome extends base_module
{
	private $value_to_search = 0;
	private $percent_to_win = 0;

	public $tab_final_arome_acquis_traiter = array();

	public $nb_arome_total_acquis = 0;

	public function __construct() // on a recu pas une référence mais bien tout l'objet
	{		
		parent::__construct(__CLASS__);		

		//on check si une recherhce à été lancée
		if(isset($_POST['search_form_validate_1000']) || isset($_POST['search_form_validate_2500']) || isset($_POST['search_form_validate_5000']))
		{
			$this->value_to_search = $this->recept_form_with_value_arome($_POST);
		}
		else if(isset($_POST['search_form_validate_perso']))
		{
			$this->value_to_search = $this->recept_form_with_value_arome_perso($_POST);
		}


		//si on lance une recherche
		if($this->value_to_search != 0)
		{
			//verifier si il a assez d'argnet pour faire sa search va return 0 si pas et 1 si ok
			if($this->user->verifiy_argent_user($this->value_to_search))
			{
				//Va se charger de convertir la valeur d'argnet envoyer pour la recherhce en % de change gagnante
				$this->percent_to_win = $this->convert_price_search_to_percent_win($this->value_to_search); 

				//avec la valeur de recherhce on va renvoyer le temps de la recherhce total
				$this->time_finish = $this->calcul_time_finish($this->value_to_search);

				//insère en base de donnée la ligne de recherhce, avec pourcentage de réussite, la valeur de la recherche, et la date de fin en unix time
				$this->user->insert_search_arome($this->percent_to_win, $this->value_to_search, $this->time_finish);

				//on enleve l'argent à l'user
				$this->user->set_argent_user($this->value_to_search, $moins_plus = "-");
			}
		}

		//partie traitement de l'arome gagner pour l'envoi au tpl
		//on regarde dans la talbe user infos si un id est gagner
		if(isset($this->user->user_infos->id_arome_win) && $this->user->user_infos->id_arome_win != "")
		{
			//va cehrcher l'arome dans la base pour les infos
			$arome_win_for_tpl = $this->user->get_arome_win_for_tpl();
			//traite l'id pour ressortir avec image et tout
			$arome_win_for_tpl = $this->user->render_arome_win($arome_win_for_tpl);
		}
		else
			$arome_win_for_tpl = "";

		//recupere les recherche en cours pour les envoyer au tpl elle sont dans le user
		

		//set la petit phrase pour les aromes trouver ou pas 
		$string_arome_string_nb = "Arômes trouvés : ".$this->nb_arome_total_acquis()." sur ".$this->user->user_infos->nb_arome_total;

		
		//va aller chercher et traiter la liste des aromes que le joueurs à obetnu pour l'affichage dans le template
		$this->tab_final_arome_acquis_traiter = $this->user->set_arome_acquis_for_tpl();

		unset($_POST);//detruit tout les post pour éviter des doublons
		
		$this->user->get_variable_user();
		$this->instance_search_en_cours_for_tpl();


		return $this->assign_var("string_arome_string_nb",$string_arome_string_nb)
					->assign_var("arome_win_for_tpl",$arome_win_for_tpl)
					->assign_var("array_aromes_trier", $this->tab_final_arome_acquis_traiter)
					->assign_var("user", $this->user)->render();
	}

	private function instance_search_en_cours_for_tpl()
	{
		foreach($this->user->search_arome as $key => $row_search)
		{
			$this->user->search_arome->{$key}->real_time_finish = $this->user->convert_sec_unix_in_time_real_to_rest($row_search->time_finish);
		}
	}

	public function nb_arome_total_acquis()
	{
		if(!empty($this->user->user_infos->list_arome_not_have))
		{
			$data_from_bsd = substr($this->user->user_infos->list_arome_not_have, 0,-1);
			$array_not_have = explode(",", $data_from_bsd);
			return $this->user->user_infos->nb_arome_total - count($array_not_have);
		}
	}



	

	public function recept_form_with_value_arome($post)
	{
		if(isset($post['search_form_validate_1000']))
			unset($post['search_form_validate_1000']);

		if(isset($post['search_form_validate_2500']))
			unset($post['search_form_validate_2500']);

		if(isset($post['search_form_validate_5000']))
			unset($post['search_form_validate_5000']);

		foreach($post as $row_key => $row_value)
		{
			$value = $row_value;
		}

		$value = intval($value);

		if($value == Config::$price_search_1 || $value == Config::$price_search_2 || $value == Config::$price_search_3)
			return $value;
		else
			$_SESSION['error'] = "Attention la valeur que vous avez entrée n'est pas bonne, vous essayer de corrompre le jeu... +1 avertissement";
			
	}

	public function recept_form_with_value_arome_perso($post)
	{
		unset($post['search_form_validate_perso']);
		foreach($post as $row_key => $row_value)
		{
			$value = $row_value;
		}

		return (int)$value;
	}

	private function convert_price_search_to_percent_win($value_to_search)
	{
		if((int)$value_to_search == (int)Config::$price_search_1)
			return Config::$chance_to_win_1;

		else if((int)$value_to_search == (int)Config::$price_search_2)
			return Config::$chance_to_win_2;

		else if((int)$value_to_search == (int)Config::$price_search_3)
			return Config::$chance_to_win_3;

		else if((int)$value_to_search > (int)Config::$price_search_3)
			return ((((int)$value_to_search - (int)Config::$price_search_3) / (int)Config::$price_search_3)* Config::$chance_to_win_1) + Config::$chance_to_win_3;

		else
			return 0;

	}

	private function calcul_time_finish($value_to_search)
	{
		$time_now = date("U");
		$time_finish = $time_now + (($value_to_search/1000) * Config::$time_search_for_one_k_argent_depenser);
		return $time_finish;
	}




}
