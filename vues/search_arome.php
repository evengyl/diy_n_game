<div class="col-xs-10 col-lg-12 col-without-padding col-without-radius content_game">
	__TPL_nav_game__
	<div class="col-lg-9" style="margin-top:1px;">

		<div class="col-xs-12 col-md-12">
			<div class="col-lg-12 explication pull-right">
				<h3 class="title">Explication : </h3>
				<span>Dans Diy_n_game, Les parfumeurs ne vous laisserons pas leurs recette aussi facilement, en plus de payer pour chaque recherche d'arômes vous aurez seulement un pourcentage
					défini de change de trouver des aromes en fonction de l'argent que vous placerez dans les recherche.</span>
			</div><?
			
			if($arome_win_for_tpl != "")
			{?>
				<h3 class='col-xs-12 title' style=" border-bottom:1px solid #FF7F00; font-size:18px; padding-top:15px;">
					Arômes découvert grâce à la recherche
				</h3>

				<div class="col-lg-12" style="background:#232D3B;"><?
					
					foreach($arome_win_for_tpl as $key => $value)
					{
					 	?><h3 class='col-xs-12 title' style="border-bottom:1px solid #FF7F00; font-size:18px; margin-bottom:15px; padding-top:10px;">Marques : <?= $key; ?></h3><?
					 	foreach($value as $row_arome)
					 	{?>
							<div class="col-xs-6 col-md-2">
								<a class="thumbnail">
									<center>
										<img style="height:100px;" class="img-responsive" src="<?= Config::$path_public.$row_arome->img ?>">
										<h5 style="color:white;">Arôme n° <?= $row_arome->id; ?></h5>
										<h5 style="color:white;"><?= $row_arome->nom; ?></h5>
							        	<span style="color:green;" class="glyphicon glyphicon-ok"></span>
							        	<span style="color:red;" class="glyphicon glyphicon-remove"></span>
							        </center>
							    </a>
							</div><?
					 	}
					}?>

				</div><?
			}?>


			<h3 class='col-xs-12 title' style="margin-bottom:15px; border-bottom:1px solid #FF7F00; font-size:18px; padding-top:25px;">
				<?= $string_arome_string_nb ?>
			</h3>
			<div style='font-size:18px; color:red' class="col-lg-12 form-group <?php echo (isset($_SESSION['error']) OR isset($_SESSION['error_bases_down']))?'has-error':''; ?>">
					<?php echo (isset($_SESSION['error']))?'<label for="exampleInputPassword1">'.$_SESSION['error'].'</label>':''; ?>
			</div>

			<div class="col-sm-6 col-md-12" >
				<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
					<div class="col-lg-12 pull-right ressource_now">
						<h3 class="title">&nbsp;Recherches en cours :</h3>
						<table class="table table-stripped table-hover" style="color:white;">
							<tr class="success" style="color:black;">
								<th>Valeur de la recherche <span style="color:black;" class="glyphicon glyphicon-arrow-down"></span></th>
								<th>Pourcentage de réussite <span style="color:black;" class="glyphicon glyphicon-arrow-down"></span></th>
								<th>temps restant <span style="color:black;" class="glyphicon glyphicon-arrow-down"></span></th>
							</tr><?
							foreach($user->search_arome as $row_search)
							{?>

								<tr class="success" style="color:black;">
									<td><b><?= $row_search->price_value_search; ?> &euro;</td>
									<td><b><?= $row_search->pourcent_win; ?> %</td>
									<td><b><?= $row_search->real_time_finish; ?></td>
								</tr>
									<?
							}?>
						</table>
					</div>
				</div>
			</div>

			<h3 class='col-xs-12 title' style="margin-bottom:15px; border-bottom:1px solid #FF7F00; font-size:18px; padding-top:25px;">
				Recherche et listes des arômes disponible.
			</h3>
			<form method="post" action="?page=search_arome">
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
						<img src="<?= Config::$path_public."/images/quality_search_aromes_1.jpg" ?>" class="img-responsive" alt="Qualité de la recherche d'aromes 1">
						<div class="caption">
							<h3 style="font-size:18px; margin:7px 0 7px 0; color:white;">Recherche d'arômes</h3>
							<h3 style="font-size:14px; margin:7px 0 7px 0; color:white;">Durée de la recherche : <?= convert_sec_in_time_real_fct(Config::$time_search_for_one_k_argent_depenser * (Config::$price_search_1 / 1000)); ?></h3>
							<input name="search_form_validate_1000" value="Lancer une recherche à <?= Config::$price_search_1 ?>€" class="col-lg-12 btn btn-primary" type="submit">
							<input name="value" value="<?= Config::$price_search_1 ?>" class="col-lg-12 btn btn-primary" type="hidden">
						</div>
					</div>
				</div>
			</form>

			<form method="post" action="?page=search_arome">
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
						<img src="<?= Config::$path_public."/images/quality_search_aromes_2.jpg" ?>" class="img-responsive" alt="Qualité de la recherche d'aromes 2">
						<div class="caption">
							<h3 style="font-size:18px; margin:7px 0 7px 0; color:white;">Recherche d'arômes</h3>
							<h3 style="font-size:14px; margin:7px 0 7px 0; color:white;">Durée de la recherche : <?= convert_sec_in_time_real_fct(Config::$time_search_for_one_k_argent_depenser * (Config::$price_search_2 / 1000)); ?></h3>
							<input name="search_form_validate_2500" value="Lancer une recherche à <?= Config::$price_search_2 ?>€" class="col-lg-12 btn btn-primary" type="submit">
							<input name="value" value="<?= Config::$price_search_2 ?>" class="col-lg-12 btn btn-primary" type="hidden">
						</div>
					</div>
				</div>
			</form>

			<form method="post" action="?page=search_arome">
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
						<img src="<?= Config::$path_public."/images/quality_search_aromes_3.jpg" ?>" class="img-responsive" alt="Qualité de la recherche d'aromes 3">
						<div class="caption">
							<h3 style="font-size:18px; margin:7px 0 7px 0; color:white;">Recherche d'arômes</h3>
							<h3 style="font-size:14px; margin:7px 0 7px 0; color:white;">Durée de la recherche : <?= convert_sec_in_time_real_fct(Config::$time_search_for_one_k_argent_depenser * (Config::$price_search_3 / 1000)); ?></h3>
							<input name="search_form_validate_5000" value="Lancer une recherche à <?= Config::$price_search_3 ?>€" class="col-lg-12 btn btn-primary" type="submit">
							<input name="value" value="<?= Config::$price_search_3 ?>" class="col-lg-12 btn btn-primary" type="hidden">
						</div>
					</div>
				</div>
			</form>			

			<form method="post" action="?page=search_arome">
				<div class="col-sm-6 col-md-12" >
					<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
						<div class="col-lg-3">
							<img src="<?= Config::$path_public."/images/quality_search_aromes_perso.jpg" ?>" class="img-responsive" alt="Qualité de la recherche d'aromes 3">
						</div>
						<div class="caption col-lg-9">
							<div class="col-lg-12 explication pull-right">
								<h3 class="title">&nbsp;Explication : Recherche d'arômes personnalisée.</h3>
								<span class="pull-left" style="font-size:14px; padding-left:15px;">-Lancer une recherche Personalisée vous permettre de dépenser autant d'argent que vous le souhaité dans la recherhce en parfumeries alimentaire.</span>
								<span class="pull-left" style="font-size:14px; padding-left:15px;">-Le gros avantages de lancer ce genre de recherche est que vous pouvez considérablement augmenter le pourcentage de change de trouver un nouvelle arômes.</span>
								<span class="pull-left" style="font-size:14px; padding-left:15px;">-Nous parlons ici d'une ordre de chance de 5000€/1 Donc tout les 5000€ euros à partir du palier de 5000€ vous gagnerai 10 % de chances en plus de tomber sur un arômes non connu.</span>
							</div>						
						</div>
						<div class="col-lg-9 pull-right ressource_now">
							<h3 class="title">&nbsp;Exemple :</h3>
							<table class="table table-stripped table-hover" style="color:white;">
								<tr class="success" style="color:black;">
									<th style="font-weight:500;">
										Prix de la Recherche N°1 :<br>
										De base est à : <b style="color:red;"><?= Config::$price_search_1_de_base ?>€<br></b>
										Avec amélioration est à <b style="color:green;"><?= Config::$price_search_1 ?>€</b>
									</th>

									<td>
										De base : <b style="color:red;"><?= Config::$chance_to_win_1_de_base ?>%</b><br>
										Avec Amélioration : <b style="color:green;"><?= Config::$chance_to_win_1 ?>%</b>
										<br>De chances de tomber sur un arôme
									</td>
								</tr>
								<tr class="success" style="color:black;">
									<th style="font-weight:500;">
										Prix de la Recherche N°1 :<br>
										De base est à : <b style="color:red;"><?= Config::$price_search_2_de_base ?>€<br></b>
										Avec amélioration est à <b style="color:green;"><?= Config::$price_search_2 ?>€</b>
									</th>

									<td>
										De base : <b style="color:red;"><?= Config::$chance_to_win_2_de_base ?>%</b><br>
										Avec Amélioration : <b style="color:green;"><?= Config::$chance_to_win_2 ?>%</b>
										<br>De chances de tomber sur un arôme
									</td>
								</tr>
								<tr class="success" style="color:black;">
									<th style="font-weight:500;">
										Prix de la Recherche N°1 :<br>
										De base est à : <b style="color:red;"><?= Config::$price_search_3_de_base ?>€<br></b>
										Avec amélioration est à <b style="color:green;"><?= Config::$price_search_3 ?>€</b>
									</th>

									<td>
										De base : <b style="color:red;"><?= Config::$chance_to_win_3_de_base ?>%</b><br>
										Avec Amélioration : <b style="color:green;"><?= Config::$chance_to_win_3 ?>%</b>
										<br>De chances de tomber sur un arôme
									</td>
								</tr>
								<tr class="success" style="color:black;">
						 			<th>
						 				Recherche perso àpd 
						 				<b style="color:green;"><?= Config::$price_search_3 ?>€</b>
						 				 + 
						 				<b style="color:green;"><?= Config::$price_search_3 ?>€</b>
						 				par
						 				<b style="color:green;"><?= Config::$chance_to_win_1 ?>%</b>
						 				 : ex <b style="color:green;"><?= Config::$price_search_3*2 ?>€</b>
					 				</th>

					 				<td>
					 					<b><b style="color:green;"><?= Config::$chance_to_win_3 ?>%</b>
					 					+
					 					<b style="color:green;"><?= Config::$chance_to_win_1 ?>%</b> 
					 					extra de chances de tomber sur un arôme
				 					</td>					 					
								</tr>
							</table>
						</div>
						<input name="value_search_perso" step="5000"  min="5000" max="30000" value="5000" class="col-lg-offset-3 col-lg-3" type="number">
						<input name="search_form_validate_perso" class="col-lg-3 btn btn-primary" type="submit">
					</div>
				</div>
			</form>

			<div class="col-lg-12" style="background:#232D3B;"><?
				
				foreach($array_aromes_trier as $key => $value)
				{
				 	?><h3 class='col-xs-12 title' style="border-bottom:1px solid #FF7F00; font-size:18px; margin-bottom:15px; padding-top:25px;">Marques : <?= $key; ?></h3><?
				 	foreach($value as $row_arome)
				 	{?>
						<div class="col-xs-6 col-md-3">
							<a class="thumbnail">
								<center>
									<img style="height:150px;" class="img-responsive" src="<?= Config::$path_public.$row_arome->img ?>">
									<h5 style="color:white;">Arôme n° <?= $row_arome->id; ?></h5>
									<h5 style="color:white;"><?= $row_arome->nom; ?></h5>
						        	<span style="color:green;" class="glyphicon glyphicon-ok"></span>
						        	<span style="color:red;" class="glyphicon glyphicon-remove"></span>
						        </center>
						    </a>
						</div><?
				 	}
				}?>

			</div>
		</div>
	</div>
</div>
<?
unset($_SESSION['error']);