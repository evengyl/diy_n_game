<div class="col-xs-8 col-lg-offset-2 col-without-padding col-without-radius content_game">
	__TPL_nav__

	<div class="col-xs-12 col-md-10" style="margin-top:1px;">
		<div class="col-xs-12">
			<h3 class='col-xs-12 title' style="font-size:20px; border-bottom:1px solid #EF4224; ">
				Cette page vous permet d'avoir une vue d'ensemble sur vos ressources et comment ce gèe votre affaire.
			</h3>
		</div>
	</div>
	<div class="col-xs-12 col-md-10" >
		<div class="col-lg-12" style="margin-bottom:15px;">
			<div class="col-lg-12" style="background:#232D3B;">
				<h1 class='col-xs-12 title' style="border-bottom:5px solid #EF4224; margin-bottom:15px;">
					Culture des plantes de VG, mise en labos pour la concentration et le stockage</h1>

					<div class="col-sm-6 col-md-2">
						<div class="thumbnail col-xs-12">
							<div class="col-xs-12">
								<h2 style="font-size:24px; margin-top:0px;" class="col-xs-12">Culture VG</h2>
								<center><img src="../public/images/plantes.png" alt="..." class="img-circle img-responsive"></center>
								<p class="col-xs-12"><b>Level : </b> <?= $user->vg->level; ?></p>
								<p class="col-xs-12"><b>Production /h : </b><?= $user->vg->production; ?></p>
								<p class="col-xs-12"><b>Next level : </b><?= $user->vg->prix; ?></p>
							</div>
						</div>
					</div>

					<div class="col-sm-6 col-md-2">
						<div class="thumbnail col-xs-12">
							<div class="col-xs-12">
								<h2 style="font-size:24px; margin-top:0px;" class="col-xs-12">Labos VG</h2>
								<center><img src="../public/images/plantes.png" alt="..." class="img-circle img-responsive"></center>
								<p class="col-xs-12"><b>Level : </b> <?= $user->vg->level; ?></p>
								<p class="col-xs-12"><b>Production /h : </b><?= $user->vg->production; ?></p>
								<p class="col-xs-12"><b>Next level : </b><?= $user->vg->prix; ?></p>
							</div>
						</div>
					</div>

			</div>
		</div>
	</div>
</div>
