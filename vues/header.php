<div id='header' class="header col-xs-12 col-without-padding">
	<div class="col-xs-2" style="height:125px;">
		<img id='rotate' style="width:120px; height:120px;" src="<?= Config::$path_public; ?>/images/test-logo.png">
		<img id="logo_fiole" style="position:relative; top:-93px; left:31px; width:60px; height:60px;" src="<?= Config::$path_public; ?>/images/fiole-logo.png">
	</div>
	<div class="logo col-xs-8">
		<a href="<?= Config::$path_public; ?>"><?= Config::$name_website; ?></a>
	</div>
	<div class="col-xs-2" id="" style="color:white;">
		<?php echo "Heure Serveur : ".date('d/m/Y H:i:s'); ?>
	</div>

		__TPL_nav_top__
		 
		<?if(Config::$is_connect == 1)
			echo "__MOD2_ressource__";?>
</div>
