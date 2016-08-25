<?php 

Class search_arome extends base_module
{
	private $value_to_search = 0;
	private $percent_to_win = 0;

	public $alert_search_en_cours = 0;

	public $tab_final_arome_acquis = array();
	public $tab_final_arome_acquis_traiter = array();

	public $nb_arome_total = 0;
	public $nb_arome_total_acquis = 0;




	public function __construct($module_tpl_name, &$user) // on a recu pas une référence mais bien tout l'objet
	{		
		parent::__construct($module_tpl_name, $user);		

		
		

		if(isset($_POST['search_form_validate_1000']) || isset($_POST['search_form_validate_2500']) || isset($_POST['search_form_validate_5000']))
		{
			$this->recept_form_with_value_arome($_POST);
		}
		else if(isset($_POST['search_form_validate_perso']))
		{
			$this->recept_form_with_value_arome_perso($_POST);
		}

		if($this->value_to_search != 0)
		{
			//verifier si il a assez d'argnet pour faire sa search
			if($this->verifiy_argent_user($this->value_to_search))
			{
				$this->percent_to_win = $this->convert_price_search_to_percent_win(); //ok
				$this->time_finish = $this->calcul_time_finish(); //ok
				$this->insert_search_arome($this->percent_to_win, $this->value_to_search, $this->time_finish);//ok
				$this->set_argent_user($this->value_to_search, $moins_plus = "-");
				$user->get_variable_user();//ok
			}
		}


		//return tab_final_arome_acquis, contient le tableau avec tout les aromes uniquement connu
		//return tab_final_arome_acquis_traiter, contient le tab avec la mise en forme pour l'affichage dans le tpl
		$this->tab_final_arome_acquis_traiter = user_ressources::set_arome_acquis_for_tpl($user);


		//partie traitement de l'arome gagner pour l'envoi au tpl
		if(isset($user->user_infos->id_arome_win) && $user->user_infos->id_arome_win != "")
		{
			//va cehrcher l'arome dans la base pour les infos
			$arome_win_for_tpl = $this->get_arome_win_for_tpl($user);
			//traite l'id pour ressortir avec image et tout
			$arome_win_for_tpl = user_ressources::traitement_array_final_aromes($arome_win_for_tpl);
		}
		else
			$arome_win_for_tpl = "";

		//recupere les recherche en cours pour les envoyer au tpl elle sont dans le user
		$array_search_en_cours = $this->get_search_en_cours($user);

		//set la petit phrase pour les aromes trouver ou pas 
		$string_arome_string_nb = "Arômes trouvés : ".$this->nb_arome_total_acquis." sur ".$this->nb_arome_total;



		unset($_POST);//detruit tout les post pour éviter des doublons

		return $this->assign_var("string_arome_string_nb",$string_arome_string_nb)->assign_var("arome_win_for_tpl",$arome_win_for_tpl)->assign_var("array_aromes_trier", $this->tab_final_arome_acquis_traiter)->assign_var("array_search_en_cours",$array_search_en_cours)->assign_var("user", $user)->render();
	}

	private function get_search_en_cours(&$user)
	{
		$array_search_en_cours = array();
		foreach($user->search_arome as $row_search)
		{
			$row_search->real_time_finish = $this->convert_sec_unix_in_time_real_to_rest($row_search->time_finish);
			$array_search_en_cours[] = $row_search;
		}
		return $array_search_en_cours;
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
			$this->value_to_search = $value;
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

		$this->value_to_search = (int)$value;
	}

	private function convert_price_search_to_percent_win()
	{
		if((int)$this->value_to_search == (int)Config::$price_search_1)
			return Config::$chance_to_win_1;

		else if((int)$this->value_to_search == (int)Config::$price_search_2)
			return Config::$chance_to_win_2;

		else if((int)$this->value_to_search == (int)Config::$price_search_3)
			return Config::$chance_to_win_3;

		else if((int)$this->value_to_search > (int)Config::$price_search_3)
			return ((((int)$this->value_to_search - (int)Config::$price_search_3) / (int)Config::$price_search_3)* Config::$chance_to_win_1) + Config::$chance_to_win_3;

		else
			return 0;

	}

	private function calcul_time_finish()
	{
		$time_now = date("U");
		$time_finish = $time_now + (($this->value_to_search/1000) * Config::$time_search_for_one_k_argent_depenser);
		return $time_finish;
	}

	private function get_arome_win_for_tpl(&$user)
	{

		//traiement de la chaine pour la requete 
		$user->id_arome_win = explode(",", $user->user_infos->id_arome_win);
		$where = "";
		
		foreach($user->id_arome_win as $key => $row)
		{
			if($row == "")
			{
				unset($user->id_arome_win[$key]);
			}
			else
			{
				$where .= " id = ".$row." AND";
			}
		}
		$where = substr($where, 0, -3);

		$arome_win = new stdClass();
		$arome_win->table = "aromes";
		$arome_win->var = "id, marque, nom";
		$arome_win->order = "marque";
		$arome_win->where = $where;
		return $this->select($arome_win);
	}

}
