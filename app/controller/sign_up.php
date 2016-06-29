<?php 

Class sign_up extends base_module
{
	public $time_now;
	public function __construct($module_tpl_name, &$user)
	{		

		if($module_tpl_name != "")
			parent::__construct($module_tpl_name, $user);

		if(isset($_POST['return_form_complet']))
			$this->doIt($_POST);
		
		return $this->render();
	}


	public function doIt($post)
	{

		if(isset($post['return_form_complet'])) //on s'assure qu'aucun erreur est générée si pas logged
		{

			if($post['return_form_complet'] == 14175155)
			{
			    if(isset($post["pseudo"]) && isset($post["password-1"]) && isset($post["password-2"]) && isset($post["email"]))
			    {
			    	$pseudo = $this->check_post_sign_up($post['pseudo']);
			    	$password = $this->check_post_sign_up($post['password-1']);
			    	$password_verification = $this->check_post_sign_up($post['password-2']);
			    	$email = $this->check_post_sign_up($post['email']);

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
				$error[] = "Attention, Le clients à tenter un priratage";
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

	private function check_post_sign_up($text)
	{
		$text = trim($text);
		$text = htmlentities($text);
		$nb_char = strlen($text);
		if($nb_char <= 6)
		{			
			return 0;		
		}
		else
		{
			return $text;
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
			$req_sql->ctx->last_culture_vg = Config::$last_culture_vg;
			$req_sql->ctx->last_usine_pg = Config::$last_usine_pg;
			$req_sql->ctx->argent = Config::$argent;
			$req_sql->ctx->litter_vg = Config::$litter_vg;
			$req_sql->ctx->litter_pg = Config::$litter_pg;
			$req_sql->where = "id = '".$id_user."'";
			$req_sql->table = "login";

			$this->update($req_sql);
			unset($req_sql);
		}

	}

}


