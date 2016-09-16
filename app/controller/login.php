<?php 

Class login extends base_module
{
	public function __construct($module_tpl_name = "", &$user = "", $post = array())
	{		
		if($module_tpl_name != "")
			parent::__construct($module_tpl_name, $user);


		//va checker a chaque page si on est bien logger
		if(isset($_POST['return_form_complet'])) 
			config::$is_connect = $this->check_session($_POST);

		else if(isset($_SESSION['pseudo']))
			config::$is_connect = 1;

		else
			config::$is_connect = 0;


		if($module_tpl_name != "")
			return $this->render();
	}

	public function check_session($post)
	{
		if($post['return_form_complet'] == 55157141)
		{
		    if(isset($post["pseudo"]) && isset($post["password"]))
		    {
		    	$pseudo = $this->check_post_login($post['pseudo']);
		    	$password = $this->check_post_login($post['password']);

		    	if(!$pseudo || !$password)
		    	{
		    		$_SESSION['error'] = "!! Attention votre login ou votre mot de passe est trop court !!";
		    		return 0;
		    	}
		    	else
		    	{	
		           	$req_sql = new StdClass();
		           	$req_sql->table = "login";
		           	$req_sql->var = "*";
		           	$req_sql->where = "login = '".$pseudo."'";
					$res_fx = $this->select($req_sql);

		           	$res_fx = $res_fx[0];

		            if(empty($res_fx))
		            {
		                $_SESSION['error'] = 'Login incorrect !';
		                return 0;
		            }
		            else if (password_verify($password, $res_fx->password))
		            {
		            	unset($_SESSION['error']);
		            	unset($post);
		                $_SESSION['pseudo'] = $res_fx->login;
		                $_SESSION['level'] = $res_fx->level;
		                $_SESSION['last_connect'] = $res_fx->last_connect;
		                return 1;
		            }
		            else
		            {
		            	$_SESSION['error'] = 'Mot de passe incorrect !';
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

	private function check_post_login($text)
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
