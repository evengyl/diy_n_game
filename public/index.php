<!DOCTYPE html>
<?php
$path_file = "../app";
$base_path = "/diy_n_game/";
require_once("../app/controller/load_class.php");

$user = new user();

session_start();
		



?>
<html lang="Fr">
<head>
	<meta name='description' content="Weller designs fume extractor that allows to absorb the smoke produced by machine or soldering station, so these extractor protects the health of it's users" >
	
	<meta name="robots" content="all, index, follow" />
	<meta name="revisit-after" content="7 days" />
	<meta http-equiv="content-type" content="text/html" charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="author" content="Baudoux Loïc" />
	<link rel="SHORTCUT ICON" href="<?php echo $base_path?>public/images/Picto-Matedex-SD.ico" />
	<link rel="stylesheet" type="text/css" href="<?php echo $base_path?>public/css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo $base_path?>public/css/style.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo $base_path?>public/css/lightbox.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

</head>
<body>

	<div class="head">

	<div class="connect_div"><?php
	
	if(isset($_SESSION['login']))
	{
		echo (isset($_SESSION['login']))?'<a href="logout.php"></br><center>Logout</center></a>' : '';
	}
	else
	{
		if(isset($_POST['return_form_complet']))
		{
			if($_POST['return_form_complet'] == 1)
			{
				$affiche_form_connect = 0;
				$retour = $user->connect_verif($_POST, $all_query);
				if($retour)
				{
					require_once('../vues/client_game.php');
				}
				else
					$affiche_form_connect = 1;
			}
		}
		else
			$affiche_form_connect = 1;

		if($affiche_form_connect)
			echo $user->connect_form();
	}	
	?>	
	</div>

	<script type="text/javascript" src="<?php echo $base_path?>public/js/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="<?php echo $base_path?>public/js/less-1.7.4.min.js"></script>
	<script type="text/javascript" src="<?php echo $base_path?>public/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo $base_path?>public/js/lightbox.min.js"></script>
	<script type="text/javascript" src="<?php echo $base_path?>public/js/blocksit.js"></script>

</body>

</html>

