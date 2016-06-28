<?php 

Class arome_list extends base_module
{
	private $price_search_1 = 1000;
	private $price_search_2 = 2500;
	private $price_search_3 = 5000;

	public $chance_to_win_1 = 10;
	public $chance_to_win_2 = 25;
	public $chance_to_win_3 = 50;


	private $value_to_search = 0;
	private $percent_to_win = 0;

	public $alert_search_en_cours = 0;

	public $time_search_for_one_k_argent_depenser = 3600;

	public $tab_final_arome_acquis = array();
	public $tab_final_arome_acquis_traiter = array();




	public function __construct($module_tpl_name, &$user)
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
				$this->user_obj->get_variable_user();//ok
			}
		}


		//return tab_final_arome_acquis, contient le tableau avec tout les aromes uniquement connu
		$this->set_arome_acquis_for_tpl();
		
		//return tab_final_arome_acquis_traiter, contient le tab avec la mise en forme pour l'affichage dans le tpl
		$this->traitement_array_final_aromes();

		//recupere les recherche en cours pour les envoyer au tpl elle sont dans le user
		$array_search_en_cours = $this->get_search_en_cours();

		unset($_POST);

		return $this->assign_var("array_aromes_trier", $this->tab_final_arome_acquis_traiter)->assign_var("array_search_en_cours",$array_search_en_cours)->assign_var("user", $this->user_obj)->render();
	}

	private function get_search_en_cours()
	{
		$array_search_en_cours = array();
		foreach($this->user_obj->search_arome as $row_search)
		{
			$row_search->real_time_finish = $this->convert_sec_unix_in_time_real_to_rest($row_search->time_finish);
			$array_search_en_cours[] = $row_search;
		}
		return $array_search_en_cours;
	}


	private function traitement_array_final_aromes()
	{
		//astuce pour ne pas avoir un element en moins dans le tableau lors de la premire passe pour inscrire le nom de la marque dans le tab

		$i=0;
		foreach($this->tab_final_arome_acquis as $row_first_marque)
		{
			$this->tab_final_arome_acquis_traiter[$row_first_marque->marque] = array();
			break;
		}

		foreach($this->tab_final_arome_acquis as $row)
		{
			if(isset($this->tab_final_arome_acquis_traiter[$row->marque]))
			{
				if(key($this->tab_final_arome_acquis_traiter) == $row->marque)
				{
					$name_image = $row->marque;
					$name_image .= "_".trim($row->nom).".jpg";
					$name_image = str_replace(" ", "_", $name_image);
					$name_image = mb_convert_case($name_image, MB_CASE_LOWER, "UTF-8"); 
					$name_image = "/images/aromes/".$row->marque."/".$name_image;

					$this->tab_final_arome_acquis_traiter[$row->marque][$i] = new stdClass();
					$this->tab_final_arome_acquis_traiter[$row->marque][$i]->nom = $row->nom;
					$this->tab_final_arome_acquis_traiter[$row->marque][$i]->id = $row->id;
					$this->tab_final_arome_acquis_traiter[$row->marque][$i]->img = $name_image;
					$this->tab_final_arome_acquis_traiter[$row->marque][$i]->marque = $row->marque;

				}
				else
				{
					$this->tab_final_arome_acquis_traiter[$row->marque] = array();
					end($this->tab_final_arome_acquis_traiter);
				}
			}
			else
			{
				$this->tab_final_arome_acquis_traiter[$row->marque] = array();
				end($this->tab_final_arome_acquis_traiter);
			}
			$i++;
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

		if($value == $this->price_search_1 || $value == $this->price_search_2 || $value == $this->price_search_3)
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
		if((int)$this->value_to_search == (int)$this->price_search_1)
			return $this->chance_to_win_1;

		else if((int)$this->value_to_search == (int)$this->price_search_2)
			return $this->chance_to_win_2;

		else if((int)$this->value_to_search == (int)$this->price_search_3)
			return $this->chance_to_win_3;

		else if((int)$this->value_to_search > (int)$this->price_search_3)
			return ((((int)$this->value_to_search - (int)$this->price_search_3) / (int)$this->price_search_3)* $this->chance_to_win_1) + $this->chance_to_win_3;

		else
			return 0;

	}

	private function calcul_time_finish()
	{
		$time_now = date("U");
		$time_finish = $time_now + (($this->value_to_search/1000) * $this->time_search_for_one_k_argent_depenser);
		return $time_finish;
	}

	private function set_arome_acquis_for_tpl()
	{
		$arome_list = new stdClass();
		$arome_list->table = "aromes";
		$arome_list->var = "id, marque, nom";
		$arome_list->order = "marque";
		$res_sql_arome_list = $this->select($arome_list);

		//recupere un tableau avec les ids des aromes non posseder par le joueur
		$array_not_have = user_batiments::traitement_arome_chain_bsd($this->user_obj->user_infos->list_arome_not_have);

		//recupere un tableau contenant tout les id des aromes disponible dans la table aromes
		$array_total_aromes = $this->return_id_array_table_arome($res_sql_arome_list);

		//calcule la différence entre les deux et en ressort un tableau avec tout les id des aromes acquis
		$array_id_arome_acquis  = array_diff($array_total_aromes, $array_not_have);

		foreach($res_sql_arome_list as $key_aromes => $value_arome)
		{
			foreach($array_id_arome_acquis as $row_acquis)
			{
				if((string)$row_acquis == (string)$value_arome->id)
					$this->tab_final_arome_acquis[] = $value_arome;
			}
		}
	}
}
