<?php 

Class arome_list extends base_module
{
	private $search_1 = 1000;
	private $search_2 = 2500;
	private $search_3 = 5000;

	public $chance_to_win_1 = 10;
	public $chance_to_win_2 = 25;
	public $chance_to_win_3 = 50;


	private $value_to_search = 0;
	private $percent_to_win = 0;

	public $alert_search_en_cours = 0;

	public $time_search_for_one_k_argent_depenser = 3600;

	public $array_aromes_trier = array();




	public function __construct($module_tpl_name, &$user)
	{		
		parent::__construct($module_tpl_name, $user);		

		//va s'occuper d'aller chercher apres tout les aromes en bases et les traiter pour avoir un belle objet avec marque et aromes correctement
		$this->get_and_traitement_aromes();

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
		
/* en cours */ 
		//va préparer le tableau avec les arome uniquement connu sur
		$this->set_arome_acquis_for_tpl($this->user_obj->user_infos->litter_vg);
/* en cours */ 

		//recupere les recherche en cours pour les envoyer au tpl elle sont dans le user
		$array_search_en_cours = $this->get_search_en_cours();

		unset($_POST);
		return $this->assign_var("array_aromes_trier", $this->array_aromes_trier)->assign_var("array_search_en_cours",$array_search_en_cours)->assign_var("user", $this->user_obj)->render();
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


	private function get_and_traitement_aromes()
	{
		$arome_list = new stdClass();
		$arome_list->table = "aromes";
		$arome_list->var = "id, marque, nom";
		$arome_list->order = "marque";
		$res_sql = $this->select($arome_list);

		//astuce pour ne pas avoir un element en moins dans le tableau lors de la premire passe pour inscrire le nom de la marque dans le tab

		$i=0;
		foreach($res_sql as $row)
		{
			if(isset($this->array_aromes_trier[$row->marque]))
			{
				if(key($this->array_aromes_trier) == $row->marque)
				{
					$name_image = $row->marque;
					$name_image .= "_".trim($row->nom).".jpg";
					$name_image = str_replace(" ", "_", $name_image);
					$name_image = mb_convert_case($name_image, MB_CASE_LOWER, "UTF-8"); 
					$name_image = "/images/aromes/".$row->marque."/".$name_image;

					$this->array_aromes_trier[$row->marque][$i] = new stdClass();
					$this->array_aromes_trier[$row->marque][$i]->nom = $row->nom;
					$this->array_aromes_trier[$row->marque][$i]->id = $row->id;
					$this->array_aromes_trier[$row->marque][$i]->img = $name_image;

				}
				else
				{
					$this->array_aromes_trier[$row->marque] = array();
					end($this->array_aromes_trier);
				}
			}
			else
			{
				$this->array_aromes_trier[$row->marque] = array();
				end($this->array_aromes_trier);
			}
			$i++;
		}
		affiche_pre($this->array_aromes_trier);
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

		if($value == $this->search_1 || $value == $this->search_2 || $value == $this->search_3)
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
		if((int)$this->value_to_search == 1000)
			return $this->chance_to_win_1;

		else if((int)$this->value_to_search == 2500)
			return $this->chance_to_win_2;

		else if((int)$this->value_to_search == 5000)
			return $this->chance_to_win_3;

		else if((int)$this->value_to_search > 5000)
			return ((((int)$this->value_to_search - 5000) / 5000)* $this->chance_to_win_1) + $this->chance_to_win_3;

		else
			return 0;

	}

	private function calcul_time_finish()
	{
		$time_now = date("U");
		$time_finish = $time_now + (($this->value_to_search/1000) * $this->time_search_for_one_k_argent_depenser);
		return $time_finish;
	}

	private function set_arome_acquis_for_tpl($table_arome)
	{

	}


}
