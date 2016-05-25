<?

Class my_account extends base_module
{
	public function __construct($module_tpl_name, &$user)
	{		

		if($module_tpl_name != "")
			parent::__construct($module_tpl_name, $user);



		if($module_tpl_name != "")
			return $this->assign_var("user", $this->user_obj)->render();
	}

	public function change_infos($post){
		if(isset($post['return_form_complet'])) //on s'assure qu'aucun erreur est générée si pas logged
		{
			if($post['return_form_complet'] == 18041997)
			{
			    if(isset($post["pseudo"]) && isset($post["password-1"]) && isset($post["password-2"]))
			    {
			    	$pseudo = $this->check_post_sign_up($post['pseudo']);
			    	$password = $this->check_post_sign_up($post['password-1']);
			    	$password_verification = $this->check_post_sign_up($post['password-2']);

			    	if($pseudo == '0'|| $password == '0' || $password_verification == '0')
			    	{
			    		$_SESSION['error'] = "!! Attention votre pseudo ou votre mot de passe est trop court !!";
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
			                //ok
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

	private function check_post_change_infos($text)
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

}


