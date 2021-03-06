<div class="col-xs-10 col-lg-12 col-without-padding col-without-radius content_game">
	__TPL_nav_game__
	<div class="col-lg-9" style="margin-top:1px;">

		<div class="col-lg-12 explication pull-right">
			<h3 class="title">Explication : </h3>
			<span>
				Les mines de fer font des trucs mdr
			</span>
		</div>

		<div class="col-lg-12" style="background:#232D3B; min-height:600px;">
			<div class="col-lg-4">
				<img class="img-responsive" src="<?= Config::$path_public; ?>/images/plantes.png">
			</div>

			<div class="col-lg-8 pull-right ressource_now">
				<h3 class="title">Actuellement vos champs vous rapporte :</h3>
				<table class="table table-stripped table-hover" style="color:white;">
					<tr class="success" style="color:black;">
						<th>Nombres des champs :</th><td><b><? echo $user->user_list_batiments->lvl_mine_fer; ?></b> Mines travailles sous votre commandemant</td>
					</tr>
					<tr class="success" style="color:black;">
						<th>Production :</th><td><b><? echo $user->champ_glycerine->production; ?></b> / Plantes de Glycérole / heure</td>
					</tr>
					<tr class="success" style="color:black;">
						<th>Production /Jour : </th><td><b><?= $user->champ_glycerine->production*24; ?></b> / Plantes de Glycérole / jour</td>
					</tr>
					<tr class="success" style="color:black;">
						<th>Prix pour le niveau suivant :</th><td><b><? echo $user->champ_glycerine->prix; ?> &euro;</b> pour lancer le prochain niveaux d'exploitation</td>
					</tr>
					<tr class="success" style="color:black;">
						<th>Temps de construction :</th><td><? echo $user->champ_glycerine->time_real_construct; ?></td>
					</tr>
					<tr class="success" style="color:black;">
						<form method="post" action="#"><?
				 			if($in_make == 1)
				 			{
								if(isset($time_finish))
							 	{
							 		echo "<th>Votre construction sera terminée le : </th>";
							 		echo "<td><b>".date('d/m/Y', $time_finish)." &agrave; ".date('H:i:s', $time_finish)."</b></td>";
							 	}
				 			}
				 			else if($in_make == 2)
				 			{
				 				echo "<th><td><a class='btn btn-primary' href='' disabled>&nbsp;Vous n'avez pas les moyens pour construire ceci&nbsp;</a></td></th>";
				 			}
				 			else
				 			{
				 				echo "<input type='hidden' name='construct' value='lvl_mine_fer'/></a>";
				 				echo "<td colspan='2'><input type='submit' class='btn btn-primary' value='Construire le niveau suivant'/></td>";
				 			}?>
				 				
			 			</form>		
					</tr>
				</table>
			</div>

			<div class="col-lg-8 hitsoire pull-right">
				<h3 class="title">Petite histoire : </h3>
				<span>
					Le glycérol est formé durant la fermentation alcoolique du moût de raisin lors de la production du vin.
					Les huiles de noix de coco et de palmiste qui contiennent un pourcentage élevé (70-80 %) d'acides 
					gras en C6 à C14 libèrent de plus grandes quantités de glycérol que les gras et huiles qui contiennent 
					majoritairement des acides gras en C16 et C18, comme les graisses animales, les huiles de graines de coton, 
					graines de soja, olives et palme.
				</span>
			</div>

		</div>		
	</div>
</div>