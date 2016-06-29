<?php 

Class game_home extends base_module
{
	public function __construct($module_tpl_name, &$user)
	{		
		parent::__construct($module_tpl_name, $user);

		$this->set_construction_en_cours_et_traitement_pour_tpl($user);



		return $this->assign_var("user", $this->user_obj)->render();
	}

	public function set_construction_en_cours_et_traitement_pour_tpl(&$user)
	{
		if(isset($user->construction->{0}) && $user->construction->{0} != "")
		{
			foreach($user->construction as $key => $row)
			{
				$test = get_class_vars("Config");
				$user->construction->{$key}->time_finish_real = $this->convert_sec_unix_in_time_real_to_rest($row->time_finish);
				$user->construction->{$key}->real_name_batiments = $test[$row->name_batiment];
			}	
		}
	}

}



