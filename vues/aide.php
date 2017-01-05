<div class="col-xs-10 col-lg-12 col-without-padding col-without-radius content_game">
	<?=(Config::$is_connect)?"__TPL_nav_game__":"";?>
	<div class="col-lg-9" style="margin-top:1px;">

		<div class="col-xs-12 col-md-12">
			<div class="col-lg-12 explication pull-right">
				<h3 class="title">Explication : </h3>
				<span>Dans Diy_n_game, Pour créer et vous aidez à conçevoir toujours plus de produits, des personnes sont la pour rechercher des améliorations.
					Celles-ci permette de payer moins chère ou que votre coup en ressources soit réduits, ainsi que les temps des recherches des arômes par exemple ect...</span>
			</div>
			<center><img class="img-responsive" src ='<?= Config::$path_public; ?>/images/Schéma_diy_n_game.png'></center>
		</div>
	</div>
</div>
<?
unset($_SESSION['error']);