<div class="col-xs-10 col-lg-12 col-without-padding col-without-radius content_game">
	__TPL_nav_game__
	<div class="col-lg-8" style="margin-top:1px;">

		<div class="col-xs-12 col-md-12">
			<div class="col-lg-12 explication pull-right">
				<h3 class="title">Explication : </h3>
				<span>Dans Diy_n_game, Pour créer et vous aidez à conçevoir toujours plus de produits, des personnes sont la pour rechercher des améliorations.
					Celles-ci permette de payer moins chère ou que votre coup en ressources soit réduits, ainsi que les temps des recherches des arômes par exemple ect...</span>
			</div>

			<div style="border:1px solid #FF7F00; padding-top:15px; margin-top:25px;" class="col-lg-12">

				<h3 class='col-xs-12 title' style="margin-bottom:10px; font-size:18px;">
					Liste des arômes pour le remplissage des produits finaux.
				</h3>
				<form method="post" action="?page=remplissage_produit"><?

					foreach($tab_final_arome_acquis_traiter as $brand => $row_brand_arome)
					{?>
						
						<h3 class='col-xs-12 title' style="margin-bottom:10px; font-size:18px;">
							<?= $brand; ?>
						</h3><?

						foreach($row_brand_arome as $row_arome)
						{?>
								<div class="col-sm-6 col-md-4">
									<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
										<img src="<?= Config::$path_public.$row_arome->img ?>" style="height:130px;" class="img-responsive" alt="Qualité de la recherche d'aromes 1">
										<div class="caption">
											<h3 style="font-size:18px; margin:7px 0 7px 0; color:white;">Nom : <?= $row_arome->nom; ?></h3>

											<div class="col-lg-12">
												<button style="margin-top:15px;" class="col-lg-12 btn btn-primary" disabled>Base : <?= $row_arome->base; ?></button>
											</div>
											<div class="col-lg-12">
												<button style="margin-top:15px;" class="col-lg-12 btn btn-primary" disabled>Nombre : <?= $row_arome->nb; ?></button>
											</div>
										</div>
									</div>
								</div><?
						}

					}?>
				</form>
			</div>
		</div>
	__TPL_social_services__
	</div>
</div>
<?
unset($_SESSION['error']);