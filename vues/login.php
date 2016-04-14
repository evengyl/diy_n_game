<?
if(isset($_SESSION['pseudo'])) //donc il est connecté
{?>
	<div class="col-xs-12 connect-form" style="text-align:center; font-size:45px; font-family:milk;">
		<a href="?page=game_home" style="text-decoration:none;">>>&nbsp;&nbsp;Entrer sur le jeu !&nbsp;&nbsp;<<</a>
	</div>
	<div class="col-xs-12 col-without-padding connect-form">		
		<p class="bg-success">Vous êtes connecté en tant que <?= ucfirst($_SESSION['pseudo']) ?>, <a href="logout.php">Se déconnecter</a>, ou <a href="?page=game_home">Accès au Jeu</a></p>
	</div>
	<?
}
else
{?>

	<div class="col-lg-12 col-without-padding connect-form" style="margin-top:25px;">	
		<div class="col-lg-12" style="padding:15px;">
			Vous connecter vous permettra d'accèder au jeu, 
			pour rappel, ce petit jeu est entierement conçu à la main sans programmes ni personnes extérieur,</br>
			pour plus de renseignement, veuiller lire la charte accessible à partir du menu, ou prendre contact avec Evengyl, par ici
			<a href="?page=contact">Conacter-moi</a>.</br>
			pour créer un compte c'est par ici : <a href="?page=sign_up">Créer un compte</a>
		</div>
		<form action="#" method="post" class="col-lg-8 col-lg-offset-2">

			<div style="float:left;" class="col-lg-12 form-group <?php echo (isset($_SESSION['error']))?'has-error':''; ?>">
				<?php echo (isset($_SESSION['error']))?'<label for="exampleInputPassword1">'.$_SESSION['error'].'</label>':''; ?>
				<input name="pseudo" type="text" class="form-control " required placeholder="Pseudo">
			</div>

			<div style="float:left;" class="col-lg-12 form-group <?php echo (isset($_SESSION['error']))?'has-error':''; ?>">
				<input name="password" type="password" class="form-control" required placeholder="Mot de passe">
			</div>
			<input type="hidden" name="return_form_complet" value="55157141">
			<button type="submit" class="col-lg-12 btn btn-default">Connexion</button>

		</form>
	</div><?
	unset($_SESSION['error']); // permet de ne pas afficher les erreurs de connection si on reload la page
}


?>__TPL_accueil_bottom__