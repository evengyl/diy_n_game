<!DOCTYPE html>
<?
//require de base avec les fonciton diverse et le loader, la fonction microtime est la uniquement pour le temps d'execution des requete pour optimiser
require "../app/controller/fonction.php";
$time_start = microtime_float();
require '../app/controller/load_class.php'; 

//mise en route de l'autoload
Autoloader::register(); 

//mise en route de la session
session_start();


if(!isset($_GET['page']))
	$_GET['page'] = 'home';



ob_start();

//va être appeler a chaque démarage de script page et va checker si le joueur est connecter ou pas.
$login = new login();

if(Config::$is_connect == 1)
{
	if(!isset($user))
	{
		$user = new user();
		if(!empty($user))
		{
			new user_ressources($user);
			new user_batiments($user);
			new user_research_n_update($user);
			$user->get_variable_user();

			new set_update_var_global("",$user);
		}
		else
		{
			$_GET['page'] = "login";
		}
	}
}?>


<html lang="Fr-be">
	<head>
		__TPL_top_head__
	</head>
	<body onload="timer()">

		__MOD2_header__
		
		<?  $route = new router();
			$route->router($_GET); ?>
			
		__TPL2_bottom_head__

		__TPL2_footer__
		
	</body>
</html><?


$page = ob_get_clean();
//appel le parseur qui rendra tout les modules et tout les vues
$parser = new parser();
$page = $parser->parser_main($page, $user);
//affiche la page complete avec toute les données traitée
echo $page; 







$time_stop = microtime_float();
$time_laps = (float)$time_stop - $time_start;


//affiche les messages d'erreur du code
if(!empty($_SESSION['error']))
{
	affiche_pre($_SESSION['error']);
}
//affiche_pre($user);
//affiche_pre(Config::$list_req_sql);
//affiche_pre("Executer en ".(float)$time_laps);

if(!empty($_POST))
{
	foreach($_POST as $key => $values)
	{
		unset($_POST[$key]);
	}
}