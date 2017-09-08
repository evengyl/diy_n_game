<?
class login extends base_module
{
	public function __construct(&$_app)
	{
		$_app->module_name = __CLASS__;
		parent::__construct($_app);
		$this->_app->navigation->set_breadcrumb("Page de connexion");

		if(isset($_POST['return_form_complet']) || isset($_POST['return_form_complet_lost_login']))
		{
			Config::set_config_compared_domain();	
			Config::$is_connect =  $this->check_session($_POST);
		}

		else if(isset($_SESSION['pseudo']) && isset($_SESSION['level']) && isset($_SESSION['last_connect']) && isset($_SESSION['is_connect']))
            Config::$is_connect =  1;
		else
            Config::$is_connect =  0;

        $this->get_html_tpl =  $this->render_tpl();

	}
	public function check_session($post)
	{
		if(isset($post['return_form_complet']) && $post['return_form_complet'] == "55157141")
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
		           	$req_sql->var = "login, password, level, last_connect";
		           	$req_sql->where = "login = '".$pseudo."'";
					$res_fx = $this->sql->select($req_sql);

		            if(empty($res_fx))
		            {
		                $_SESSION['error'] = 'Login incorrect ou inexistant !';
		                return 0;
		            }
		            else if(isset($res_fx[0]->login))
		            {
		            	$res_fx = $res_fx[0];
		            	if(password_verify($password, $res_fx->password))
		            	{
			            	unset($_SESSION['error']);
			            	unset($post);
			                $_SESSION['pseudo'] = $res_fx->login;
			                $_SESSION['level'] = $res_fx->level;
			                $_SESSION['last_connect'] = $res_fx->last_connect;
			                $_SESSION['is_connect'] = 1;
			                return 1;
		            	}
		            	else
		            	{
		            		$_SESSION['error'] = 'Mot de passe incorrect !';
		            		return 0;
		            	}

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
		else if(isset($post['return_form_complet_lost_login']) && $post['return_form_complet_lost_login'] == "71407141")
		{
		    if(isset($post["pseudo"]))
		    {
		    	$pseudo = $this->user->check_post_login($post['pseudo']);

		    	if(!$pseudo)
		    	{
		    		$_SESSION['error'] = "!! Attention votre login est trop court !!";
		    		return 0;
		    	}
		    	else
		    	{	
		           	$req_sql = new StdClass();
		           	$req_sql->table = "login";
		           	$req_sql->var = "login, password, password_no_hash, email";
		           	$req_sql->where = "login = '".$pseudo."'";
					$res_fx = $this->sql->select($req_sql);

		           	

		            if(empty($res_fx))
		            {
		                $_SESSION['error'] = 'Login incorrect !';
		                return 0;
		            }
		            else
		            {
		            	$res_fx = $res_fx[0];
		            	unset($_SESSION['error']);
		            	unset($post);
		            	$subject = "Voici votre mot de passe : ".$res_fx->password_no_hash;
						mail($res_fx->email, "Recupération de mot de passe.", $subject);
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
			$_SESSION['error'] = "Attention, Le clients à tenter quelque chose avec le formulaire";
			return 0;
		}
	}

	public function check_post_login($text)
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