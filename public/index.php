<!DOCTYPE html>
<?php
require "../app/controller/fonction.php";
require '../app/controller/load_class.php'; 
Autoloader::register(); 
session_start();
$db = new _db_connect();



global $error;
$error = array();

if(!isset($_GET['page']))
	$_GET['page'] = 'home';


//ou il va recevoir 0 ou 1 cela dépend de la secu




//$sign_up = new sign_up("");

//$my_account = new my_account("");

//if(Config::$is_connect == 0){
	//$sign_up->doIt($_POST);
//}else{
//	$my_account->change_infos($_POST);
//}

		//si le joueur est connecter on arrive sur la page de jeu

ob_start();
global $user;

$a = new stdClass();
$post = $_POST;
$login = new login("", $a, $post);
if(isset($user))
	unset($user);
$user = new user();
$route = new router();?>

<html lang="Fr-be">
	<head>
		__TPL_top_head__
	</head>
<body onload="timer()">


	__MOD2_header__

	<!--<div class='col-lg-2'>Nouveautés, mises a jour et réseaux sociaux</div>-->	
	<? $route->router($_GET); ?>
		
	<!--<div class='col-lg-2'>Pub, ticket a gratter toute les heures, concours ext ext/div>-->	
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
	//affiche_pre($error);
	
}


affiche_pre($user);
affiche_pre(Config::$list_req_sql);


if(!empty($_POST))
{
	foreach($_POST as $key => $values)
	{
		unset($_POST[$key]);
	}
}

