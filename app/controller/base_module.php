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
	public $nb_arome_total;
	public $nb_arome_total_acquis;



	public function __construct($module_tpl_name = "", &$user)
	{
		if($module_tpl_name != "")
		{
			$this->template_name = $module_tpl_name;
			$this->set_template_path($this->template_name);	

			if(Config::$is_connect)
			{	
				$this->user_obj = &$user;
				$this->convert_sec_in_time_real();	
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

//partie setter du rendu
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

	public function set_template_path($name_template)
	{
		$this->template_path = "../vues/".$name_template.".php";

	}

	public function get_template_path()
	{
		return $this->template_path;
	}


//partie fonction utile de base


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

	public function set_litter_vg($littre_vg_possible)
	{
		$req_sql = new stdClass;
		$req_sql->table = "login";
		$req_sql->where = "id = '".$this->user_obj->user_infos->id."'";
		$req_sql->ctx = new stdClass;
		$req_sql->ctx->litter_vg = $this->user_obj->user_infos->litter_vg + $littre_vg_possible;
		$res_sql = $this->update($req_sql);
		unset($req_sql);
		user::get_variable_user();
	}

	public function set_litter_pg($littre_pg_possible)
	{
		$req_sql = new stdClass;
		$req_sql->table = "login";
		$req_sql->where = "id = '".$this->user_obj->user_infos->id."'";
		$req_sql->ctx = new stdClass;
		$req_sql->ctx->litter_pg = $this->user_obj->user_infos->litter_pg + $littre_pg_possible;
		$res_sql = $this->update($req_sql);
		unset($req_sql);
		user::get_variable_user();
	}

	public function set_argent_user($prix_a_deduire, $moins_plus = "-")
	{
		

		$argent_before = $this->user_obj->user_infos->argent;
		
		if($moins_plus == "-")
		{
			$this->set_point_user($prix_a_deduire);
			$argent_after = $argent_before - $prix_a_deduire;
		}
		else if($moins_plus == "+")
		{
			$this->set_point_user_vente($prix_a_deduire);
			$argent_after = $argent_before + $prix_a_deduire;
		}
			

		$req_sql = new stdClass;
		$req_sql->table = "login";
		$req_sql->where = "id = '".$this->user_obj->user_infos->id."'";
		$req_sql->ctx = new stdClass;
		$req_sql->ctx->argent = $argent_after;
		$res_sql = $this->update($req_sql);
		unset($req_sql);

		user::get_variable_user();
	}

	public function set_point_user($argent_depenser)
	{
		$point_before = $this->user_obj->user_infos->point;
		$point_gagner = $argent_depenser/1000;
		$point_after = $point_before + $point_gagner;


		$req_sql = new stdClass;
		$req_sql->table = "login";
		$req_sql->where = "id = '".$this->user_obj->user_infos->id."'";
		$req_sql->ctx = new stdClass;
		$req_sql->ctx->point = $point_after;
		$res_sql = $this->update($req_sql);
		unset($req_sql);
	}

	public function set_point_user_vente($argent_depenser)
	{
		$point_before = $this->user_obj->user_infos->point;
		$point_gagner = $argent_depenser/1000;
		$point_after = $point_before + $point_gagner;


		$req_sql = new stdClass;
		$req_sql->table = "login";
		$req_sql->where = "id = '".$this->user_obj->user_infos->id."'";
		$req_sql->ctx = new stdClass;
		$req_sql->ctx->point_vente = $point_after;
		$res_sql = $this->update($req_sql);
		unset($req_sql);
	}


	public function set_ressource_brut_user($vg_to_operate = 0, $pg_to_operate = 0, $moins_plus = "-")
	{
		$vg_before = $this->user_obj->user_infos->last_culture_vg;
		$pg_before = $this->user_obj->user_infos->last_usine_pg;
		
		if($moins_plus == "-")
		{
			$pg_after = $pg_before - $pg_to_operate;
			$vg_after = $vg_before - $vg_to_operate;
		}
		else if($moins_plus == "+")
		{
			$pg_after = $pg_before + $pg_to_operate;
			$vg_after = $vg_before + $vg_to_operate;
		}
		else
		{
			$pg_after = $pg_before - $pg_to_operate;
			$vg_after = $vg_before - $vg_to_operate;
		}
		

		$req_sql = new stdClass;
		$req_sql->table = "login";
		$req_sql->where = "id = '".$this->user_obj->user_infos->id."'";
		$req_sql->ctx = new stdClass;
		$req_sql->ctx->last_culture_vg = $vg_after;
		$req_sql->ctx->last_usine_pg = $pg_after;
		$res_sql = $this->update($req_sql);
		unset($req_sql);

		user::get_variable_user();
	}

	public function set_ressource_litter_user($litter_vg_to_operate = 0, $litter_pg_to_operate = 0, $moins_plus = "-")
	{
		$vg_before = $this->user_obj->user_infos->litter_vg;
		$pg_before = $this->user_obj->user_infos->litter_pg;
		
		if($moins_plus == "-")
		{
			$pg_after = $pg_before - $litter_pg_to_operate;
			$vg_after = $vg_before - $litter_vg_to_operate;
		}
		else if($moins_plus == "+")
		{
			$pg_after = $pg_before + $litter_pg_to_operate;
			$vg_after = $vg_before + $litter_vg_to_operate;
		}
		else
		{
			$pg_after = $pg_before - $litter_pg_to_operate;
			$vg_after = $vg_before - $litter_vg_to_operate;
		}
		

		$req_sql = new stdClass;
		$req_sql->table = "login";
		$req_sql->where = "id = '".$this->user_obj->user_infos->id."'";
		$req_sql->ctx = new stdClass;
		$req_sql->ctx->litter_vg = $vg_after;
		$req_sql->ctx->litter_pg = $pg_after;
		$res_sql = $this->update($req_sql);
		unset($req_sql);
		user::get_variable_user();
	}

	public function time_finish_construct($time_construct)
	{
		$this->time_finish = "";
		$time_now = date("U");
		$this->time_finish = $time_now + $time_construct;
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

	public function convert_sec_unix_in_time_real_to_rest($time_finish)
	{
		$time_now = date("U");
		$time_finish = $time_finish - $time_now;
		$jours = floor($time_finish/86400);
		$reste = $time_finish%86400;
		$heures = floor($reste/3600);
		$reste = $reste%3600;
		$minutes = floor($reste/60);
		$secondes = $reste%60;
		return $jours." Jours - ".$heures."h : ".$minutes."m : ".$secondes."s";
	}


	public function convert_sec_unix_in_time_real($time_to_convert)
	{
		
		$time_now = date("U");
		$time_to_convert = $time_now - $time_to_convert;
		$jours = floor($time_to_convert/86400);
		$reste = $time_to_convert%86400;
		$heures = floor($reste/3600);
		$reste = $reste%3600;
		$minutes = floor($reste/60);
		$secondes = $reste%60;
		return $jours." Jours - ".$heures."h : ".$minutes."m : ".$secondes."s";
	}


	public function verifiy_argent_user($value_verif)
	{
		if((int)$value_verif < (int)$this->user_obj->user_infos->argent)
		{
			return 1;
		}
		else
		{
			$_SESSION["error"] = "Erreur vous ne possédez pas assez d'argent pour tous créer";
			return 0;
		}
	}



}