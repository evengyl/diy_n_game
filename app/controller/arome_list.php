<?php 

Class arome_list extends base_module
{

	public function __construct($module_tpl_name)
	{		
		parent::__construct($module_tpl_name);		

		$arome_list = new stdClass();
		$arome_list->table = "aromes";
		$arome_list->var = "*";
		$arome_list->where = "marque = 'Bickford Flavors' OR marque ='Cappela Flavor'";
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
					$array_aromes_trier[$row->marque][$i]->commentaire = $row->commentaire;
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

		return $this->assign_var("array_aromes_trier", $array_aromes_trier)->assign_var("user", $this->user_obj)->render();
	}


}
