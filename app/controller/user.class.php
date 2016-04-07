<?php


Class user extends all_query
{
	//doit se 
		//zone de test des ressources 
		// tout ce passe en seconde c'est plus simple 
	public $error = '';
	public $time_unix = '';
	public $ressource_avant = '';
	public $prod_acutelle = '';
	public $time_before = '';

	public function __construct()
	{
		$ressource_avant = 15000;

		$prod_acutelle = 1.25; // par seconde 

		$time_before = 1460030000; 
		//on dis que c'est recup de la bsd


		if($this->error != '')
		{
			return $error;
		}

	}
	public function connect_form()
	{
		$form='
		<div class="col-lg-12">		
			<form action="#" method="post" class="col-lg-4 col-lg-offset-4">

				<div class="form-group">
					<input name="pseudo" type="text" class="form-control" required placeholder="Pseudo">
				</div>

				<div class="form-group">
					<input name="password" type="password" class="form-control" required placeholder="Mot de passe">
				</div>

				<div class="checkbox">
					<label>
						<input type="checkbox"> Check me out
					</label>
				</div>
				<input type="hidden" name="return_form_complet" value="1">
				<button type="submit" class="btn btn-default">Submit</button>

			</form>
			</div>';
		
		return $form;
	}



	public function connect_verif($post_form = array())
	{

		if(isset($_SESSION['error']))
		{
			if($_SESSION['error'] != '')
			{
				paragraphe_style($_SESSION['error']);
			}
		}
		if(isset($_POST['return_form_complet']) && $_POST['return_form_complet'] == 1)
		{
		    if(isset($_POST["pseudo"]))
		    {
		        if(is_post_not_ok('pseudo') || is_post_not_ok('password'))
		        {
        			$_SESSION['error'] = 'Eléments manquant ou incorrecte';
		            return 0;
		        }
		        else
		        {
		           $res_fx = parent::other_query('SELECT * FROM login WHERE login = "'.$_POST["pseudo"].'"');
		           $res_fx = $res_fx[0];
		            if(empty($res_fx))
		            {
		                $_SESSION['error'] = 'Login incorrect';
		                return 0;
		            }
		            else if($res_fx->password == $_POST['password'])
		            {
		            	unset($_SESSION['error']);

		                $level_user = $res_fx->level;
		                $user_connected = $res_fx->login;
		                $formulaire = false;

		                $_SESSION['pseudo'] = $res_fx->login;
		                $_SESSION['level'] = $res_fx->level;
		                $_SESSION['last_connect'] = $res_fx->last_connect;
		                return 1;
		            }
		        }
		    }
		    else
		    {
		        $_SESSION['error'] = 'Formulaire mal rempli';
		        echo 'here 1';
		        return 0;
		    }
		}
		else
		{
			$_SESSION['error'] = 'Erreur de Login ou de mot de passe';
		    return 0;
		}


	}

	public function render()
	{
		// retoune le template avec tout les element
	}

	public function calcul_time()
	{
		$secondes = date("U");

		$minutes = $secondes/60;

		$heures = $minutes/60;

		$jours = $heures/24;

		$annees = $jours/365;

		affiche_pre("L'heure universelle UNIX à : ".$secondes. " Secondes !");





		return get_new_ressource($time_before, $prod_acutelle ,$ressource_avant);


	}


	public function get_new_ressource($time_before, $value_prod, $ressource)
	{
		if(is_numeric($time_before))
		{
			if(is_numeric($value_prod))
			{
				if(is_numeric($ressource))
				{
					echo "it's ok";
				}
			}
		}

		if($time_before < date("U") || $time_before == date("U"))
		{

		}
		else if($time_before > date("U"))
		{
			$this->error =  "Vous avez triché ou alors, si le bu persiste, prenez contact avec l'administrateur";
		}
	}
}