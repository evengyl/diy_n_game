<!DOCTYPE html>
<?php
require "../app/controller/fonction.php";
require '../app/controller/load_class.php'; 
Autoloader::register(); 
session_start();

global $error;
$error = array();

if(!isset($_GET['page']))
	$_GET['page'] = 'home';


//ou il va recevoir 0 ou 1 cela dépend de la secu
$login = new login("");
Config::$is_connect = $login->check_session($_POST);


		//si le joueur est connecter on arrive sur la page de jeu

ob_start();
global $user;
$user = new user();
$route = new router();?>

<html lang="Fr-be">
	<head>
		__TPL_top_head__
	</head>
<body onload="timer()">

	__MOD_header__

	<!--<div class='col-lg-2'>Nouveautés, mises a jour et réseaux sociaux</div>-->	
	<? $route->router($_GET); ?>
		
	<!--<div class='col-lg-2'>Pub, ticket a gratter toute les heures, concours ext ext/div>-->	
	__TPL_bottom_head__

	__TPL_footer__
	
</body>
</html>
<? $page = ob_get_clean();
//appel le parseur qui rendra tout les modules et tout les vues
$parser = new parser();
$page = $parser->parser_main($page, $user);
echo $page; 

//affiche les messages d'erreur du code
if(!empty($error))
{
	//affiche_pre($error);
	
}


//affiche_pre($user);