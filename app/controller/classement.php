<?php 

Class classement extends base_module
{

	public function __construct($module_tpl_name, &$user)
	{		
		parent::__construct($module_tpl_name, $user);

		$req_sql = new stdClass();
		$req_sql->table = "login";
		$req_sql->var = "login, point, last_connect, point_vente";
		$req_sql->order = "point DESC";
		$list_user = $this->select($req_sql);

		$i = 1;
		foreach($list_user as $row_user)
		{
			$row_user->last_connect = $this->convert_sec_unix_in_time_real($row_user->last_connect);
			$row_user->point = floor($row_user->point);
			$row_user->point_vente = floor($row_user->point_vente);
			$row_user->position = $i;
			$i++;
			
		}

		$this->position_this_user = $this->get_position_user($list_user, $user);

		return $this->assign_var("list_user", $list_user)->assign_var("user", $user)->assign_var("position_user",$this->position_this_user)->render();
	}

	public function get_position_user($list_user, $user)
	{
		foreach($list_user as $row_user)
		{
			if($row_user->login == $user->user_infos->login)
			{
				$pos = $row_user->position;
			}
		}
		return $pos;
	}

}
