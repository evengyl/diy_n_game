<!DOCTYPE html>
<?php


$path_file = "../app";

global $base_path;
$base_path = "/diy_n_game/";

global $error;
$error = "";

if(!isset($_GET['page']))
	$_GET['page'] = 'home';
require_once("../app/controller/load_class.php");

$user = new user();
session_start();









ob_start();?>
<html lang="Fr">
<head>
	__TPL_top_head__
</head>

<body>
	__TPL_header__
	<div class="connect_div"><?php

		$route->router($_GET);


		if(isset($_POST['return_form_complet']))
		{
			if($_POST['return_form_complet'] == 1)
			{
				$affiche_form_connect = 0;
				$retour = $user->connect_verif($_POST, $all_query);
				if($retour)
					$is_connect = 1;
				else
					$affiche_form_connect = 1;
			}
		}
		else if(isset($_SESSION['pseudo']))
		{
			$affiche_form_connect = 0;
			$is_connect = 1;			
		}
		else
			$affiche_form_connect = 1;			

		if($affiche_form_connect)
		{
			
		}
			
		if(isset($is_connect))
		{
			if($is_connect)
				require_once('../vues/client_game.php');
		}?>
			
	</div>
	__TPL_footer__
	__TPL_bottom_head__
	
</body>
</html>
<? $page = ob_get_clean();

$page = $parser->parser_main($page);

echo $page; // affiche toute la page web générée



