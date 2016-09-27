<div class="col-xs-10 col-lg-12 col-without-padding col-without-radius content_game">
	__TPL_nav_game__
	<div class="col-lg-9" style="margin-top:1px;">

		<h3 class='col-xs-12 title' style="border-bottom:1px solid #FF7F00; font-size:18px; padding-top:10px; margin-bottom:10px;">
			Convertir toutes les ressources en base primaire!.
		</h3>

		<div class="col-lg-12" style="margin-bottom:10px;">
			<div class="col-lg-4">
				<img class="img-responsive" src="<?= Config::$path_public; ?>/images/syntheses.png">
			</div>
			<div class="col-lg-8 explication pull-right">

				<h3 class="title">Explication : </h3>
				<span>Dans Diy_n_game, les synthétiseur de bases vous permettrons en un clic de convertir tout les plantes ou propylène brut, en bases presque vapable, sous format de littre et 
					en format brut, elle vous permettrons juste en dessous de créer vos propre base vapable.</span><br>
				<span>Creer ces propres bases vapable juste en dessous vous permettras de remplir vos stock de bases prète à être mélangée avec les arômes
					découvert dans les recherches d'arômes, n'oublions pas qu'il s'agit de littre, remplir des produits (flacons) vous permettras selon
					l'offre et la demande, de vendre vos stock de prouits, attention il ont une date de péremption.</span>
			</div>
		</div>

		<form method="post" action='#'>
			<div class="col-lg-6">
				<input type="hidden" name="to_convert" value="vg">
				<input class="btn btn-primary col-lg-12" type="submit" name="convert_all_in_littre" value="Creer tout le VG possible (Gratuit)">
			</div>
		</form>
		<form method="post" action='#'>
			<div class="col-lg-6">
				<input type="hidden" name="to_convert" value="pg">
				<input class="btn btn-primary col-lg-12" type="submit" name="convert_all_in_littre" value="Creer tout le PG possible (Gratuit)">
			</div>
		</form>

		<h3 class='col-xs-12 title' style="border-bottom:1px solid #FF7F00; font-size:18px; padding-top:25px;">
			Production et synthèse des bases dans différent pourcentage de contentration en VG et PG.
		</h3>
		<div style='font-size:18px; color:red' class="col-lg-12 form-group <?php echo (isset($_SESSION['error']) OR isset($_SESSION['error_bases_down']) OR isset($_SESSION['little_infos']))?'has-error':''; ?>">
				<?php echo (isset($_SESSION['error']))?'<label for="exampleInputPassword1">'.$_SESSION['error'].'</label><br>':''; ?>
				<?php echo (isset($_SESSION['error_bases_down']))?'<label for="exampleInputPassword1">'.$_SESSION['error_bases_down'].'</label><br>':''; ?>
				<?php echo (isset($_SESSION['little_infos']))?'<label style="font-size:14px; font-weight:normal;" for="exampleInputPassword1">'.$_SESSION['little_infos'].'</label><br>':''; ?>
		</div>

		<table class="table table-stripped table-hover" style="color:white;">
			<tr class="success" style="color:black;">
				<th>Quantité de ressource pour un littre SANS améliorations (Labos bases) :</th><td><b><?= Config::$nb_plantes_for_littre_at_start_game_labos_0 ?> VG et <?= Config::$nb_propylene_for_littre_at_start_game_labos_0 ?> PG</td>
			</tr>
			<tr class="success" style="color:black;">
				<th>Quantité de ressource pour un littre AVEC vos améliorations (Labos bases) :</th><td><b><?= Config::$nb_plantes_for_littre ?> VG et <?= Config::$nb_propylene_for_littre ?> PG</td>
			</tr>
		</table>	

		<form method="post" action="#">
			<div class="col-lg-12" style="background:#232D3B; margin-top:15px; margin-bottom:50px;">
				<ul class="col-md-6 col-lg-6 grid cs-style-4">
					<center><li>
						<figure>
							<div><img src="<?= Config::$path_public; ?>/images/bases2080.jpg" alt="img04"></div>
							<figcaption>
								<h3 style="font-size:14px;">Bases :<br> 20% / 80%</h3>
								<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Quantité en stock : <br><?= $user->bases->bases_2080 ?> </b></li>
								<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Prix brut : <br>450€</b></li>
								<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Prix avec réduction due au recherche : <br><?= Config::$prix_vingt_quatre_vingt ?>€</b></li>
								<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Nombre de synthèse possible : </br><p style="text-align:center;"><?= $nb_to_create[2080]; ?></p></b></li>
								<select name="2080">
									<?php
									$i = 0;
									while($i <= $nb_to_create[2080])
									{
										echo '<option value="'.$i.'">'.$i.'</option>'; 
										$i++;
									}
									?>
								</select>
							</figcaption>
						</figure>
					</li></center>
				</ul>

				<ul class="col-md-6 col-lg-6 grid cs-style-4">
					<center><li>
						<figure>
							<div><img src="<?= Config::$path_public; ?>/images/bases5050.jpg" alt="img04"></div>
							<figcaption>
								<h3 style="font-size:14px;">Bases :<br> 50% / 50%</h3>
								<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Quantité en stock : <br><?= $user->bases->bases_5050 ?> </b></li>
								<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Prix brut : <br>400€</b></li>
								<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Prix avec réduction due au recherche : <br><?= Config::$prix_cinquante_cinquante ?>€</b></li>
								<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Nombre de synthèse possible : </br><p style="text-align:center;"><?= $nb_to_create[5050]; ?></p></b></li>
								<select name="5050">
									<?php
									$i = 0;
									while($i <= $nb_to_create[5050])
									{
										echo '<option value="'.$i.'">'.$i.'</option>'; 
										$i++;
									}
									?>
								</select>
							</figcaption>
						</figure>
					</li></center>
				</ul>

				<ul class="col-md-6 col-lg-6 grid cs-style-4">
					<center><li>
						<figure>
							<div><img src="<?= Config::$path_public; ?>/images/bases8020.jpg" alt="img04"></div>
							<figcaption>
								<h3 style="font-size:14px;">Bases :<br> 80% / 20%</h3>
								<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Quantité en stock : <br><?= $user->bases->bases_8020 ?> </b></li>
								<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Prix brut : <br>370€</b></li>
								<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Prix avec réduction due au recherche :<br> <?= Config::$prix_quatre_vingt_vingt ?>€</b></li>
								<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Nb de synthèse possible : </br><p style="text-align:center;"><?= $nb_to_create[8020]; ?></p></b></li>
								<select name="8020">
									<?php
									$i = 0;
									while($i <= $nb_to_create[8020])
									{
										echo '<option value="'.$i.'">'.$i.'</option>'; 
										$i++;
									}
									?>
								</select>
							</figcaption>
						</figure>
					</li></center>
				</ul>

				<ul class="col-md-6 col-lg-6 grid cs-style-4">
					<center><li>
						<figure>
							<div><img src="<?= Config::$path_public; ?>/images/bases1000.jpg" alt="img04"></div>
							<figcaption>
								<h3 style="font-size:14px;">Bases :<br> 100% / 0%</h3>
								<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Quantité en stock : <br><?= $user->bases->bases_1000 ?> </b></li>
								<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Prix brut : <br>350€</b><br></li>
								<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Prix avec réduction due au recherche : <br><?= Config::$prix_cent ?>€</b></li>
								<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Nombre de synthèse possible : </br><p style="text-align:center;"><?= $nb_to_create[1000]; ?></p></b></li>
								<select name="1000">
									<?php
									$i = 0;
									while($i <= $nb_to_create[1000])
									{
										echo '<option value="'.$i.'">'.$i.'</option>'; 
										$i++;
									}
									?>
								</select>
															
							</figcaption>
						</figure>
					</li></center>
				</ul>
				<input class="btn btn-primary col-lg-12" type="submit" name="create_bases" value="Creer">
			</div>					
		</form>
	</div>
</div>
<?
unset($_SESSION['error']);
unset($_SESSION['error_bases_down']);
unset($_SESSION['little_infos']);
	