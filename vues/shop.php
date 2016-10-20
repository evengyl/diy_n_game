<div class="col-xs-10 col-lg-12 col-without-padding col-without-radius content_game">
	__TPL_nav_game__
	<div class="col-lg-9" style="margin-top:1px;">

		<div class="col-xs-12 col-md-12">
			<div class="col-lg-12 explication pull-right">
				<h3 class="title">Explication : </h3>
				<span>
					Dans Diy_n_game, vous êtes arrivé au stade ou vos stock commence à ce remplire de produits ? donc vous devez les vendre !, chaque semaines des agents prennent le temps
					d'aller visiter les shop et vous rapporte un liste exhaustive de <?= Config::$nb_random_prod_shop ?> produits, car ces produits sont au top cette semaine, donc
					qui dit au top dit , plus chère à la vente et donc un bénéfice pour investire bien surpérieur à la normal!, accorder du temps a toute vos recherches car si vous ne vendez que des produits
					qui ne sont pas listé, vous vous renderez compte que vous ne progresserez que très peu et tomberez dans l'oubli du classement.
					Bonne chance à tous !!!
				</span>
			</div>
			<div class="col-lg-12 explication pull-right" style="margin-bottom:5px;">
				<center><img src="<?= Config::$path_public; ?>/images/shop.png"></center>
			</div>
			<div class="col-lg-12 explication pull-right" style="margin-bottom:5px;">
				<h3 class="title">Petit bonus représentatif: </h3>
				<span>
					Vérifié vos produits en stock avec vos date de péremption... si elle dépasse la date limite, adieu à la poubelle.
				</span>
			</div>
			<div class="col-lg-12 explication pull-right" style="margin-bottom:5px;">
				<span style="font-size:13px;">
					Nombre total de produits au top vendus cette semaine : <b style="color:yellow;"><?= $user->user_infos->produit_vendu_week; ?></b> (Remis à zéro à chaque changement de produits aléatoire).
				</span>
			</div>
			<div class="col-lg-12 explication pull-right" style="margin-bottom:5px;">
				<span style="font-size:13px;">
					Nombre total de produits global vendus : <b style="color:yellow;"><?= $user->user_infos->produit_vendu_total; ?></b> 
				</span>
			</div>
			<div class="col-lg-12 explication pull-right" style="margin-bottom:5px;">
				<span style="font-size:13px;">
					Tout les 1000 produits au top vendus, en fin de semaine vous receverez 3 points de ventes en bonus !!! ce qui équivaut à 200 produits au top vendus !!
				</span>
			</div>
			
			<form method="post" action="?page=shop">


				<div style="border:1px solid #FF7F00; padding-top:15px; margin-top:25px;" class="col-lg-12">
					<input value="> > Vendre < <" type="submit" class="btn btn-success col-lg-4 col-lg-offset-4" style="padding:10px 0 10px 0;">
					<button disabled class="btn btn-primary col-lg-4 col-lg-offset-4" style="padding:10px 0 10px 0;">Prix par produits au TOP : <?= Config::$sell_product_random; ?>&nbsp;&euro;</button>

					<h3 class='col-xs-12 title' style="margin-bottom:10px; font-size:18px;">
						Voici la liste après rapport de nos agents qui nous affirme que les clients payerons bien chère cette semaine pour ces <?= Config::$nb_random_prod_shop ?> produits (<b style='color:yellow;'><?= Config::$sell_product_random ?>&euro;</b> par produits vendu).
					</h3>
					<div style='font-size:18px; color:red' class="col-lg-12 form-group <?php echo (isset($_SESSION['error']))?'has-error':''; ?>">
						<?php echo (isset($_SESSION['error']))?'<label for="exampleInputPassword1">'.$_SESSION['error'].'</label><br>':''; ?>
					</div><?
					//je vais envoyer au formulaire la clé du tab contenant le produits, plus facile à manipuler
					$i = 0;
					if(!empty($tab_arome_random))
					{
						foreach($tab_arome_random as $row_arome)
						{?>
							<div class="col-sm-6 col-md-2">
								<div class="thumbnail col-lg-12" style="max-height:300px; padding-bottom:10px;">
									<img src="<?= Config::$path_public.$row_arome->img ?>" style="height:100px;" class="img-responsive" alt="Qualité de la recherche d'aromes 1">
									<div class="caption">

										<h3 style="font-size:11px; margin:7px 0 7px 0; color:white;">Nom de l'arome : <?= $row_arome->nom_aromes; ?></h3>
										<h3 style="font-size:11px; margin:7px 0 7px 0; color:white;">Base demandée : <br><b style="color:yellow;"><?= $row_arome->base_string; ?></b></h3>
										<h3 style="font-size:12px; margin:7px 0 7px 0; color:yellow;">Vous en disposez de : <?= $row_arome->nb_user_have; ?></h3>

										<div class="col-lg-12 col-without-padding">
											<input type="number" name="<?= $i ?>" max="<?= $row_arome->nb_user_have; ?>" min="0" value="0" class="col-lg-12">
										</div>
										
									</div>
								</div>
							</div><?
							$i++;
						}?>
						<input name='secure_shop_random' value="71414242" type="hidden"><?
					}?>
				</div>
			</form>

			<form method="post" action="?page=shop">
				<div style="border:1px solid #FF7F00; padding-top:15px; margin-top:25px;" class="col-lg-12">

					<input value="> > Vendre < <" type="submit" class="btn btn-success col-lg-4 col-lg-offset-4" style="padding:10px 0 10px 0;">
					<button disabled class="btn btn-primary col-lg-4 col-lg-offset-4" style="padding:10px 0 10px 0;">Prix des autres Produits : <?= Config::$sell_product_not_random; ?>&nbsp;&euro;</button>
					
					<h3 class='col-xs-12 title' style="margin-bottom:10px; font-size:18px;">
						Liste des produits qu'y ne sont pas d'acutalité mais dont vous pouvez liquider les stocks (<b style='color:yellow;'><?= Config::$sell_product_not_random ?>&euro;</b> par produits vendu).
					</h3>
					<div style='font-size:18px; color:red' class="col-lg-12 form-group <?php echo (isset($_SESSION['error']))?'has-error':''; ?>">
						<?php echo (isset($_SESSION['error']))?'<label for="exampleInputPassword1">'.$_SESSION['error'].'</label><br>':''; ?>
					</div><?
					//je vais envoyer au formulaire la clé du tab contenant le produits, plus facile à manipuler
					$i = 0;
					if(!empty($tab_arome_with_user_value))
					{
						foreach($tab_arome_with_user_value as $row_arome)
						{?>
							<div class="col-sm-6 col-md-2">
								<div class="thumbnail col-lg-12" style="max-height:300px; padding-bottom:10px;">
									<img src="<?= Config::$path_public.$row_arome->img ?>" style="height:100px;" class="img-responsive" alt="Qualité de la recherche d'aromes 1">
									<div class="caption">

										<h3 style="font-size:11px; margin:7px 0 7px 0; color:white;">Nom de l'arome : <?= $row_arome->nom; ?></h3>
										<h3 style="font-size:11px; margin:7px 0 7px 0; color:white;">Base en : <br><b style="color:yellow;"><?= $row_arome->base; ?></b></h3>
										<h3 style="font-size:12px; margin:7px 0 7px 0; color:yellow;">Vous en disposez de : <?= $row_arome->nb; ?></h3>
										<h3 style="font-size:12px; margin:7px 0 7px 0; color:red;">Périme dans  : <br><?= $row_arome->date_peremption_to_rest; ?></h3>

										<div class="col-lg-12 col-without-padding">
											<input type="number" name="<?= $i ?>" max="<?= $row_arome->nb; ?>" min="0" value="0" class="col-lg-12">
										</div>
										
									</div>
								</div>
							</div><?
							$i++;
						}?>
						<input name='secure_shop' value="71414242" type="hidden"><?
					}else
					{?>
						<h3 class='col-xs-12 title' style="margin-bottom:10px; font-size:18px;">
							Vous n'avez pas de sotck.
						</h3><?

					}?>
				</div>
			</form>
		</div>
	</div>
</div>
<?
unset($_SESSION['error']);