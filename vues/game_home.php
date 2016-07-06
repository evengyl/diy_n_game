<h2 class='col-xs-12 title_page_game'>
	Listes des batiments de production, pour une vues plus précises, passer par le menu de gauche
</h2>
<div class="col-xs-12 col-without-padding col-without-radius content_game">
	__TPL_nav__

	<div class="col-xs-12 col-md-9">
		<div class="col-lg-12" style="margin-bottom:15px;">
			<h3 class='col-xs-12 title' style="border-bottom:1px solid #FF7F00; font-size:18px; padding-top:25px;">
				Listes des batiments de production de ressources brut.
			</h3>	
			<div class="col-lg-12" style="background:#232D3B; margin-top:15px;">
				<ul class="col-md-6 col-lg-6 grid cs-style-4">
					<center><li>
						<figure>
							<div><img src="<?= Config::$path_public; ?>/images/plante_icon.png" alt="img04"></div>
							<figcaption>
								<h3 style="font-size:20px;">Culture VG</h3>
								<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Level : </b><br><?= $user->champ_glycerine->level; ?></li>
								<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Production /h : </b><br><?= $user->champ_glycerine->production; ?> /h</li>
								<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Prix next level : </b><br><?= $user->champ_glycerine->prix; ?>€</li>
								<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Temps de construction : </b></br><?= $user->champ_glycerine->time_real_construct; ?></li>
							</figcaption>
						</figure>
					</li></center>
				</ul>

				<ul class="col-md-6 col-lg-6 grid cs-style-4">
					<center><li>
						<figure>
							<div><img src="<?= Config::$path_public; ?>/images/usine_pg.png" alt="img04"></div>
							<figcaption>
								<h3 style="font-size:20px;">Usines PG</h3>
								<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Level : </b><br><?= $user->usine_propylene->level; ?></li>
								<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Production /h : </b><br><?= $user->usine_propylene->production; ?> /h</li>
								<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Prix next level : </b><br><?= $user->usine_propylene->prix; ?>€</li>
								<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Temps de construction : </b></br><?= $user->usine_propylene->time_real_construct; ?></li>
							</figcaption>
						</figure>
					</li></center>
				</ul>
			</div>
		</div>

		<div class="col-lg-12" style="margin-bottom:15px;">
			<h3 class='col-xs-12 title' style="border-bottom:1px solid #FF7F00; font-size:18px; padding-top:25px;">
				Listes des batiments de production de ressources synthétisée.
			</h3>				
			<div class="col-lg-12" style="background:#232D3B; margin-top:15px;">
				<ul class="col-md-6 col-lg-12 grid cs-style-4">
					<center><li>
						<figure>
							<div><img src="<?= Config::$path_public; ?>/images/labos_bases.png" alt="img04"></div>
							<figcaption>
								<h3 style="font-size:20px;">Labos Des bases</h3>
								<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Level : </b><br><?=$user->labos_bases->level ; ?></li>
								<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Pourcentage d'éco : </b><br><?=$user->labos_bases->pourcent_down ; ?>%</li>
								<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Prix next level : </b><br><?=$user->labos_bases->prix ; ?>€</li>
								<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Temps de construction : </b></br><?= $user->labos_bases->time_real_construct; ?></li>
							</figcaption>
						</figure>
					</li></center>
				</ul>
			</div>
		</div>




		<h3 class='col-xs-12 title' style="margin-bottom:15px; border-bottom:1px solid #FF7F00; font-size:18px; padding-top:25px;">
			Recherche et Développement.
		</h3>
		<div style='font-size:18px; color:red' class="col-lg-12 form-group <?php echo (isset($_SESSION['error']) OR isset($_SESSION['error_bases_down']))?'has-error':''; ?>">
				<?php echo (isset($_SESSION['error']))?'<label for="exampleInputPassword1">'.$_SESSION['error'].'</label>':''; ?>
		</div>

		<div class="col-sm-6 col-md-12" >
			<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
				<div class="col-lg-12 pull-right ressource_now">
					<h3 class="title">&nbsp;Batiments en cours de construction :</h3>
					<table class="table table-stripped table-hover" style="color:white;">
						<tr class="success" style="color:black;">
							<th>Nom du batiments<span style="color:black;" class="glyphicon glyphicon-arrow-down"></span></th>
							<th>Fini dans<span style="color:black;" class="glyphicon glyphicon-arrow-down"></span></th>
						</tr><?
						foreach($user->construction as $row_search)
						{?>
							<tr class="success" style="color:black;">
								<td style="background:#D0E9C6;"><b><?= $row_search->real_name_batiments; ?></td>
								<td style="background:#D0E9C6;"><b><?= $row_search->time_finish_real; ?></td>
							</tr>
								<?
						}?>
					</table>
				</div>
			</div>
		</div>

		<div class="col-sm-6 col-md-12" >
			<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
				<div class="col-lg-12 pull-right ressource_now">
					<h3 class="title">&nbsp;Recherches d'arômes en cours :</h3>
					<table class="table table-stripped table-hover" style="color:white;">
						<tr class="success" style="color:black;">
							<th>Valeur de la recherche <span style="color:black;" class="glyphicon glyphicon-arrow-down"></span></th>
							<th>Pourcentage de réussite <span style="color:black;" class="glyphicon glyphicon-arrow-down"></span></th>
							<th>temps restant <span style="color:black;" class="glyphicon glyphicon-arrow-down"></span></th>
						</tr><?
						foreach($user->search_arome as $row_search)
						{?>

							<tr class="success" style="color:black;">
								<td style="background:#D0E9C6;"><b><?= $row_search->price_value_search; ?> &euro;</td>
								<td style="background:#D0E9C6;"><b><?= $row_search->pourcent_win; ?> %</td>
								<td style="background:#D0E9C6;"><b><?= $row_search->real_time_finish; ?></td>
							</tr><?
						}?>
					</table>
				</div>
			</div>
		</div>


		<div class="col-sm-6 col-md-12" >
			<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
				<div class="col-lg-12 pull-right ressource_now">
					<h3 class="title">&nbsp;Recherches d'upgrade en cours :</h3>
					<table class="table table-stripped table-hover" style="color:white;">
						<tr class="success" style="color:black;">
							<th>Valeur de la recherche <span style="color:black;" class="glyphicon glyphicon-arrow-down"></span></th>
							<th>Pourcentage de réussite <span style="color:black;" class="glyphicon glyphicon-arrow-down"></span></th>
						</tr>
						<tr class="success" style="color:black;">
							<td style="background:#D0E9C6;"><b><?= (isset($user->update->{0}))? $user->update->{0}->real_name_search :''; ?></td>
							<td style="background:#D0E9C6;"><b><?= (isset($user->update->{0}))? date('d/m/Y', $user->update->{0}->time_finish)." &agrave; ".date('H:i:s', $user->update->{0}->time_finish) :''; ?></b></td>
						</tr>
					</table>
				</div>
			</div>
		</div>


	</div>
</div>


<div class="col-xs-12 col-without-padding">
	<strong class='col-xs-12 title' style="text-align:center; font-size:16px; border-bottom:1px solid #EF4224; ">
		Vos ressource sont mise à jours toutes les cinq min, pour ne pas surcharger le serveurs de demande.
		Vos batiments eux, le sont en permanence.
	</strong>
</div>

<div class="col-xs-12 col-without-padding" style="margin-bottom:49px;">
	<strong class='col-xs-12 title' style="text-align:center; font-size:16px; border-bottom:1px solid #EF4224; ">
		Cette page vous permet d'avoir une vue d'ensemble sur vos ressources et comment ce gere votre affaire.
	</strong>
</div>

