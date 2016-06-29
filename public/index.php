<!DOCTYPE html>
<?
require "../app/controller/fonction.php";
$time_start = microtime_float();
require '../app/controller/load_class.php'; 

Autoloader::register(); 

session_start();
$db = new _db_connect();

global $error;
$error = array();

if(!isset($_GET['page']))
	$_GET['page'] = 'home';




ob_start();
global $user;

$a = new stdClass();
$post = $_POST;
$login = new login("", $a, $post);


if(isset($user))
	unset($user);
else
	$user = new user();


if(Config::$is_connect == 1)
{
	new user_ressources($user);
	new user_batiments($user);
	$user->get_variable_user();
}


$route = new router();?>

<html lang="Fr-be">
	<head>
		__TPL_top_head__
	</head>
<body onload="timer()">


	__MOD2_header__

	<? $route->router($_GET); ?>
		
	__TPL2_bottom_head__

	__TPL2_footer__
	
</body>
</html>
<? $page = ob_get_clean();
//appel le parseur qui rendra tout les modules et tout les vues
$parser = new parser($user);
$page = $parser->parser_main($page, $user);
echo $page; 











//affiche les messages d'erreur du code
if(!empty($error))
{
	affiche_pre($error);
}

affiche_pre($user);
// bug affiche_pre(Config::$list_req_sql);
$time_stop = microtime_float();
$time_laps = (float)$time_stop - $time_start;
affiche_pre("Executer en ".(float)$time_laps);

if(!empty($_POST))
{
	foreach($_POST as $key => $values)
	{
		unset($_POST[$key]);
	}
}




