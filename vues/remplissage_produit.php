<div class="col-xs-10 col-lg-12 col-without-padding col-without-radius content_game">
	__TPL_nav_game__
	<div class="col-lg-9" style="margin-top:1px;">

		<div class="col-xs-12 col-md-12">
			<div class="col-lg-12 explication pull-right">
				<h3 class="title">Explication : </h3>
				<span>Dans Diy_n_game, Pour créer et vous aidez à conçevoir toujours plus de produits, des personnes sont la pour rechercher des améliorations.
					Celles-ci permette de payer moins chère ou que votre coup en ressources soit réduits, ainsi que les temps des recherches des arômes par exemple ect...</span>
			</div>
			<div style='font-size:13px; margin-bottom:0; color:red' class="col-lg-12 form-group <?php echo (isset($_SESSION['error_0']))?'has-error':''; ?>">
				<?php echo (isset($_SESSION['error_0']))?'<label for="exampleInputPassword1">'.$_SESSION['error_0'].'</label>':''; ?>
			</div>
			<div style='font-size:13px; margin-bottom:0; color:red' class="col-lg-12 form-group <?php echo (isset($_SESSION['error_1']))?'has-error':''; ?>">
				<?php echo (isset($_SESSION['error_1']))?'<label for="exampleInputPassword1">'.$_SESSION['error_1'].'</label>':''; ?>
			</div>
			<div style='font-size:13px; margin-bottom:0; color:red' class="col-lg-12 form-group <?php echo (isset($_SESSION['error_2']))?'has-error':''; ?>">
				<?php echo (isset($_SESSION['error_2']))?'<label for="exampleInputPassword1">'.$_SESSION['error_2'].'</label>':''; ?>
			</div>
			<div style='font-size:13px; margin-bottom:0; color:green' class="col-lg-12 form-group <?php echo (isset($_SESSION['error_3']))?'has-error':''; ?>">
				<?php echo (isset($_SESSION['error_3']))?'<label for="exampleInputPassword1">'.$_SESSION['error_3'].'</label>':''; ?>
			</div>

			<div style='font-size:15px; color:green' class="col-lg-12 form-group">
				<label for="exampleInputPassword1">Après calcul des restrictions vous pouvez créer +- : <strong style="font-size:20px;"><?= max($array_nb_product_creable); ?></strong>
				 Produits (tout dépends la bases utilisée) et les autres ressources nécessaires.</label>
			</div>


			<div style="border:1px solid #FF7F00; padding-top:15px; margin-top:25px;" class="col-lg-12">

				<h3 class='col-xs-12 title' style="margin-bottom:10px; font-size:18px;">
					Liste des arômes pour le remplissage des produits finaux.
				</h3>
				<form method="post" action="?page=remplissage_produit"><?
					if($tab_final_arome_acquis_traiter != "")
					{
						foreach($tab_final_arome_acquis_traiter as $brand => $row_brand_arome)
						{?>
							
							<h3 class='col-xs-12 title' style="margin-bottom:10px; font-size:18px;">
								<?= $brand; ?>
							</h3><?

							foreach($row_brand_arome as $row_arome)
							{?>
								<div class="col-sm-6 col-md-4 col-lg-3">
									<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
										<img src="<?= Config::$path_public.$row_arome->img ?>" style="height:130px;" class="img-responsive" alt="Qualité de la recherche d'aromes 1">
										<div class="caption">
											<h3 style="font-size:16px; margin:7px 0 7px 0; color:white;">Nom de l'arome : <br>
												<i style="color:green;"><?= $row_arome->nom; ?></i></h3>

											<div class="col-lg-6" style="margin-bottom:10px; padding-left:5px; padding-right:5px;">
												<button style="font-size:11px;" class="col-lg-12 btn btn-primary" disabled>20% VG / 80% PG<br>NB poss. : <i style="color:yellow;"><?= $array_nb_product_creable['2080']; ?></i></button>
												<input type="number" name="quantity_2080_id_<?= $row_arome->id; ?>" max="<?= $array_nb_product_creable['2080']; ?>" min="0" value="0" class="col-lg-12">
											</div>
											<div class="col-lg-6" style="margin-bottom:10px; padding-left:5px; padding-right:5px;">
												<button style="font-size:11px;" class="col-lg-12 btn btn-primary" disabled>50% VG / 50% PG<br>NB poss. : <i style="color:yellow;"><?= $array_nb_product_creable['5050']; ?></i></button>
												<input type="number" name="quantity_5050_id_<?= $row_arome->id; ?>" max="<?= $array_nb_product_creable['5050']; ?>" min="0" value="0" class="col-lg-12">
											</div>
											<div class="col-lg-6" style="margin-bottom:10px; padding-left:5px; padding-right:5px;">
												<button style="font-size:11px;" class="col-lg-12 btn btn-primary" disabled>80% VG / 20% PG<br>NB poss. : <i style="color:yellow;"><?= $array_nb_product_creable['8020']; ?></i></button>
												<input type="number" name="quantity_8020_id_<?= $row_arome->id; ?>" max="<?= $array_nb_product_creable['8020']; ?>" min="0" value="0" class="col-lg-12">
											</div>
											<div class="col-lg-6" style="margin-bottom:10px; padding-left:5px; padding-right:5px;">
												<button style="font-size:11px;" class="col-lg-12 btn btn-primary" disabled>100% VG<br>NB poss. : <i style="color:yellow;"><?= $array_nb_product_creable['1000']; ?></i></button>
												<input type="number" name="quantity_1000_id_<?= $row_arome->id; ?>" max="<?= $array_nb_product_creable['1000']; ?>" min="0" value="0" class="col-lg-12">
											</div>
										</div>
									</div>
								</div><?
							}
						}
					}
					else
					{?>
						<h3 class='col-xs-12 title' style="margin-bottom:10px; font-size:15px; color:yellow;">
							Vous n'avez encore aucun Arômes disponible pour remplir des flacon.
						</h3><?
					}?>

					<input name='secure' value="71414242" type="hidden">
					<input value="> > Créer < <" type="submit" class="btn btn-success col-lg-2" style="z-index:10000; position:fixed; top:500px; right:20px; padding:10px 0 10px 0;">
					<button disabled class="btn btn-primary col-lg-2" style="z-index:10000; position:fixed; top:543px; right:20px; padding:10px 0 10px 0;">Prix par produits : <?= Config::$price_for_un_product; ?>&nbsp;&euro;</button>
				</form>
			</div>
		</div>
	</div>
</div>
<?
unset($_SESSION['error']);
unset($_SESSION['error_0']);
unset($_SESSION['error_1']);
unset($_SESSION['error_2']);
unset($_SESSION['error_3']);