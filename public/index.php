<!DOCTYPE html>
<?php
require "../app/controller/fonction.php";
require '../app/controller/load_class.php'; 
Autoloader::register(); 


$path_file = "../app";
global $base_path;
$base_path = "/diy_n_game/";
global $error;
$error = array();

if(!isset($_GET['page']))
	$_GET['page'] = 'home';

require_once("../app/controller/load_class.php");
session_start();
//ou il va recevoir 0 ou 1 cela dépend de la secu
global $is_connect;

$security = new security();
$is_connect = $security->check_session($_POST);


		//si le joueur est connecter on arrive sur la page de jeu

ob_start();?>
<html lang="Fr">
<head>
	__TPL_top_head__
</head>

<body>

	__MOD_header__
	__MOD_breadcrumb__

	<!--<div class='col-lg-2'>Nouveautés, mises a jour et réseaux sociaux</div>-->

	
	<? 
	if($is_connect == 1)
	{
		global $user;
		$user = new user();
	}
	else
	{
		$user = 0;
	}


	$route = new router();
	$route->router($_GET, $is_connect);
	?>
		
	<!--<div class='col-lg-2'>Pub, ticket a gratter toute les heures, concours ext ext/div>-->
	
	__TPL_bottom_head__
	
</body>
</html>
<? $page = ob_get_clean();
//appel le parseur qui rendra tout les modules et tout les vues
$parser = new parser();
$page = $parser->parser_main($page, $user, $is_connect);
echo $page; // affiche toute la page web générée



//affiche_pre($user);


//affiche les messages d'erreur du code
if(!empty($error))
{
	affiche_pre($error);
	
}

//affiche_pre($_SESSION);