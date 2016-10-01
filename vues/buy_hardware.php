<div class="col-xs-10 col-lg-12 col-without-padding col-without-radius content_game">
	__TPL_nav_game__
	<div class="col-lg-9" style="margin-top:1px;">

		<div class="col-xs-12 col-md-12">
			<div class="col-lg-12 explication pull-right">
				<h3 class="title">Explication : </h3>
				<span>Dans Diy_n_game, Pour créer et vous aidez à conçevoir toujours plus de produits, il faut faudra vous procurez un certain nombre de choses,
					des frigos pour stocker vos produits, des pipettes pour réaliser vos mélanges et remplissage de produits, et des malaxeur pour bien mélanger les produits.<br>
				C'est ici qu'il faut faire ses petites emplètes pour pouvoir concevoir vos produits finaux.</span>
			</div>
			<div style='font-size:18px; color:red' class="col-lg-12 form-group <?php echo (isset($_SESSION['error']))?'has-error':''; ?>">
				<?php echo (isset($_SESSION['error']))?'<label for="exampleInputPassword1">'.$_SESSION['error'].'</label>':''; ?>
			</div>

			<h3 class='col-xs-12 title' style="margin-bottom:15px; border-bottom:1px solid #FF7F00; font-size:18px; padding-top:25px;">
				Les frigos servent à stocker les produits finis, <?= Config::$nb_product_per_frigo; ?> produits par frigo, Si vous ne possédez pas assez de frigo, vous ne pourrez plus produire de produits
			</h3>
			<h3 class='col-xs-12 title' style="margin-bottom:15px; border-bottom:1px solid #FF7F00; font-size:18px; padding-top:25px;">
				Nb de frigos actif  : <strong style="color:#31DE44;"><?= $user->hardware->frigo; ?></strong>
			</h3>

			<form method="post" action="?page=buy_hardware">
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
						<img style="height:150px;" src="<?= Config::$path_public."/images/frigo.png" ?>" class="img-responsive" alt="Frigo">
						<div class="caption">
							<h3 style="font-size:14px; margin:7px 0 7px 0; color:white;">Coût d'un frigo : <strong style="color:#31DE44;"><?= Config::$price_frigo; ?>€</strong></h3>
							<input name="buy_frigo_1" value="Acheter un Frigo" class="col-lg-12 btn btn-primary" type="submit">
						</div>
					</div>
				</div>
			</form>

			<form method="post" action="?page=buy_hardware">
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
						<img style="height:150px;" src="<?= Config::$path_public."/images/frigo_10.png" ?>" class="img-responsive" alt="Frigo">
						<div class="caption">
							<h3 style="font-size:14px; margin:7px 0 7px 0; color:white;">Coût de 10 frigo : <strong style="color:#31DE44;"><?= Config::$price_frigo_10; ?>€</strong></h3>
							<input name="buy_frigo_10" value="Acheter 10 Frigos" class="col-lg-12 btn btn-primary" type="submit">
						</div>
					</div>
				</div>
			</form>

			<form method="post" action="?page=buy_hardware">
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
						<img style="height:150px;" src="<?= Config::$path_public."/images/frigo_100.png" ?>" class="img-responsive" alt="Frigo">
						<div class="caption">
							<h3 style="font-size:14px; margin:7px 0 7px 0; color:white;">Coût de 100 frigo : <strong style="color:#31DE44;"><?= Config::$price_frigo_100; ?>€</strong></h3>
							<input name="buy_frigo_100" value="Acheter 100 Frigos" class="col-lg-12 btn btn-primary" type="submit">
						</div>
					</div>
				</div>
			</form>

			<form method="post" action="?page=buy_hardware">
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
						<img style="height:150px;" src="<?= Config::$path_public."/images/frigo_1000.png" ?>" class="img-responsive" alt="Frigo">
						<div class="caption">
							<h3 style="font-size:14px; margin:7px 0 7px 0; color:white;">Coût de 1000 frigo : <strong style="color:#31DE44;"><?= Config::$price_frigo_1000; ?>€</strong></h3>
							<input name="buy_frigo_1000" value="Acheter 1000 Frigos" class="col-lg-12 btn btn-primary" type="submit">
						</div>
					</div>
				</div>
			</form>

			<h3 class='col-xs-12 title' style="margin-bottom:15px; border-bottom:1px solid #FF7F00; font-size:18px; padding-top:25px;">
				Les frigos servent à stocker les produits finis, <?= Config::$nb_product_per_frigo; ?> produits par frigo, Si vous ne possédez pas assez de frigo, vous ne pourrez plus produire de produits
			</h3>

			<form method="post" action="?page=buy_hardware">
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
						<img style="height:150px;" src="<?= Config::$path_public."/images/pipette_10.png" ?>" class="img-responsive" alt="pipette">
						<div class="caption">
							<h3 style="font-size:14px; margin:7px 0 7px 0; color:white;">Coût de 10 pipettes : <strong style="color:#31DE44;"><?= Config::$price_pipette_10; ?>€</strong></h3>
							<input name="buy_pipette_10" value="Acheter 10 pipettes" class="col-lg-12 btn btn-primary" type="submit">
						</div>
					</div>
				</div>
			</form>

			<form method="post" action="?page=buy_hardware">
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
						<img style="height:150px;" src="<?= Config::$path_public."/images/pipette_100.png" ?>" class="img-responsive" alt="pipette">
						<div class="caption">
							<h3 style="font-size:14px; margin:7px 0 7px 0; color:white;">Coût de 100 pipettes : <strong style="color:#31DE44;"><?= Config::$price_pipette_100; ?>€</strong></h3>
							<input name="buy_pipette_100" value="Acheter 100 pipettes" class="col-lg-12 btn btn-primary" type="submit">
						</div>
					</div>
				</div>
			</form>

			<form method="post" action="?page=buy_hardware">
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
						<img style="height:150px;" src="<?= Config::$path_public."/images/pipette_1000.png" ?>" class="img-responsive" alt="pipette">
						<div class="caption">
							<h3 style="font-size:14px; margin:7px 0 7px 0; color:white;">Coût de 1000 pipettes : <strong style="color:#31DE44;"><?= Config::$price_pipette_1000; ?>€</strong></h3>
							<input name="buy_pipette_1000" value="Acheter 1000 pipettes" class="col-lg-12 btn btn-primary" type="submit">
						</div>
					</div>
				</div>
			</form>

			<form method="post" action="?page=buy_hardware">
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
						<img style="height:150px;" src="<?= Config::$path_public."/images/pipette_10000.png" ?>" class="img-responsive" alt="pipette">
						<div class="caption">
							<h3 style="font-size:14px; margin:7px 0 7px 0; color:white;">Coût de 10000 pipettes : <strong style="color:#31DE44;"><?= Config::$price_pipette_10000; ?>€</strong></h3>
							<input name="buy_pipette_10000" value="Acheter 10000 pipettes" class="col-lg-12 btn btn-primary" type="submit">
						</div>
					</div>
				</div>
			</form>



			<h3 class='col-xs-12 title' style="margin-bottom:15px; border-bottom:1px solid #FF7F00; font-size:18px; padding-top:25px;">
				Les flacons vides doivent être acheté avant le lancement du remplissage des produits, stockage illimité.
			</h3>

			<form method="post" action="?page=buy_hardware">
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
						<img style="height:150px;" src="<?= Config::$path_public."/images/flacon_10.png" ?>" class="img-responsive" alt="pipette">
						<div class="caption">
							<h3 style="font-size:14px; margin:7px 0 7px 0; color:white;">Coût de 10 Flacons : <strong style="color:#31DE44;"><?= Config::$price_flacon_10; ?>€</strong></h3>
							<input name="buy_flacon_10" value="Acheter 10 Flacons" class="col-lg-12 btn btn-primary" type="submit">
						</div>
					</div>
				</div>
			</form>

			<form method="post" action="?page=buy_hardware">
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
						<img style="height:150px;" src="<?= Config::$path_public."/images/flacon_100.png" ?>" class="img-responsive" alt="pipette">
						<div class="caption">
							<h3 style="font-size:14px; margin:7px 0 7px 0; color:white;">Coût de 100 Flacons : <strong style="color:#31DE44;"><?= Config::$price_flacon_100; ?>€</strong></h3>
							<input name="buy_flacon_100" value="Acheter 100 Flacons" class="col-lg-12 btn btn-primary" type="submit">
						</div>
					</div>
				</div>
			</form>

			<form method="post" action="?page=buy_hardware">
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
						<img style="height:150px;" src="<?= Config::$path_public."/images/flacon_1000.png" ?>" class="img-responsive" alt="pipette">
						<div class="caption">
							<h3 style="font-size:14px; margin:7px 0 7px 0; color:white;">Coût de 1000 Flacons : <strong style="color:#31DE44;"><?= Config::$price_flacon_1000; ?>€</strong></h3>
							<input name="buy_flacon_1000" value="Acheter 1000 Flacons" class="col-lg-12 btn btn-primary" type="submit">
						</div>
					</div>
				</div>
			</form>

			<form method="post" action="?page=buy_hardware">
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
						<img style="height:150px;" src="<?= Config::$path_public."/images/flacon_10000.png" ?>" class="img-responsive" alt="pipette">
						<div class="caption">
							<h3 style="font-size:14px; margin:7px 0 7px 0; color:white;">Coût de 10000 Flacons : <strong style="color:#31DE44;"><?= Config::$price_flacon_10000; ?>€</strong></h3>
							<input name="buy_flacon_10000" value="Acheter 10000 Flacons" class="col-lg-12 btn btn-primary" type="submit">
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?
unset($_SESSION['error']);