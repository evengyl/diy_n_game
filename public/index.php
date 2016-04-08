<!DOCTYPE html>
<?php
$path_file = "../app";
$base_path = "/diy_n_game/";
require_once("../app/controller/load_class.php");

$user = new user();
session_start();
require_once('../app/controller/control_session.php');

?>
<html lang="Fr">
<head>
	<?php require_once('../vues/template_default/top_head_files.php'); ?>
</head>

<body>

	<div class="header">
		<a href="/diy_n_game/public/index.php">acceuil</a>
	</div>
	<div class="content"></div>

	<div class="connect_div"><?php
	
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
		else if(isset($_SESSION['pseudo']))
		{
			$affiche_form_connect = 0;
			require_once('../vues/client_game.php');
		}
		else
		{
			$affiche_form_connect = 1;
		}
			

		if($affiche_form_connect)
			echo $user->connect_form();
	
	?>	
	</div>
	<?php require_once('../vues/template_default/bottom_head_files.php'); ?>
</body>

</html>

