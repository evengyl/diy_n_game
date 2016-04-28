<?php 


Class base_module extends all_query
{

	public $rendu;
	public $content;
	public $var_to_extract;
	public $template_name;
	public $template_path;
	public $time_finish;



	public function __construct($module_tpl_name = "")
	{
		if($module_tpl_name != "")
		{
			$this->template_name = $module_tpl_name;
			$this->set_template_path($this->template_name);					
		}
		
	}

	public function set_time_finish($user, $name_batiment)
	{
		foreach($user->construction as $row_construct)
		{
			if($row_construct->name_batiment == $name_batiment)
			{
				$this->time_finish = $row_construct->time_finish;
			}
		}
	}


	public function time_finish_construct($time_construct)
	{
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


	protected function check_construction_en_cours($user, $var_in_match, $name_batiment_from_controller = "")
	{
		$req_sql = ("SELECT * FROM construction_en_cours WHERE id_user = '".$user->user_infos->id."'");
		$res_sql = $this->other_query($req_sql);

		if(!empty($res_sql))
		{	
		//comme il y a des construction en cours il faut les faire vérifié pour voir si celle de notr ebatiments est dedans		
			foreach($res_sql as $row_construct)
			{
				if($row_construct->name_batiment == $var_in_match)
				{
					//on viens de lancer l'appel pour mettre en route une construction
					$this->alert_construction_en_cours = 1;
				}
				else if($row_construct->name_batiment == $name_batiment_from_controller)
				{
					//la consctruction était déjà lancée quand le joueur c'est logger
					$this->alert_construction_en_cours = 1;	
				}
			}			
		}
		else
		{
								//mais avant ça on va vérifié si il a l'argent nécessaire
			if($user->user_infos->argent >= $user->culture_vg->prix)
			{
				$this->alert_construction_en_cours = 0;
			}
			else
			{
				//2 egale que on a pas l'argent
				$this->alert_construction_en_cours = 2;	
			}
		}
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