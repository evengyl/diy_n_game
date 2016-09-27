<?php 

Class sign_up extends base_module
{
	public $time_now;
	public function __construct($module_tpl_name, &$user)
	{		

		if($module_tpl_name != "")
			parent::__construct($module_tpl_name, $user);

		if(isset($_POST['return_form_complet']))
			$this->traitement_post_inscription($_POST);
		
		return $this->render();
	}


	public function traitement_post_inscription($post)
	{

		if(isset($post['return_form_complet'])) //on s'assure qu'aucun erreur est générée si pas logged
		{

			if($post['return_form_complet'] == 14175155)
			{
			    if(isset($post["pseudo"]) && isset($post["password-1"]) && isset($post["password-2"]) && isset($post["email"]))
			    {
			    	$pseudo = user::check_post_sign_up_and_my_account($post['pseudo']);
			    	$password = user::check_post_sign_up_and_my_account($post['password-1']);
			    	$password_verification = user::check_post_sign_up_and_my_account($post['password-2']);
			    	$email = user::check_post_sign_up_and_my_account($post['email']);

			    	if($pseudo == '0'|| $password == '0' || $password_verification == '0' || $email == '0')
			    	{
			    		$_SESSION['error'] = "!! Attention votre login ou votre mot de passe est trop court !!";
			    		return 0;
			    	}
			    	else if($password != $password_verification)
			    	{
			    		$_SESSION['error'] = "Les mots de passe ne correspondent pas.";
			    		return 0;
			    	}
			    	else
			    	{

			    		$req_sql = new stdClass;
						$req_sql->table = "login";
						$req_sql->var = "login";
						$req_sql->where = "login = '".$pseudo."'";

						$res_sql = $this->select($req_sql);

		            	if(empty($res_sql))
			            {
			                $this->time_now = $this->set_time_now();
			                $password = password_hash($password, PASSWORD_DEFAULT);
				    		$req_sql = new stdClass;
							$req_sql->ctx = new stdClass;
							$req_sql->ctx->login = $pseudo;
							$req_sql->ctx->password = $password;
							$req_sql->ctx->last_connect = $this->time_now;
							$req_sql->ctx->avertissement = 0;
							$req_sql->ctx->level = 0;
							$req_sql->ctx->level_culture_vg = 0;
							$req_sql->ctx->level_usine_pg = 0;
							$req_sql->ctx->level_labos_bases = 0;
							$req_sql->ctx->last_culture_vg = 0;
							$req_sql->ctx->last_usine_pg = 0;
							$req_sql->ctx->point_vente = 0;
							$req_sql->ctx->point = 0;
							$req_sql->ctx->list_arome_not_have = user_ressources::get_string_all_id_aromes();
							$req_sql->table = "login";
							$this->insert_into($req_sql);

							//va insrer les données de bases pour le commencent du jeu
							
							$_SESSION['pseudo'] = $pseudo;
			                $_SESSION['password'] = $password;
			                $_SESSION['last_connect'] = $this->time_now;
			                $_SESSION['success'] = "Vous êtes désormais inscrit ! Merci !";
				    		unset($_SESSION['error']);
				            unset($post);
				            $this->set_all_component_basic();
				            return 1;
				            
			            }else{
			            	$_SESSION['error'] = 'Ce pseudo est déjà utilisé.';
			        		return 0;
			            }
			    	}	        
			    }
			    else
			    {
			        $_SESSION['error'] = 'Formulaire mal rempli';
			        return 0;
			    }


			}
			else
			{
				$_SESSION['error'] = "Attention, Le clients à tenter un priratage";
				return 0;
			}

			
		}
		else if(isset($_SESSION['pseudo']))
			return 1;
		else
		{
			unset($_SESSION["error"]);
			return 0;
		}
	}



	public function set_time_now()
	{
		return date("U");
	}

	public function set_all_component_basic()
	{
		$req_sql = new stdClass;
		$req_sql->table = "login";
		$req_sql->var = "id";
		$req_sql->where = "login = '".$_SESSION['pseudo']."'";

		$res_sql = $this->select($req_sql);

		if(!empty($res_sql))
		{
			$id_user = $res_sql[0]->id;
			unset($res_sql);
		
			unset($req_sql);
			$req_sql = new stdClass;
			$req_sql->ctx = new stdClass;
			$req_sql->ctx->id_user = $id_user;
			$req_sql->ctx->bases_2080 = Config::$bases_2080;
			$req_sql->ctx->bases_5050 = Config::$bases_5050;
			$req_sql->ctx->bases_8020 = Config::$bases_8020;
			$req_sql->ctx->bases_1000 = Config::$bases_1000;
			$req_sql->table = "bases";

			$this->insert_into($req_sql);
			unset($req_sql);

			$req_sql = new stdClass;
			$req_sql->ctx = new stdClass;
			$req_sql->ctx->id_user = $id_user;
            $req_sql->ctx->price_search_1 = 0;
            $req_sql->ctx->price_search_2 = 0;
            $req_sql->ctx->price_search_3 = 0;
            $req_sql->ctx->chance_to_win_1 = 0;
            $req_sql->ctx->chance_to_win_2 = 0;
            $req_sql->ctx->chance_to_win_3 = 0;
            $req_sql->ctx->time_search_for_one_k_argent_depenser = 0;
            $req_sql->ctx->prix_vingt_quatre_vingt = 0;
            $req_sql->ctx->prix_cinquante_cinquante = 0;
            $req_sql->ctx->prix_quatre_vingt_vingt = 0;
            $req_sql->ctx->prix_cent = 0;
            $req_sql->table = "amelioration_var_config";

			$this->insert_into($req_sql);
			unset($req_sql);


			$req_sql = new stdClass;
			$req_sql->ctx = new stdClass;
			$req_sql->ctx->last_culture_vg = Config::$last_culture_vg;
			$req_sql->ctx->last_usine_pg = Config::$last_usine_pg;
			$req_sql->ctx->argent = Config::$argent;
			$req_sql->ctx->litter_vg = Config::$litter_vg;
			$req_sql->ctx->litter_pg = Config::$litter_pg;
			$req_sql->ctx->point = 0;
			$req_sql->where = "id = '".$id_user."'";
			$req_sql->table = "login";

			$this->update($req_sql);
			unset($req_sql);


			$req_sql = new stdClass;
			$req_sql->ctx = new stdClass;
			$req_sql->ctx->id_user = $id_user;
			$req_sql->ctx->frigo = Config::$frigo;
			$req_sql->ctx->pipette = Config::$pipette;
			$req_sql->ctx->flacon = Config::$flacon;
			$req_sql->table = "hardware";

			$this->insert_into($req_sql);
			unset($req_sql);
		}

	}

}

