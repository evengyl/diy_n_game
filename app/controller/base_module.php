<?php 


Class base_module extends all_query
{

	public $rendu;
	public $content;
	public $var_to_extract;
	public $template_name;
	public $template_path;
	public $time_finish;
	public $user_obj;



	public function __construct($module_tpl_name = "")
	{
		if($module_tpl_name != "")
		{
			$this->user_obj = new user();
			$this->template_name = $module_tpl_name;
			$this->set_template_path($this->template_name);		
			$this->convert_sec_in_time_real();	

		}
		
	}

	public function set_time_finish($name_batiment)
	{
		foreach($this->user_obj->construction as $row_construct)
		{
			if($row_construct->name_batiment == $name_batiment)
			{
				$this->time_finish = $row_construct->time_finish;
			}
		}
	}

	public function set_argent_user($prix_a_deduire)
	{
		$argent_before = $this->user_obj->user_infos->argent;
		$argent_after = $argent_before - $prix_a_deduire;

		$req_sql = new stdClass;
		$req_sql->table = "login";
		$req_sql->where = "id = '".$this->user_obj->user_infos->id."'";
		$req_sql->ctx = new stdClass;
		$req_sql->ctx->argent = $argent_after;
		$res_sql = $this->update($req_sql);
		unset($req_sql);
	}


	public function time_finish_construct($time_construct)
	{
		affiche_pre($time_construct);
		$this->time_finish = "";
		$time_now = date("U");
		$this->time_finish = $time_now + $time_construct;
	}

	public function set_template_path($name_template)
	{
		$this->template_path = "../vues/".$name_template.".php";

	}

	public function get_template_path()
	{
		return $this->template_path;
	}

	public function convert_sec_in_time_real()
	{
		foreach($this->user_obj as $row_user_obj)
		{
			if(isset($row_user_obj->time_construct))
			{

				$jours = floor($row_user_obj->time_construct/86400);
				$reste = $row_user_obj->time_construct%86400;
				$heures = floor($reste/3600);
				$reste = $reste%3600;
				$minutes = floor($reste/60);
				$secondes = $reste%60;
				$row_user_obj->time_real_construct = $jours." Jours ".$heures."h : ".$minutes."m : ".$secondes;
			}
		}
	}

	public function assign_var($var_name , $value)
	{

        if(is_array($var_name))
        {
            $this->var_to_extract = array_merge($this->var_to_extract, $var_name);
        }
        else
        {
            $this->var_to_extract[$var_name] = $value;
        }
        return $this;
	}


	public function render()
	{
		ob_start();
			if(!empty($this->var_to_extract))
			{
				extract($this->var_to_extract);
			}			
			require($this->get_template_path());
		$rendu = ob_get_contents();
		ob_end_clean();
		$this->set_rendu($rendu);
	}

	public function set_rendu($rendu)
	{
		$this->rendu = $rendu;
	}

	public function get_rendu()
	{
		return $this->rendu;
	}


	protected function check_construction_en_cours($var_in_match, $name_batiment_from_controller = "")
	{
		$req_sql = new stdClass;
		$req_sql->table = "construction_en_cours";
		$req_sql->var = "*";
		$req_sql->where = "id_user = '".$this->user_obj->user_infos->id."'";

		$res_sql = $this->select($req_sql);

		if(!empty($res_sql))
		{	
		//comme il y a des construction en cours il faut les faire vérifié pour voir si celle de notr ebatiments est dedans		
			foreach($res_sql as $row_construct)
			{
				if($row_construct->name_batiment == $var_in_match)
				{
					//on viens de lancer l'appel pour mettre en route une construction
					return 1;
				}
				else if($row_construct->name_batiment == $name_batiment_from_controller)
				{
					//la consctruction était déjà lancée quand le joueur c'est logger
					return 1;	
				}
			}			
		}
		else
		{
								//mais avant ça on va vérifié si il a l'argent nécessaire
			if($this->user_obj->user_infos->argent >= $this->user_obj->culture_vg->prix)
			{
				return 0;
			}
			else
			{
				//2 egale que on a pas l'argent
				return 2;	
			}
		}
	}


	public function insert_construction_en_cours($name_batiment, $time_finish)
	{
		$req_sql = new stdClass;
		$req_sql->ctx = new stdClass;
		$req_sql->ctx->id_user = $this->user_obj->user_infos->id;
		$req_sql->ctx->name_batiment = $name_batiment;
		$req_sql->ctx->time_finish = $time_finish;
		$req_sql->table = "construction_en_cours";

		$this->insert_into($req_sql);

	}



	

	public function generate_breadcrumb($referer = array())
	{
		/*$title_page = "";
		$number_separate =  count($referer)-1;

		foreach($referer as $row => $values)
		{
			$title_page .= "<a href='".$values."' >".$row."</a>";
			if($number_separate > 0)
				$title_page .= " > ";
			$number_separate--;
		}*/
		return $referer;
	}
}