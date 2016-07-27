<div class="col-xs-10 col-lg-12 col-without-padding col-without-radius content_game">
	__TPL_nav_game__
	<div class="col-lg-8" style="margin-top:1px;">

		<div class="col-lg-12" style="background:#232D3B;">
			<div class="col-lg-4">
				<img class="img-responsive" src="<?= Config::$path_public; ?>/images/labos.png">
			</div>
			
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
						<th>Quantité de ressource pour un littre SANS améliorations :</th><td><b><?= Config::$nb_plantes_for_littre_at_start_game_labos_0 ?> VG et <?= Config::$nb_propylene_for_littre_at_start_game_labos_0 ?> PG</td>
					</tr>
					<tr class="success" style="color:black;">
						<th>Quantité de ressource pour un littre AVEC améliorations :</th><td><b><?= Config::$nb_plantes_for_littre ?> VG et <?= Config::$nb_propylene_for_littre ?> PG</td>
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
				 				echo "<th><td><a class='btn btn-primary' href=''>&nbsp;Vous n'avez pas les moyens pour construire ceci&nbsp;</a></td></th>";
				 			}
				 			else
				 			{
				 				echo "<input type='hidden' name='construct' value='level_labos_bases'/></a>";
				 				echo "<td colspan='2'><input type='submit' class='btn btn-primary' value='Construire le niveau suivant'/></td>";
				 			}?>
			 			</form>		
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