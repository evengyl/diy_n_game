<?php 

Class labos_update_tools extends base_module
{
	public function __construct($module_tpl_name, &$user)
	{		
		parent::__construct($module_tpl_name, $user);


		$array_update_for_tpl = $this->prepare_array_update_for_tpl(Config::$array_name_search_and_price, $user);

		if(isset($_POST['price']) && isset($_POST['name_search']))
		{
			if(isset($array_update_for_tpl[$_POST['name_search']]))
			{
				if($array_update_for_tpl[$_POST['name_search']]->ok_for_search == '2')
				{
					if($array_update_for_tpl[$_POST['name_search']]->level <= $array_update_for_tpl[$_POST['name_search']]->level_max)
					{
						$price = $_POST['price'];
						$name_batiment = $_POST['name_search'];

						$real_name_search = $name_batiment."_name";

						user_research_n_update::insert_search_update_en_cours($name_batiment, $array_update_for_tpl[$_POST['name_search']]->time_finish, Config::$$real_name_search);

						$this->set_argent_user($price, "-");
						
					}
				}
			}
		}

		$this->user_obj->get_variable_user();
		$array_update_for_tpl = $this->prepare_array_update_for_tpl(Config::$array_name_search_and_price, $user);

		return $this->assign_var("user", $user)->assign_var('array_update_for_tpl', $array_update_for_tpl)->render();
	}



	public function prepare_array_update_for_tpl($array_name_search_and_price, $user)
	{
		//il faut calculer le prix des recherche en fct du level et faire un tab propre pour le tpl
		unset($user->amelioration_var_config->id);
		unset($user->amelioration_var_config->id_user);

		$array_update_final_tpl = array();

		foreach($user->amelioration_var_config as $name_update => $level_update)
		{
			$array_update_final_tpl[$name_update] = new StdClass();
			$array_update_final_tpl[$name_update]->name = $name_update;
			$real_name_search = $name_update."_name";
 			$array_update_final_tpl[$name_update]->real_name = Config::$$real_name_search;
			$array_update_final_tpl[$name_update]->level = $level_update;
			$array_update_final_tpl[$name_update]->next_level = $level_update+1;
			$array_update_final_tpl[$name_update]->level_max = $array_name_search_and_price[$name_update]['level_max'];

			if($array_update_final_tpl[$name_update]->level > '0')
			{
				$array_update_final_tpl[$name_update]->time_construct_unix = 5400 * $level_update;
				$array_update_final_tpl[$name_update]->prix_next_level = ($array_update_final_tpl[$name_update]->level -1) * $array_name_search_and_price[$name_update]['prix_level'];
			}
			else
			{
				$array_update_final_tpl[$name_update]->time_construct_unix = 5400;
				$array_update_final_tpl[$name_update]->prix_next_level = $array_name_search_and_price[$name_update]['prix_level'];
			}
			$array_update_final_tpl[$name_update]->time_finish = $this->time_finish_construct($array_update_final_tpl[$name_update]->time_construct_unix);
			$array_update_final_tpl[$name_update]->time_finish_construct_real = $this->convert_sec_unix_in_time_real_to_rest($this->time_finish_construct($array_update_final_tpl[$name_update]->time_construct_unix));


			//va vérifier si une recherhce est lancée		
			foreach($array_update_final_tpl as $key => $value)
			{
				if(!user_research_n_update::check_update_en_cours())
				{
					if($this->verifiy_argent_user($value->prix_next_level))
					{
						$array_update_final_tpl[$name_update]->ok_for_search = 2;
					}
					else
					{
						$array_update_final_tpl[$name_update]->ok_for_search = 1;
						//il n'as aps assez d'argent
					}
				}
				else
				{
					$array_update_final_tpl[$name_update]->ok_for_search = 0;
					//il y a déjà une recherhce en cours
				}
			}
		}
		return $array_update_final_tpl;
	}

}
