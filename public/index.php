<!DOCTYPE html>
<?php


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
$is_connect = $security->check_session($_POST);

if($is_connect)
		$_GET['page'] = 'game_home';
		//si le joueur est connecter on arrive sur la page de jeu

ob_start();?>
<html lang="Fr">
<head>
	__TPL_top_head__
</head>

<body>
	__TPL_header__
	<? $route->router($_GET); ?>
	
	<!--__TPL_footer__-->
	__TPL_bottom_head__
	
</body>
</html>
<? $page = ob_get_clean();
//appel le parseur qui rendra tout les modules et tout les vues
$page = $parser->parser_main($page);
echo $page; // affiche toute la page web générée

//affiche les messages d'erreur du code
if(!empty($error))
{
	affiche_pre($error);
}






affiche_pre($_SESSION);