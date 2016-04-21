<div class="col-xs-10 col-lg-12 col-without-padding col-without-radius content_game">
	__TPL_nav__
	<div class="col-lg-10" style="margin-top:1px;">

		<div class="col-lg-12" style="background:#232D3B; min-height:600px;">
			<div class="col-lg-4">
				image
				<img class="img-responsive" src="../public/images/plantes.png">
			</div>

			<div class="col-lg-8 hitsoire">
				<h3 class="title">Petite histoire : </h3>
				<span>Le glycérol est formé durant la fermentation alcoolique du moût de raisin lors de la production du vin.
				Les huiles de noix de coco et de palmiste qui contiennent un pourcentage élevé (70-80 %) d'acides 
				gras en C6 à C14 libèrent de plus grandes quantités de glycérol que les gras et huiles qui contiennent 
				majoritairement des acides gras en C16 et C18, comme les graisses animales, les huiles de graines de coton, 
				graines de soja, olives et palme.</span>
			</div>
			<div class="col-lg-8 explication pull-right">
				<h3 class="title">Explication : </h3>
				<span>Dans Diy_n_game, les ressources principales nécessaires pour votre développement est les champs et glycérole et les usines qui vont manufacturer 
					le propylène, les deux vont vous rapporter des marchandises de types brutes! elle ne peuvent être exploitée comme ça, 
					vous devrez par la suite vous munir de laboratoire qui transformeront vos plantes et ressidu d'usine en VG et PG, 
					dans une premier temps vous disposerez d'un niveau de laboratoires qui vous permettra de convertir vos ressources.
					plus les niveaux seront élevé dans les labos, moins vous payerez vos bases chère.</span>
			</div>

			<div class="col-lg-8 pull-right ressource_now">
				<h3 class="title">Actuellement vos champs vous rapporte :</h3>
				<table class="table table-stripped table-hover" style="color:white;">
					<tr class="success" style="color:black;">
						<th>Nombres des champs :</th><td><b><? echo $user->user_infos->level_culture_vg; ?></b> Champs améliores votre qunatité de glycérole</td>
					</tr>
					<tr class="success" style="color:black;">
						<th>Production :</th><td><b><? echo $user->culture_vg->production; ?></b> / Plantes de Glycérole / heure</td>
					</tr>
					<tr class="success" style="color:black;">
						<th>Prix pour le niveau suivant :</th><td><b><? echo $user->culture_vg->prix; ?> &euro;</b> pour lancer le prochain niveaux d'exploitation</td>
					</tr>
					<tr class="success" style="color:black;">
						<? echo(isset($infos_vg->time_to_finish))? '<th>Votre construction sera terminée le/dans : </th>' : '' ; ?>
						<? echo(isset($infos_vg->time_to_finish))? "<td><b>".date('d/m/Y', $infos_vg->time_to_finish)." &agrave; ".date('H:i:s', $infos_vg->time_to_finish)."</b></td>" : "" ; ?>
					</tr>

				</table>
			</div>

			<div class="col-lg-12">

			</div>
		</div>		
	</div>
</div>