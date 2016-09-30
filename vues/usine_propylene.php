<div class="col-xs-10 col-lg-12 col-without-padding col-without-radius content_game">
	__TPL_nav_game__
	<div class="col-lg-9" style="margin-top:1px;">

		<div class="col-lg-12 explication pull-right">
			<h3 class="title">Explication : </h3>
			<span>
				Dans Diy_n_game, les ressources principales nécessaires pour votre développement et votre production de de ressource 
				de bases sont les champs de glycérole et les usines à extraction de propylène,
				les deux vont vous rapporter des marchandises de types brutes! elle ne peuvent être exploitée en tant que tel, 
				vous devrez par la suite vous munir de laboratoire qui transformeront vos plantes et ressidu d'usine en VG et PG (Voir synthétiseur de bases), 
				dans une premier temps vous disposerez d'un niveau de laboratoires qui vous permettra de convertir vos ressources.
				plus les niveaux seront élevé dans les labos, moins vous payerez vos bases chère.
			</span>
		</div>

		<div class="col-lg-12" style="background:#232D3B; min-height:600px;">
			<div class="col-lg-4">
				<img class="img-responsive" src="../public/images/usines.png">
			</div>

			<div class="col-lg-8 pull-right ressource_now">
				<h3 class="title">Actuellement vos usines vous rapporte :</h3>
				<table class="table table-stripped table-hover" style="color:white;">
					<tr class="success" style="color:black;">
						<th>Nombres d'usines :</th><td><b><? echo $user->user_infos->level_usine_pg; ?></b> Usines améliores votre qunatité de Propylène</td>
					</tr>
					<tr class="success" style="color:black;">
						<th>Production :</th><td><b><? echo $user->usine_propylene->production; ?></b> / Littres de Propylène brut / heure</td>
					</tr>
					<tr class="success" style="color:black;">
						<th>Production /Jour : </th><td><b><?= $user->usine_propylene->production*24; ?></b> / Littres de Propylène brut / jour</td>
					</tr>
					<tr class="success" style="color:black;">
						<th>Prix pour le niveau suivant :</th><td><b><? echo $user->usine_propylene->prix; ?> &euro;</b> pour lancer le prochain niveaux d'exploitation</td>
					</tr>
					<tr class="success" style="color:black;">
						<th>Temps de construction :</th><td><? echo $user->usine_propylene->time_real_construct; ?></td>
					</tr>
					<tr class="success" style="color:black;">
						<form method="post" action="#"><?
				 			if($in_make == 1)
				 			{
								if(isset($time_finish))
							 	{
							 		echo "<th>Votre construction sera terminée le/dans : </th>";
							 		echo "<td><b>".date('d/m/Y', $time_finish)." &agrave; ".date('H:i:s', $time_finish)."</b></td>";
							 	}
				 			}
				 			else if($in_make == 2)
				 			{
				 				echo "<th><td><a class='btn btn-primary' href='' disabled>&nbsp;Vous n'avez pas les moyens pour construire ceci&nbsp;</a></td></th>";
				 			}
				 			else
				 			{
				 				echo "<input type='hidden' name='construct' value='level_usine_pg'/></a>";
				 				echo "<td colspan='2'><input type='submit' class='btn btn-primary' value='Construire le niveau suivant'/></td>";
				 			}?>
				 				
			 			</form>	
					</tr>
				</table>
			</div>

			<div class="col-lg-8 hitsoire">
				<h3 class="title">Petite histoire : </h3>
				<span>Le propylène glycol (PG) ou propane-1,2-diol appelé aussi dihydroxypropane, 
					méthyl glycol est un diol utilisé dans de nombreux usages industriels
					et pharmaceutiques ou agropharmaceutiques (solvant de pesticides), à faible dose comme
					additif alimentaire et depuis peu dans les cigarettes électroniques (liquide à vapoter).
					Il est issu à faible coût de la carbochimie, et généralement de la pétrochimie.
				</span>
			</div>

		</div>		
	</div>
</div>