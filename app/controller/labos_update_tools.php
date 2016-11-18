<?php 

Class labos_update_tools extends base_module
{
	public function __construct()
	{		
		parent::__construct(__CLASS__);


		$array_update_for_tpl = $this->prepare_array_update_for_tpl(Config::$array_name_search_and_price);

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

						$this->insert_search_update_en_cours($name_batiment, $array_update_for_tpl[$_POST['name_search']]->time_finish, Config::$$real_name_search);

						$this->user->set_argent_user($price, "-");
						
					}
				}
			}
		}

		$array_update_for_tpl = $this->prepare_array_update_for_tpl(Config::$array_name_search_and_price);

		$this->user->get_variable_user();
		return $this->assign_var("user", $this->user)->assign_var('array_update_for_tpl', $array_update_for_tpl)->render();
	}



	public function prepare_array_update_for_tpl($array_name_search_and_price)
	{
		//il faut calculer le prix des recherche en fct du level et faire un tab propre pour le tpl
		unset($this->user->amelioration_var_config->id);
		unset($this->user->amelioration_var_config->id_user);

		$array_update_final_tpl = array();

		foreach($this->user->amelioration_var_config as $name_update => $level_update)
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
			$array_update_final_tpl[$name_update]->time_finish = date("U") + $array_update_final_tpl[$name_update]->time_construct_unix;
			$array_update_final_tpl[$name_update]->time_finish_construct_real = $this->user->convert_sec_unix_in_time_real_to_rest( date("U") + $array_update_final_tpl[$name_update]->time_construct_unix);


			//va vérifier si une recherhce est lancée		
			foreach($array_update_final_tpl as $key => $value)
			{
				if(!$this->check_update_en_cours())
				{
					if($this->user->verifiy_argent_user($value->prix_next_level))
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


	public function insert_search_update_en_cours($name_batiment, $time_finish, $real_name_search)
	{
		$req_sql = new stdClass;
		$req_sql->ctx = new stdClass;
		$req_sql->ctx->id_user = $this->user->user_infos->id;
		$req_sql->ctx->name_batiment = $name_batiment;
		$req_sql->ctx->time_finish = $time_finish;
		$req_sql->ctx->real_name_search = $real_name_search;
		$req_sql->table = "update_en_cours";
		$this->user->insert_into($req_sql);

	}

	public function check_update_en_cours()
	{
		$i = 0;
		if(isset($this->user->update->{0}))
			return true;
		else
			return false;
	}

}
