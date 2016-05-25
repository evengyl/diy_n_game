<div class="col-xs-10 col-lg-12 col-without-padding col-without-radius content_game">
	__TPL_nav__
	<div class="col-lg-8" style="margin-top:1px;">

		<div class="col-xs-12 col-md-12">
			<div class="col-lg-12 explication pull-right">
				<h3 class="title">Explication : </h3>
				<span>Dans Diy_n_game, Les parfumeurs ne vous laisserons pas leurs recette aussi facilement, en plus de payer pour chaque recherche d'arômes vous aurez seulement un pourcentage
					défini de change de trouver des aromes en fonction de l'argent que vous placerez dans les recherche.</span>
			</div>
			<h3 class='col-xs-12 title' style="margin-bottom:15px; border-bottom:1px solid #FF7F00; font-size:18px; padding-top:25px;">
				Recherche et listes des arômes disponible.
			</h3>


	<form method="post" action="?page=arome_list">
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
					<img src="<?= Config::$path_public."/images/quality_search_aromes_1.jpg" ?>" class="img-responsive" alt="Qualité de la recherche d'aromes 1">
					<div class="caption">
						<h3 style="font-size:18px; margin:7px 0 7px 0; color:white;">Recherche d'arômes</h3>
						<input name="search_form_validate_1000" value="Lancer une recherche à 1000€" class="col-lg-12 btn btn-primary" type="submit">
					</div>
				</div>
			</div>

			<div class="col-sm-6 col-md-4">
				<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
					<img src="<?= Config::$path_public."/images/quality_search_aromes_2.jpg" ?>" class="img-responsive" alt="Qualité de la recherche d'aromes 2">
					<div class="caption">
						<h3 style="font-size:18px; margin:7px 0 7px 0; color:white;">Recherche d'arômes</h3>
						<input name="search_form_validate_2500" value="Lancer une recherche à 2500€" class="col-lg-12 btn btn-primary" type="submit">
					</div>
				</div>
			</div>

			<div class="col-sm-6 col-md-4">
				<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
					<img src="<?= Config::$path_public."/images/quality_search_aromes_3.jpg" ?>" class="img-responsive" alt="Qualité de la recherche d'aromes 3">
					<div class="caption">
						<h3 style="font-size:18px; margin:7px 0 7px 0; color:white;">Recherche d'arômes</h3>
						<input name="search_form_validate_5000" value="Lancer une recherche à 5000€" class="col-lg-12 btn btn-primary" type="submit">
					</div>
				</div>
			</div>

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
							<span class="pull-left" style="font-size:14px; padding-left:15px;">-Nous parlons ici d'une ordre de chance de 2000/1 Donc tout les 2 euros à partir du palier de 5000 vous gagnerai 1 % de chances en plus de tomber sur un arômes non connu.</span>
						</div>						
					</div>

					<div class="col-lg-9 pull-right ressource_now">
						<h3 class="title">&nbsp;Exemple :</h3>
						<table class="table table-stripped table-hover" style="color:white;">
							<tr class="success" style="color:black;">
								<th>Recherche 1 à 1000 :</th><td><b>3% de chances de tomber sur un arôme</td>
							</tr>
							<tr class="success" style="color:black;">
								<th>Recherche 2 à 2500 :</th><td><b>7% de chances de tomber sur un arôme</td>
							</tr>
							<tr class="success" style="color:black;">
								<th>Recherche 3 à 5000 :</th><td><b>12% de chances de tomber sur un arôme</td>
							</tr>
							<tr class="success" style="color:black;">
					 			<th>Recherche perso àpd 5000 + 2000 par % : ex 7000€</th><td><b>12% + 1% extra de chances de tomber sur un arôme</td>					 					
							</tr>
						</table>
					</div>
					<input name="value_search_perso" step="2000"  min="5000" value="5000" class="col-lg-offset-3 col-lg-3" type="number">
					<input name="search_form_validate_perso" class="col-lg-3 btn btn-primary" type="submit">
				</div>
			</div>
		</div>
	</form>

		<div class="col-lg-12" style="background:#232D3B;"><?
			$tmp_marque = "";
			foreach($array_aromes_trier as $key => $value)
			{
			 	?><h3 class='col-xs-12 title' style="border-bottom:1px solid #FF7F00; font-size:18px; margin-bottom:15px; padding-top:25px;">Marques : <?= $key; ?></h3><?
			 	foreach($value as $row_arome)
			 	{?>
					<div class="col-xs-6 col-md-3">
						<a class="thumbnail">
							<center>
								<img style="height:150px;" class="img-responsive" src="<?= Config::$path_public.$row_arome->img ?>">
								<h5 style="color:white;"><?= $row_arome->nom; ?></h5>
								<span style="color:white;" class="pull-left"><?= $row_arome->type; ?></span>
					        	<span style="color:green;" class="glyphicon glyphicon-ok"></span>
					        	<span style="color:red;" class="glyphicon glyphicon-remove"></span>
					        </center>
					    </a>
					</div><?
			 	}
			}?>

			<div class="col-lg-8 pull-right ressource_now">
				<h3 class="title">Actuellement vos Labos diminue vos prix de fabrication</h3>
				<table class="table table-stripped table-hover" style="color:white;">
					<tr class="success" style="color:black;">
						<th>Quantité de laboratoires :</th><td><b><? echo $user->user_infos->level_labos_bases; ?></b> Labos, Permettent une réductions du coût des bases</td>
					</tr>
					<tr class="success" style="color:black;">
						<th>Réduction :</th><td><b><? echo $user->labos_bases->pourcent_down; ?></b> % du coût des bases</td>
					</tr>
					<tr class="success" style="color:black;">
						<th>Prix pour le niveau suivant :</th><td><b><? echo $user->labos_bases->prix; ?> &euro;</b> pour acheter un nouveaux laboratoire</td>
					</tr>
					<tr class="success" style="color:black;">
					</tr>
				</table>
			</div>

			<div class="col-lg-8 explication pull-right">
				<h3 class="title">Explication : </h3>
				<span>Dans Diy_n_game, les laboratoires que vous achetez vous permettrons de payer la conception de vos bases moins chère.
					Attention car beaucoup de laboratoires vont diminuer vos coût de production mais !,le revers de la médaille pourrais vous être fatale,
					certaines personnes pourrais avoir à redire sur la sureté de leurs produits, plus vous diminuerez le coût de fabrication de vos 
					bases plus des petit ennuis pourrait survenir :).</span>
			</div>
		</div>
	</div>
	__TPL_social_services__
</div>