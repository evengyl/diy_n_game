<?

Class my_account extends base_module
{
	public function __construct()
	{		
		parent::__construct(__CLASS__);

		if(isset($_POST['return_post_account_pass_change']))
			$this->change_infos($_POST);

		return $this->assign_var("user", $this)->render();
	}


	public function change_infos($post)
	{
		if($post['return_post_account_pass_change'] == 18041997)
		{
		    if(isset($post["password-1"]) && isset($post["password-2"]))
		    {
		    	$password = $this->check_post_sign_up_and_my_account($post['password-1']);
		    	$password_verification = $this->check_post_sign_up_and_my_account($post['password-2']);

		    	if($password == '0' || $password_verification == '0')
		    	{
		    		$_SESSION['error'] = "!! Attention votre mot de passe est trop court !!";
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
					$req_sql->ctx = new stdClass;
					$req_sql->ctx->password = $password = password_hash($password, PASSWORD_DEFAULT);
					$req_sql->where = "login = '".$this->user_infos->login."'";
					$res_sql = $this->update($req_sql);

	            	$_SESSION['error'] = 'Votre mot de passe à bien été changé.';
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

	private function check_post_change_infos($text)
	{
		$text = trim($text);
		$text = htmlentities($text);
		$nb_char = strlen($text);
		if($nb_char <= 6)
			return 0;		

		else
			return $text;
	}
}