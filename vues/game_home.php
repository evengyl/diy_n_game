
<div class="col-xs-12 col-without-padding col-without-radius content_game">
	__TPL_nav__

	<div class="col-xs-12 col-md-10" style="margin-top:1px;">
		<div class="col-xs-12">
			<h3 class='col-xs-12 title' style="font-size:20px; border-bottom:1px solid #EF4224; ">
				Petit texte de présentation de la page ici il faut quand même que se soit rempli a hauteur
				 d'un certain nombre de ligne, après je peux pas savoir exactement ce que je vais pouvoir 
				 mettre de dedans mais ceci est déjà pas trop mal il me semble, enfin je pense?
			</h3>
		</div>
	</div>
	<div class="col-xs-12 col-md-10" >
			<?
			$temp = array(1,2,3,4,5,6);
			$temp_2 = array(1,2,3,4,5);

			foreach($temp_2 as $row_2)
			{
				?>
				<div class="col-lg-12" style="margin-bottom:15px;">
					<div class="col-lg-12" style="background:#232D3B;">
						<h1 class='col-xs-12 title' style="border-bottom:5px solid #EF4224; margin-bottom:15px;">Test mais ce serais sympa d'avoir un titre de ce que contient le thumb</h1><?

						foreach($temp as $row)
						{?>
							
							<div class="col-sm-6 col-md-2">
								<div class="thumbnail col-xs-12">
									<div class="col-xs-12">
										<h2 style="font-size:24px; margin-top:0px;" class="col-xs-12">Thumbnail ONE</h2>
										<center><img src="../public/images/fiole.jpg" alt="..." class="img-circle img-responsive"></center>
										<p class="col-xs-12"><b>Level :</b> 564562</p>
										<p class="col-xs-12"><b>Production /h :</b> 1350000</p>
										<p class="col-xs-12"><b>Next level :</b> 1523064578</p>
										
										<a href="#" class="btn btn-primary col-xs-5 pull-left" role="button">Contruire</a>
										<a href="#" class="btn btn-primary col-xs-5 pull-right" role="button">Détruire</a>
										
									</div>
								</div>
							</div>
						<?
						}?>
					</div>
				</div><?
			}?>
	</div>
</div>
