<div class="col-xs-12 col-without-padding">
	<div class="col-lg-12 col-without-padding">
		<nav style="margin-bottom:0px;" class="navbar navbar-default nav_primal">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav_primal" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="?page=home">Diy N Game</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class=" navbar-collapse collapse" id="nav_primal">
		      <ul class="nav navbar-nav">
		        <li><?php echo (!isset($_SESSION['pseudo']))?'<a href="?page=sign_up">Créer un compte</a>' : ''; ?></li>		        
		        <li><?php echo (!isset($_SESSION['pseudo']))?'<a href="?page=login">Se connecter</a>' : ''; ?></li>
		        <li><?php echo (isset($_SESSION['pseudo']))?'<a href="?page=game_home">Accès au Jeu</a>' : ''; ?></li>
		        <li><a href="#">Classement</a></li>
		        <li><a href="#">Nouveautés</a></li>
		        <li><a href="#">Mon compte</a></li>
		        <li><a href="?page=test">Test</a></li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Un probleme ?&nbsp;<span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="#">Consulter la doc</a></li>
		            <li><a href="#">Forum</a></li>
		            <li><a href="?page=contact">Contacter moi</a></li>
		          </ul>
		        </li>
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		        <li><?php echo (isset($_SESSION['pseudo']))?'<a href="logout.php">Se déconnecter</a>' : ''; ?></li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
	</div>
</div>
