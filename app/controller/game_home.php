<?php 

Class game_home extends base_module
{
	public function __construct()
	{		
		parent::__construct(__CLASS__);

		$construct_en_cours = $this->set_construction_en_cours_name_real_for_tpl();
		$this->set_update_en_cours_et_traitement_pour_tpl();
		$this->set_search_arome_et_traitement_pour_tpl();

		$array_stock_for_home = new stockage('stockage');
		$array_stock_for_home = $array_stock_for_home->tab_final_arome_acquis_traiter;

		return $this->assign_var("user", $this->user)
					->assign_var("construct_en_cours", $construct_en_cours)
					->assign_var("stock", $array_stock_for_home)
					->render();
	}

	public function set_construction_en_cours_name_real_for_tpl()
	{
		$construct_en_cours = new stdClass();

		if(isset($this->user->construction->{0}) && $this->user->construction->{0} != "")
		{
			foreach($this->user->construction as $key => $row)
			{
				$global_var = get_class_vars("Config");

				$construct_en_cours->{$key} = new stdClass();
				$construct_en_cours->{$key}->time_finish_real = $this->user->convert_sec_unix_in_time_real_to_rest($row->time_finish);
				$construct_en_cours->{$key}->real_name_batiments = $global_var[$row->name_batiment];
			}	
		}
		return $construct_en_cours;
	}

	public function set_update_en_cours_et_traitement_pour_tpl()
	{
		if(isset($this->user->update->{0}) && $this->user->update->{0} != "")
		{
			foreach($this->user->update as $key => $row)
			{
				$this->user->update{$key}->time_finish_real = $this->user->convert_sec_unix_in_time_real_to_rest($row->time_finish);
			}	
		}
	}

	public function set_search_arome_et_traitement_pour_tpl()
	{
		if(isset($this->user->search_arome->{0}) && $this->user->search_arome->{0} != "")
		{
			foreach($this->user->search_arome as $key => $row)
			{
				$this->user->search_arome->{$key}->time_finish_real = $this->user->convert_sec_unix_in_time_real_to_rest($row->time_finish);
			}	
		}
	}

}



