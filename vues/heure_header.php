<div id='header' class="header col-xs-12 col-without-padding">
	<div class="col-xs-2" style="height:125px;">
		<img id='rotate' style="width:120px; height:120px;" src="<?= Config::$path_public; ?>/images/test-logo.png">
		<img id="logo_fiole" style="position:relative; top:-93px; left:31px; width:60px; height:60px;" src="<?= Config::$path_public; ?>/images/fiole-logo.png">
	</div>
	<div id="titre" class="logo col-xs-8">
		<a href="<?= Config::$base_path; ?>/public/index.php">Vapes,&nbsp;&nbsp;&nbsp;Diy - Game</a>
	</div>
	<div class="col-xs-2" id="heure_serveur" style="color:white;">
		<?php echo "Heure Serveur : ".date('d/m/Y H:i:s');
			//echo "<br>Connecté en tant que : <b>".$user->user_infos->login."</b>";

		?>
	</div>

		__TPL_nav_primal__
		__MOD_ressource__

		
</div>