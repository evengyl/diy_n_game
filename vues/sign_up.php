<?
if(isset($_SESSION['pseudo'])) //donc il est connecté
{?>
	<div class="col-lg-12 col-without-padding connect-form">		
		<p class="bg-success">Vous êtes connecté en tant que <?= ucfirst($_SESSION['pseudo']) ?>, <a href="logout.php">Se déconnecter</a>, ou <a href="?page=game_home">Accès au Jeu</a></p>
	</div><?
}
else
{?>

	<div class="col-lg-12 col-without-padding connect-form" style="margin-top:25px;">	
		<div class="col-lg-12" style="padding:15px;">
			Vous inscrire vous permettra d'accèder au jeu, 
			pour rappel, ce petit jeu est entierement conçu à la main sans programmes ni personnes extérieur,</br>
			pour plus de renseignement, veuiller lire la charte accessible à partir du menu, ou prendre contact avec Evengyl, par ici
			<a href="?page=contact">Conacter-moi</a>.</br>
			Si vous avez déjà un compte c'est par ici : <a href="?page=login">Se connecter</a></br>
			Attention, votre login et votre mot de passe doivent au minimum faire 6 caractères.
		</div>
		<form action="#" method="post" class="col-lg-6 col-lg-offset-3">

			<div  class="col-lg-12 form-group <?php echo (isset($_SESSION['error']))?'has-error':''; ?>">
				<?php echo (isset($_SESSION['error']))?'<label for="exampleInputPassword1">'.$_SESSION['error'].'</label>':''; ?>
				<input name="pseudo" type="text" class="form-control " required placeholder="Pseudo">
			</div>

			<div  class="col-lg-12 form-group <?php echo (isset($_SESSION['error']))?'has-error':''; ?>">
				<?php echo (isset($_SESSION['error']))?'<label for="exampleInputPassword1">'.$_SESSION['error'].'</label>':''; ?>
				<input name="password-1" type="password" class="form-control " required placeholder="Mot de passe">
			</div>

			<div  class="col-lg-12 form-group <?php echo (isset($_SESSION['error']))?'has-error':''; ?>">
				<?php echo (isset($_SESSION['error']))?'<label for="exampleInputPassword1">'.$_SESSION['error'].'</label>':''; ?>
				<input name="password-2" type="password" class="form-control " required placeholder="Confirmer le mot de passe">
			</div>

			<div  class="col-lg-12 form-group <?php echo (isset($_SESSION['error']))?'has-error':''; ?>">
				<?php echo (isset($_SESSION['error']))?'<label for="exampleInputPassword1">'.$_SESSION['error'].'</label>':''; ?>
				<input name="email" type="mail" class="form-control " required placeholder="Adresse Email (pas de pub)">
			</div>
			
			<input type="hidden" name="return_form_complet" value="1">
			<button type="submit" class="col-lg-4 btn btn-default">Connexion</button>

		</form>
	</div><?
}


?>__TPL_accueil_bottom__