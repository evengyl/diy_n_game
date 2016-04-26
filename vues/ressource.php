<?		
if(Config::$is_connect == 1)
{?>


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
	      			<a class="navbar-brand hidden-lg" style="font-size:12px;" href="?page=home">Ressources Disponibles</a>
		    	</div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    	<div class=" navbar-collapse collapse" id="nav_primal">
		    		
		    		<div class="col-lg-3">
				      	<ul class="col-lg-12 nav navbar-nav">
					        <li class="col-lg-6">
					        	<a href="">
					        		<img src="../public/images/plantes.png" alt="Champs de Glycerine" style="max-height:25px;">
					        		<span style="font-size:10px;">Champs : <?= $user->user_infos->last_culture_vg ?></span>
					        	</a>
					        </li>
					        <li class="col-lg-6">
					        	<a href="">
					        		<img src="../public/images/vg.png" alt="Littre de glycérine" style="max-height:25px;">
					        		<span style="font-size:10px;">Littres : 000</span>
					        	</a>
					        </li>

					        <li class="col-lg-6">
					        	<a href="">
					        		<img src="../public/images/usines.png" alt="Usines de propylène" style="max-height:25px;">
					        		<span style="font-size:10px;">Propylènes : <?= $user->user_infos->last_usine_pg ?></span>
					        	</a>
					        </li>
					        <li class="col-lg-6">
					        	<a href="">
					        		<img src="../public/images/pg.png" alt="Littres de propylène" style="max-height:25px;">
					        		<span style="font-size:10px;">Littres : 000</span>
					        	</a>
					        </li>
					    </ul>
				    </div>

				    <div class="col-lg-5">
					    <ul class="col-lg-6 nav navbar-nav">
					        <li class="col-lg-12">
					        	<a href="">
					        		<img src="../public/images/vg-pg.png" alt="Bases en glycérine et propylène" style="max-height:25px;">
					        		<span style="font-size:10px;">Bases 20VG/80PG : 000</span>
					        	</a>
					        </li>
					        <li class="col-lg-12">
					        	<a href="">
					        		<img src="../public/images/vg-pg.png" alt="Bases en glycérine et propylène" style="max-height:25px;">
					        		<span style="font-size:10px;">Bases 50VG/50PG : 000</span>
					        	</a>
					        </li>
				        </ul>
			        	<ul class="col-lg-6 nav navbar-nav">
					        <li class="col-lg-12">
					        	<a href="">
					        		<img src="../public/images/vg-pg.png" alt="Bases en glycérine et propylène" style="max-height:25px;">
					        		<span style="font-size:10px;">Bases 80VG/20PG : 000</span>
					        	</a>
					        </li>
					        <li class="col-lg-12">
					        	<a href="">
					        		<img src="../public/images/vg-pg.png" alt="Bases en glycérine et propylène" style="max-height:25px;">
					        		<span style="font-size:10px;">Bases 100VG : 000</span>
					        	</a>
					        </li>
				        </ul>
				    </div>

			        <div class="col-lg-2">
				        <ul class="nav navbar-nav">
					        <li class="col-lg-12">
					        	<a href="">
					        		<img src="../public/images/e-liquides.png" alt="Flacons e-liquide" style="max-height:25px;">
					        		<span style="font-size:10px;">Nombres de flacons Vides : 000</span>
					        	</a>
					        </li>
					        <li class="col-lg-12">
					        	<a href="">
					        		<img src="../public/images/e-liquides.png" alt="Flacons e-liquide" style="max-height:25px;">
					        		<span style="font-size:10px;">Nombres de flacons rempli : 000</span>
					        	</a>
					        </li>
					    </ul>
					</div>

				    <div class="col-lg-2">
				        <ul class="nav navbar-nav">
					        <li class="col-lg-12">
					        	<a href="">
					        		<img src="../public/images/argent.png" alt="Argent en coffre" style="max-height:25px;">
					        		<span style="font-size:10px;">Argent : 000 €</span>
					        	</a>
					        </li>
				      	</ul>
			      	</div>

	    		</div><!-- /.navbar-collapse -->
  			</div><!-- /.container-fluid -->
		</nav>
	</div>
</div>



<?
}?>