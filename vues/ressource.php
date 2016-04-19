<?		
if(Config::$is_connect == 1)
{?>
	<div class="ressource_top col-xs-6">
						
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

	<div class="col-xs-12 col-without-padding">
	<div class="col-lg-12 col-without-padding">
		<nav class="navbar navbar-default nav_primal">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav_primal" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" style="font-size:12px;" href="?page=home">Ressources Disponibles</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class=" navbar-collapse collapse" id="nav_primal">
		      <ul class="nav navbar-nav">
		        <li>
		        	<a href="">
		        		<img src="../public/images/plantes.png" alt="Champs de Glycerine" style="max-height:25px;">
		        		<span style="font-size:10px;">Littres de glycérine : <?= $user->user_infos->last_culture_vg ?></span>
		        	</a>
		        </li>
		        <li>
		        	<a href="">
		        		<img src="../public/images/usines.png" alt="Usines de propylène" style="max-height:25px;">
		        		<span style="font-size:10px;">Usines de propylène : <?= $user->user_infos->last_usine_pg ?></span>
		        	</a>
		        </li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
	</div>
</div>



<?
}?>