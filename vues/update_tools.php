<div class="col-xs-10 col-lg-12 col-without-padding col-without-radius content_game">
	__TPL_nav__
	<div class="col-lg-8" style="margin-top:1px;">

		<div class="col-xs-12 col-md-12">
			<div class="col-lg-12 explication pull-right">
				<h3 class="title">Explication : </h3>
				<span>Dans Diy_n_game, Pour créer et vous aidez à conçevoir toujours plus de produits, des personnes sont la pour rechercher des améliorations.
					Celles-ci permette de payer moins chère ou que votre coup en ressources soit réduits, ainsi que les temps des recherches des arômes par exemple ect...</span>
			</div>

			<h3 class='col-xs-12 title' style="margin-bottom:15px; border-bottom:1px solid #FF7F00; font-size:18px; padding-top:25px;">
				Recherche et listes des arômes disponible.
			</h3>

			<div style='font-size:18px; color:red' class="col-lg-12 form-group <?php echo (isset($_SESSION['error']) OR isset($_SESSION['error_bases_down']))?'has-error':''; ?>">
					<?php echo (isset($_SESSION['error']))?'<label for="exampleInputPassword1">'.$_SESSION['error'].'</label>':''; ?>
			</div>




			<form method="post" action="?page=arome_list">
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
						<img src="<?= Config::$path_public."/images/quality_search_aromes_1.jpg" ?>" class="img-responsive" alt="Qualité de la recherche d'aromes 1">
						<div class="caption">
							<h3 style="font-size:18px; margin:7px 0 7px 0; color:white;">Recherche d'arômes</h3>
							<input name="search_form_validate_1000" value="Lancer une recherche à 1000€" class="col-lg-12 btn btn-primary" type="submit">
							<input name="value" value="1000" class="col-lg-12 btn btn-primary" type="hidden">
						</div>
					</div>
				</div>
			</form>

			<form method="post" action="?page=arome_list">
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
						<img src="<?= Config::$path_public."/images/quality_search_aromes_2.jpg" ?>" class="img-responsive" alt="Qualité de la recherche d'aromes 2">
						<div class="caption">
							<h3 style="font-size:18px; margin:7px 0 7px 0; color:white;">Recherche d'arômes</h3>
							<input name="search_form_validate_2500" value="Lancer une recherche à 2500€" class="col-lg-12 btn btn-primary" type="submit">
							<input name="value" value="2500" class="col-lg-12 btn btn-primary" type="hidden">
						</div>
					</div>
				</div>
			</form>

			<form method="post" action="?page=arome_list">
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
						<img src="<?= Config::$path_public."/images/quality_search_aromes_3.jpg" ?>" class="img-responsive" alt="Qualité de la recherche d'aromes 3">
						<div class="caption">
							<h3 style="font-size:18px; margin:7px 0 7px 0; color:white;">Recherche d'arômes</h3>
							<input name="search_form_validate_5000" value="Lancer une recherche à 5000€" class="col-lg-12 btn btn-primary" type="submit">
							<input name="value" value="5000" class="col-lg-12 btn btn-primary" type="hidden">
						</div>
					</div>
				</div>
			</form>			

		</div>
	__TPL_social_services__
	</div>
</div>
<?
unset($_SESSION['error']);