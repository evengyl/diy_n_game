<?php
Class user_batiments extends user
{
	public $time_now = 0;

	public function __construct($user)
	{
		$this->time_now = date("U");
		$user->user_infos->id_arome_win = "";
		$this->validate_construct($user);
		
	}

	public function validate_construct($user)
	{
		$req_sql = new stdClass;
		$req_sql->table = "construction_en_cours";
		$req_sql->var = "*";
		$req_sql->where = "id_user= '".$user->user_infos->id."'";
		$res_sql = all_query::select($req_sql);
		unset($req_sql);


		if(!empty($res_sql))
		{
			foreach($res_sql as $row_construct)
			{
				if($row_construct->time_finish <= $this->time_now)
				{
					//on indique dans la base que le level est changer 
					$set_level_up = $user->user_infos->{$row_construct->name_batiment}+1;
					$req_sql = new stdClass;
					$req_sql->table = "login";
					$req_sql->where = "id = '".$row_construct->id_user."'";
					$req_sql->ctx = new stdClass;
					$req_sql->ctx->{$row_construct->name_batiment} = $set_level_up;
					all_query::update($req_sql);

					//et on delete la ligne qui est finie;
					$del_sql = new stdClass;
					$del_sql->table = "construction_en_cours";
					$del_sql->where = "id = '".$row_construct->id."' AND id_user = '".$user->user_infos->id."'";
					all_query::delete($del_sql);
				}
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

	public function check_construction_en_cours($name_batiment_from_controller = "", $prix_level_up)
	{
		if(!empty($this->user_obj->construction))
		{	
		//comme il y a des construction en cours il faut les faire vérifié pour voir si celle de notr ebatiments est dedans	
			foreach($this->user_obj->construction as $row_construct)
			{
				if($row_construct->name_batiment == $name_batiment_from_controller)
					return 1;	//la consctruction était déjà lancée quand le joueur c'est logger
			}
			//si il sort de la boucle c'est qu'il n'a rien trouver dans la base
			//mais avant ça on va vérifié si il a l'argent nécessaire
			if($this->user_obj->user_infos->argent >= $prix_level_up)
				return 0;	//la tout est ok rien n'est lancé et il as assez d'argnet
			else
				return 2;	//2 egale que on a pas l'argent
		}
		else
		{
			//mais avant ça on va vérifié si il a l'argent nécessaire
			if($this->user_obj->user_infos->argent >= $prix_level_up)
				return 0;
			else
				return 2;	
		}
	}


} 