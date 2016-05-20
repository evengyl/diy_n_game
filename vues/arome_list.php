<div class="col-xs-10 col-lg-12 col-without-padding col-without-radius content_game">
	__TPL_nav__
	<div class="col-lg-8" style="margin-top:1px;">

		<div class="col-xs-12 col-md-12">
			<h3 class='col-xs-12 title' style="margin-bottom:15px; border-bottom:1px solid #FF7F00; font-size:18px; padding-top:25px;">
				Listes des batiments de production de ressources brut.
			</h3>


			<div class="col-sm-6 col-md-4">
				<div class="thumbnail" style="height:330px;">
					<img src="<?= Config::$path_public."/images/quality_search_aromes_1.jpg" ?>" class="img-responsive" alt="Qualité de la recherche d'aromes 1">
					<div class="caption">
						<h3 style="font-size:18px; margin:7px 0 7px 0; color:white;">Recherche d'arômes</h3>
						<a href="#" class="col-lg-12 btn btn-primary" role="button">
							<span class="pull-left">Button</span>
							<span class="pull-right badge">1000</span>
						</a>
					</div>
				</div>
			</div>

			<div class="col-sm-6 col-md-4">
				<div class="thumbnail" style="height:330px;">
					<img src="<?= Config::$path_public."/images/quality_search_aromes_2.jpg" ?>" class="img-responsive" alt="Qualité de la recherche d'aromes 2">
					<div class="caption">
						<h3 style="font-size:18px; margin:7px 0 7px 0; color:white;">Recherche d'arômes</h3>
						<a href="#" class="col-lg-12 btn btn-primary" role="button">
							<span class="pull-left">Button</span>
							<span class="pull-right badge">2500</span>
						</a>
					</div>
				</div>
			</div>

			<div class="col-sm-6 col-md-4">
				<div class="thumbnail" style="height:330px;">
					<img src="<?= Config::$path_public."/images/quality_search_aromes_3.jpg" ?>" class="img-responsive" alt="Qualité de la recherche d'aromes 3">
					<div class="caption">
						<h3 style="font-size:18px; margin:7px 0 7px 0; color:white;">Recherche d'arômes</h3>
						<a href="#" class="col-lg-12 btn btn-primary" role="button">
							<span class="pull-left">Button</span>
							<span class="pull-right badge">5000</span>
						</a>
					</div>
				</div>
			</div>
		</div>

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