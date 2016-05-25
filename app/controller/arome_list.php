<?php 

Class arome_list extends base_module
{
	public $search_1 = "1000";
	public $search_2 = "2500";
	public $search_3 = "5000";

	public function __construct($module_tpl_name, &$user)
	{		
		parent::__construct($module_tpl_name, $user);		

		$arome_list = new stdClass();
		$arome_list->table = "aromes";
		$arome_list->var = "*";
		$arome_list->order = "marque";
		$res_sql = $this->select($arome_list);





		$array_aromes_trier = array();
		foreach($res_sql as $row_)
		{
			$array_aromes_trier[$row_->marque] = "";
			break;
		}
		//astuce pour ne pas avoir un element en moins dans le tableau lors de la premire passe pour inscrire le nom de la marque dans le tab

		$i=0;
		foreach($res_sql as $row)
		{
			if(isset($array_aromes_trier[$row->marque]))
			{
				if(key($array_aromes_trier) == $row->marque)
				{
					
					$name_image = $row->marque;
					$name_image .= "_".trim($row->nom).".jpg";
					$name_image = str_replace(" ", "_", $name_image);
					$name_image = mb_convert_case($name_image, MB_CASE_LOWER, "UTF-8"); 
					$name_image = "/images/aromes/".$row->marque."/".$name_image;

					$array_aromes_trier[$row->marque][$i] = new stdClass();
					$array_aromes_trier[$row->marque][$i]->nom = $row->nom;
					$array_aromes_trier[$row->marque][$i]->quality = $row->quality;
					$array_aromes_trier[$row->marque][$i]->type = $row->type;
					$array_aromes_trier[$row->marque][$i]->img = $name_image;
				}
				else
				{
					$array_aromes_trier[$row->marque] = array();
					end($array_aromes_trier);
				}
			}
			else
			{
				$array_aromes_trier[$row->marque] = array();
				end($array_aromes_trier);
			}
			$i++;
		}

		if(isset($_POST['search_form_validate_1000']) || isset($_POST['search_form_validate_2500']) || isset($_POST['search_form_validate_5000']))
			$this->recept_form_with_value_arome($_POST);


		return $this->assign_var("array_aromes_trier", $array_aromes_trier)->assign_var("user", $this->user_obj)->render();
	}

	public function recept_form_with_value_arome($post)
	{
		foreach($post as $row_key => $row_value)
		{
			$value = $row_value;
		}

		$value = substr($value, -7);
		$value = intval($value);
		if($value != array($this->search_1, $this->search_2, $this->search_3))
			echo "ok ok on est bon ";		
		unset($_POST);
	}


}
