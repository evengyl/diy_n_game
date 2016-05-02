<?		
if(Config::$is_connect == 1)
{?>





<div class="collapse col-lg-12 col-without-padding" id="menu_ressource">
	<div class="col-xs-12 col-without-padding">
		<div class="col-lg-12 col-without-padding">
			<nav class="navbar navbar-default nav_primal" style="border-top:0px; margin-bottom:0px; border-bottom:1px solid #FF7F00;">
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
		    	<div style="padding-bottom:7px; padding-top:7px;" class=" navbar-collapse collapse" id="nav_primal">
		    		
		    		<div class="col-lg-4 col-without-padding">
				      	<ul class="col-lg-12 nav navbar-nav">
					        <li class="col-lg-6" style="color:white;">
					        		<img src="<?= Config::$path_public; ?>/images/plantes.png" alt="Champs de Glycerine" style="max-height:25px;">
					        		<span style="font-size:11px;">Champs : <?= $user->user_infos->last_culture_vg ?></span>
					        </li>
					        <li class="col-lg-6" style="color:white;">
					        		<img src="<?= Config::$path_public; ?>/images/vg.png" alt="Littre de glycérine" style="max-height:25px;">
					        		<span style="font-size:11px;">Littres : 000</span>
					        </li>

					        <li class="col-lg-6" style="color:white;">
					        		<img src="<?= Config::$path_public; ?>/images/usines.png" alt="Usines de propylène" style="max-height:25px;">
					        		<span style="font-size:11px;">Propylènes : <?= $user->user_infos->last_usine_pg ?></span>
					        </li>
					        <li class="col-lg-6" style="color:white;">
					        		<img src="<?= Config::$path_public; ?>/images/pg.png" alt="Littres de propylène" style="max-height:25px;">
					        		<span style="font-size:11px;">Littres : 000</span>
					        </li>
					    </ul>
				    </div>

				    <div class="col-lg-4 col-without-padding">
					    <ul class="col-lg-6 nav navbar-nav">
					        <li class="col-lg-12" style="color:white;">
					        		<img src="<?= Config::$path_public; ?>/images/vg-pg.png" alt="Bases en glycérine et propylène" style="max-height:25px;">
					        		<span style="font-size:11px;">Bases 20VG/80PG : 000</span>
					        </li>
					        <li class="col-lg-12" style="color:white;">
					        		<img src="<?= Config::$path_public; ?>/images/vg-pg.png" alt="Bases en glycérine et propylène" style="max-height:25px;">
					        		<span style="font-size:11px;">Bases 50VG/50PG : 000</span>
					        </li>
				        </ul>
			        	<ul class="col-lg-6 nav navbar-nav">
					        <li class="col-lg-12" style="color:white;">
					        		<img src="<?= Config::$path_public; ?>/images/vg-pg.png" alt="Bases en glycérine et propylène" style="max-height:25px;">
					        		<span style="font-size:11px;">Bases 80VG/20PG : 000</span>
					        </li>
					        <li class="col-lg-12" style="color:white;">
					        		<img src="<?= Config::$path_public; ?>/images/vg-pg.png" alt="Bases en glycérine et propylène" style="max-height:25px;">
					        		<span style="font-size:11px;">Bases 100VG : 000</span>
					        </li>
				        </ul>
				    </div>

			        <div class="col-lg-2 col-without-padding">
				        <ul class="nav navbar-nav">
					        <li class="col-lg-12" style="color:white;">
					        		<img src="<?= Config::$path_public; ?>/images/e-liquides.png" alt="Flacons e-liquide" style="max-height:25px;">
					        		<span style="font-size:11px;">Nombres de flacons Vides : 000</span>
					        </li>
					        <li class="col-lg-12" style="color:white;">
					        		<img src="<?= Config::$path_public; ?>/images/e-liquides.png" alt="Flacons e-liquide" style="max-height:25px;">
					        		<span style="font-size:11px;">Nombres de flacons rempli : 000</span>
					        </li>
					    </ul>
					</div>

				    <div class="col-lg-2 col-without-padding">
				        <ul class="nav navbar-nav">
					        <li class="col-lg-12" style="color:white;">
					        		<img src="<?= Config::$path_public; ?>/images/argent.png" alt="Argent en coffre" style="max-height:25px;">
					        		<span style="font-size:11px;">Argent : 000 €</span>
					        </li>
				      	</ul>
			      	</div>
	    		</div><!-- /.navbar-collapse -->
			</nav>
		</div>
	</div>
</div>
<div class="logo_ressource col-lg-6 col-lg-offset-3">
	<a style="cursor:pointer;" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" data-target="#menu_ressource">
		<center><img style="display:inline-block;" src="images/bouton-collapse-ressource.png"></center>
	</a>
</div>
<?
}?>