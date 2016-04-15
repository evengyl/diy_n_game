<div class="header col-xs-12 col-without-padding">
	<div class="logo col-xs-6">
		<a href="/diy_n_game/public/index.php">Vapes,&nbsp;&nbsp;&nbsp;Diy - Game</a>
	</div>	<?
	
	//affiche_pre($user);
	if($is_connect == 1)
	{?>
		<div class="ressource_top col-xs-6">
			<div class="col-sm-6 col-md-2">
				<div class="thumbnail col-xs-12" style="margin-bottom:5px; margin-top:15px;">
					<div class=" col-xs-12 col-without-padding">
						<h5 style="margin-top:0px;" class="col-xs-12">Plantes de glycérine</h5>
						<center><img src="../public/images/plantes.png" alt="Plantes de glycérine" class="img-circle img-responsive" style="max-height:50px;"></center>
						<center><p><strong><?= $user->user_infos->last_culture_vg ?></strong></p></center>
						<center><p><strong><?= $user->vg->production_sec ?>/sec</strong></p></center>
					</div>
				</div>
			</div>							
			<div class="col-sm-6 col-md-2">
				<div class="thumbnail col-xs-12" style="margin-bottom:5px; margin-top:15px;">
					<div class=" col-xs-12 col-without-padding">
						<h5 style="margin-top:0px;" class="col-xs-12">Littres de glycérine</h5>
						<center><img src="../public/images/vg.png" alt="Littres de glycérine" class="img-circle img-responsive" style="max-height:50px;"></center>
						<center><p>12345</p></center>
					</div>
				</div>
			</div>							
			<div class="col-sm-6 col-md-2">
				<div class="thumbnail col-xs-12" style="margin-bottom:5px; margin-top:15px;">
					<div class=" col-xs-12 col-without-padding">
						<h5 style="margin-top:0px;" class="col-xs-12">Usines de propylène</h5>
						<center><img src="../public/images/usines.png" alt="Usines de propylène" class="img-circle img-responsive" style="max-height:50px;"></center>
						<center><p><strong><?= $user->user_infos->last_usine_pg ?></strong></p></center>
						<center><p><strong><?= $user->pg->production_sec ?>/sec</strong></p></center>
					</div>
				</div>
			</div>							
			<div class="col-sm-6 col-md-2">
				<div class="thumbnail col-xs-12" style="margin-bottom:5px; margin-top:15px;">
					<div class=" col-xs-12 col-without-padding">
						<h5 style="margin-top:0px;" class="col-xs-12">Littres de propylène</h5>
						<center><img src="../public/images/vg.png" alt="Littres de propylène" class="img-circle img-responsive" style="max-height:50px;"></center>
						<center><p>12345</p></center>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-2">
				<div class="thumbnail col-xs-12" style="margin-bottom:5px; margin-top:15px;">
					<div class=" col-xs-12 col-without-padding">
						<h5 style="margin-top:0px;" class="col-xs-12">Nombres de flacons</h5>
						<center><img src="../public/images/e-liquides.png" alt="Nombres de flacons de e-liquides" class="img-circle img-responsive" style="max-height:50px;"></center>
						<center><p>12345</p></center>
					</div>
				</div>
			</div>							
			<div class="col-sm-6 col-md-2">
				<div class="thumbnail col-xs-12" style="margin-bottom:5px; margin-top:15px;">
					<div class=" col-xs-12 col-without-padding">
						<h5 style="margin-top:0px;" class="col-xs-12">Argents en coffres</h5>
						<center><img src="../public/images/argent.png" alt="Argent" class="img-circle img-responsive" style="max-height:50px;"></center>
						<center><p>12345 €</p></center>
					</div>
				</div>
			</div>
		</div>
	<?
	}?>

		__TPL_nav_primal__

		
</div>
