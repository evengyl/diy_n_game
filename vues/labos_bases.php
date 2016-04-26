<div class="col-xs-10 col-lg-12 col-without-padding col-without-radius content_game">
	__TPL_nav__
	<div class="col-lg-8" style="margin-top:1px;">

		<div class="col-lg-12" style="background:#232D3B; min-height:600px;">
			<div class="col-lg-4">
				<img class="img-responsive" src="../public/images/plantes.png">
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
				<h3 class="title">Actuellement vos Labos diminue vos prix de fabrication de :</h3>
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
					<tr class="success" style="color:black;"><?
			 			if($in_make == 1)
			 			{
							if(isset($time_finish))
						 	{
						 		echo "<th>Votre construction sera terminée le/dans : </th>";
						 		echo "<td><b>".date('d/m/Y', $time_finish)." &agrave; ".date('H:i:s', $time_finish)."</b></td>";
						 	}
			 			}
			 			else if($in_make == 2)
			 				echo "<th><td><a class='btn btn-primary' href=''>&nbsp;Vous n'avez pas les moyens pour construire ceci&nbsp;</a></td></th>";
			 			else
			 				echo "<th><td><a class='btn btn-primary' href='?page=champ_glycerine&construct=level_culture_vg'>&nbsp;Construire le niveau suivant&nbsp;</a></td></th>";?>
			 					
					</tr>
				</table>
			</div>
		</div>		
	</div>
	__TPL_social_services__
</div>