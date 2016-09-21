<div class="col-xs-12 col-without-padding col-without-radius content_game">
	__TPL_nav_game__

	<div class="col-xs-12 col-md-9">
		<div class="col-lg-12" style="margin-bottom:15px;">

			<h3 class='col-xs-12 title' style="margin-bottom:5px; border-bottom:1px solid #FF7F00; font-size:18px; padding-top:25px;">
				Classement Général des joueurs.
			</h3>
			<h3 class='col-xs-12 title' style="margin-bottom:15px; border-bottom:1px solid #FF7F00; font-size:16px; padding-top:10px;">
				Votre classement actuel : <?= $position_user; ?>
			</h3>


			<div class="col-sm-6 col-md-12" >
				<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
					<div class="col-lg-12 pull-right ressource_now">
						<h3 class="title">&nbsp;Batiments en cours de construction :</h3>
						<table class="table table-stripped table-hover" style="color:white;">
							<tr class="success" style="color:black;">
								<th>Position<span style="color:black;" class="glyphicon glyphicon-arrow-down"></span></th>
								<th>Nom du Joueur<span style="color:black;" class="glyphicon glyphicon-arrow-down"></span></th>
								<th>Dernière connexion<span style="color:black;" class="glyphicon glyphicon-arrow-down"></span></th>
								<th>Nombre de points de dépenses<span style="color:black;" class="glyphicon glyphicon-arrow-down"></span></th>
								<th>Nombre de points de ventes<span style="color:black;" class="glyphicon glyphicon-arrow-down"></span></th>
							</tr><?
							foreach($list_user as $row_user)
							{?>
								<tr class="info" style="color:black;">
									<td><?= $row_user->position; ?></td>
									<td><?= $row_user->login; ?></td>
									<td><?= $row_user->last_connect; ?></td>
									<td><?= $row_user->point; ?></td>
									<td><?= $row_user->point_vente; ?></td>
								</tr><?
							}?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


