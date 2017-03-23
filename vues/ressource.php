<?		
if(Config::$is_connect == 1)
{?>

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
		    	<div style="padding-bottom:7px; padding-top:7px; position: relative; z-index: 9999;" class=" navbar-collapse collapse" id="nav_primal">
		    		
		    		<div class="col-lg-4 col-without-padding">
				      	<ul class="col-lg-12 nav navbar-nav">
					        <li class="col-lg-6" style="color:white;">
					        		<img src="<?= Config::$path_public; ?>/images/plantes.png" alt="Champs de Glycerine" style="max-height:25px;">
					        		<span style="font-size:13px;">Champs brut: <?= round($user->user_infos->last_culture_vg, 2) ?></span>
					        </li>

					        <li class="col-lg-6" style="color:white;">
					        		<img src="<?= Config::$path_public; ?>/images/usines.png" alt="Usines de propylène" style="max-height:25px;">
					        		<span style="font-size:13px;">Propylènes brut: <?= round($user->user_infos->last_usine_pg, 2) ?></span>
					        </li>

					        <li class="col-lg-6" style="color:white;">
					        		<img src="<?= Config::$path_public; ?>/images/plantes.png" alt="Champs de Glycerine" style="max-height:25px;">
					        		<span style="font-size:13px;">Littre VG brut: <?= $user->user_infos->litter_vg ?> Lts</span>
					        </li>


					        <li class="col-lg-6" style="color:white;">
					        		<img src="<?= Config::$path_public; ?>/images/usines.png" alt="Usines de propylène" style="max-height:25px;">
					        		<span style="font-size:13px;">Littre PG brut: <?= $user->user_infos->litter_pg ?> Lts</span>
					        </li>

					    </ul>
				    </div>

				    <div class="col-lg-4 col-without-padding">
					    <ul class="col-lg-6 nav navbar-nav">
					        <li class="col-lg-12" style="color:white;">
					        		<img src="<?= Config::$path_public; ?>/images/vg-pg.png" alt="Bases en glycérine et propylène" style="max-height:25px;">
					        		<span style="font-size:13px;">Bases 20VG/80PG : <?= $user->bases->bases_2080 ; ?></span>
					        </li>
					        <li class="col-lg-12" style="color:white;">
					        		<img src="<?= Config::$path_public; ?>/images/vg-pg.png" alt="Bases en glycérine et propylène" style="max-height:25px;">
					        		<span style="font-size:13px;">Bases 50VG/50PG : <?= $user->bases->bases_5050 ; ?></span>
					        </li>
				        </ul>
			        	<ul class="col-lg-6 nav navbar-nav">
					        <li class="col-lg-12" style="color:white;">
					        		<img src="<?= Config::$path_public; ?>/images/vg-pg.png" alt="Bases en glycérine et propylène" style="max-height:25px;">
					        		<span style="font-size:13px;">Bases 80VG/20PG : <?= $user->bases->bases_8020 ; ?></span>
					        </li>
					        <li class="col-lg-12" style="color:white;">
					        		<img src="<?= Config::$path_public; ?>/images/vg-pg.png" alt="Bases en glycérine et propylène" style="max-height:25px;">
					        		<span style="font-size:13px;">Bases 100VG : <?= $user->bases->bases_1000 ; ?></span>
					        </li>
				        </ul>
				    </div>

			        <div class="col-lg-2 col-without-padding">
				        <ul class="nav navbar-nav">

					        <li class="col-lg-12" style="color:white;">
					        		<img src="<?= Config::$path_public; ?>/images/e-liquides.png" alt="Flacons e-liquide" style="max-height:25px;">
					        		<span style="font-size:13px;">Nombres de flacons Vides : <?= $user->hardware->flacon; ?></span>
					        </li>

					        <li class="col-lg-12" style="color:white;">
					        		<img src="<?= Config::$path_public; ?>/images/e-liquides.png" alt="Flacons e-liquide" style="max-height:25px;">
					        		<span style="font-size:13px;">Pipettes restantes : <?= $user->hardware->pipette; ?></span>
					        </li>
					        <li class="col-lg-12" style="color:white;">
					        		<img src="<?= Config::$path_public; ?>/images/e-liquides.png" alt="Stockage" style="max-height:25px;">
					        		<span style="font-size:13px;">Stockage : <?= $user->user_infos->nb_product_total ."/".$user->hardware->frigo*Config::$nb_product_per_frigo; ?></span>
					        </li>
					    </ul>
					</div>

				    <div class="col-lg-2 col-without-padding">
				        <ul class="nav navbar-nav">

					        <li class="col-lg-12" style="color:white;">
					        		<img src="<?= Config::$path_public; ?>/images/argent.png" alt="Argent en coffre" style="max-height:25px;">
					        		<span style="font-size:13px;">Argents : <?= $user->user_infos->argent ?> €</span>
					        </li>
					        <li class="col-lg-12" style="color:white;">
					        		<img src="<?= Config::$path_public; ?>/images/point.png" alt="Argent en coffre" style="max-height:25px;">
					        		<span style="font-size:13px;">Points : <?= $user->user_infos->point ?> Pts</span>
					        </li>
					        <li class="col-lg-12" style="color:white;">
					        		<img src="<?= Config::$path_public; ?>/images/point.png" alt="Argent en coffre" style="max-height:25px;">
					        		<span style="font-size:13px;">Points de vente : <?= $user->user_infos->point_vente ?> Pts</span>
					        </li>
				      	</ul>
			      	</div>
	    		</div><!-- /.navbar-collapse -->
			</nav>
		</div>
	</div>

	<div class="logo_ressource col-lg-6 col-lg-offset-3">	
		<center>
			<img style="display:inline-block;" src="images/bouton-collapse-ressource.png">
		</center>	
	</div>
	<div class="logo_ressource col-lg-4">	
		<center>
			<p style="padding:2px; margin-bottom:5px;" class="bg-info">Correction : problème avec la listes des construction en cours, réglée !</p>
		</center>	
	</div>
	<div class="logo_ressource col-lg-4">	
		<center>
			<p style="padding:2px; margin-bottom:5px;" class="bg-info">Correction : Problème lié aux améliorations de recherches corrigé</p>
		</center>	
	</div>
	<div class="logo_ressource col-lg-4">	
		<center>
			<p style="padding:2px; margin-bottom:5px;" class="bg-info">1000 pg, 1000vg et 1000€ offert au joueurs pour les bugs.</p>
		</center>	
	</div>


<?
}?>


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-89882316-1', 'auto');
  ga('send', 'pageview');

</script>