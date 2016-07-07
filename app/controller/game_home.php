<?php 

Class game_home extends base_module
{
	public function __construct($module_tpl_name, &$user)
	{		
		parent::__construct($module_tpl_name, $user);

		$this->set_construction_en_cours_et_traitement_pour_tpl($user);
		$this->set_update_en_cours_et_traitement_pour_tpl($user);
		$this->set_search_arome_et_traitement_pour_tpl($user);



		return $this->assign_var("user", $this->user_obj)->render();
	}

	public function set_construction_en_cours_et_traitement_pour_tpl(&$user)
	{
		if(isset($user->construction->{0}) && $user->construction->{0} != "")
		{
			foreach($user->construction as $key => $row)
			{
				$global_var = get_class_vars("Config");
				$user->construction->{$key}->time_finish_real = $this->convert_sec_unix_in_time_real_to_rest($row->time_finish);
				$user->construction->{$key}->real_name_batiments = $global_var[$row->name_batiment];
			}	
		}
	}

	public function set_update_en_cours_et_traitement_pour_tpl(&$user)
	{
		if(isset($user->search_arome->{0}) && $user->search_arome->{0} != "")
		{
			foreach($user->search_arome as $key => $row)
			{
				$user->search_arome->{$key}->time_finish_real = $this->convert_sec_unix_in_time_real_to_rest($row->time_finish);
			}	
		}
	}

	public function set_search_arome_et_traitement_pour_tpl(&$user)
	{
		if(isset($user->update->{0}) && $user->update->{0} != "")
		{
			$user->update->{0}->time_finish_real = $this->convert_sec_unix_in_time_real_to_rest($user->update->{0}->time_finish);
		}
	}

}



