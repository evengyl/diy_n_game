<?php 

Class security extends user
{
	//doit contenir le systeme de verification des droits et des access
	// les systeme et toutes la gestions des ressources de l'user
	public $all_query;

	public function __construct()
	{
		$this->all_query = new all_query();
	}

	public function check_session($post)
	{
		global $error;
		//doit return 0 pour non connecter et mettre le get a home et 1 si connecter
		
		if(isset($post['return_form_complet'])) //on s'assure qu'aucun erreur est générée si pas logged
		{
			if($post['return_form_complet'] == 55157141)
			{
			    if(isset($_POST["pseudo"]) && isset($_POST["password"]))
			    {
			    	$pseudo = $this->check_post_login($_POST['pseudo']);
			    	$password = $this->check_post_login($_POST['password']);


			    	if($pseudo == '0'|| $password == '0')
			    	{
			    		$_SESSION['error'] = "!! Attention votre login ou votre mot de passe est trop court !!";
			    		return 0;
			    	}
			    	else
			    	{	

			           	$res_fx = $this->all_query->other_query('SELECT * FROM login WHERE login = "'.$pseudo.'"');
			           	$res_fx = $res_fx[0];

			            if(empty($res_fx))
			            {
			                $_SESSION['error'] = 'Login incorrect !';
			                return 0;
			            }
			            else if($res_fx->password == $password)
			            {
			            	unset($_SESSION['error']);
			            	unset($_POST);
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
				$error[] = "Attention, Le clients à tenter un priratage";
				return 0;
			}

			
		}
		else if(isset($_SESSION['pseudo']))
			return 1;
		else
		{
			//$error[] = "Attention, Vous n'êtes pas logger";
			return 0;
		}
			

	}


	private function check_post_login($text)
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