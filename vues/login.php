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

	<div class="col-lg-12 col-without-padding connect-form">	
		<div class="col-lg-12" style="padding:15px;">
			Vous connecter vous permettra d'accèder au jeu, 
			pour rappel, ce petit jeu est entièrement conçu à la main sans programmes ni personnes extérieur,</br>
			pour plus de renseignement, veuiller lire la charte accessible à partir du menu, ou prendre contact avec Evengyl, par ici
			<a href="?page=contact">Contactez-moi</a>.</br>
			pour créer un compte c'est par ici : <a href="?page=sign_up">Créer un compte</a></br>
			
		</div>
		<form action="#" method="post" class="col-lg-8 col-lg-offset-2">

			<div style="float:left;" class="col-lg-12 form-group <?php echo (isset($_SESSION['error']))?'has-error':''; ?>">
				<?php echo (isset($_SESSION['error']))?'<label style="color:red;" for="exampleInputPassword1">'.$_SESSION['error'].'</label>':''; ?>
				<input name="pseudo" type="text" class="form-control " required autofocus placeholder="Pseudo">
			</div>

			<div style="float:left;" class="col-lg-12 form-group <?php echo (isset($_SESSION['error']))?'has-error':''; ?>">
				<input name="password" type="password" class="form-control" required placeholder="Mot de passe">
			</div>
			<input type="hidden" name="return_form_complet" value="55157141">
			Si vous avez oubliez votre mot de passer c'est ici : <a style="cursor: pointer;" data-toggle="modal" data-target="#lost_login_modal">Récupérer son mot de passe</a></br></br>
			<button type="submit" class="col-lg-12 btn btn-default">Connexion</button>
			
		</form>
	</div><?
	unset($_SESSION['error']); // permet de ne pas afficher les erreurs de connection si on reload la page
}


?>

__TPL_accueil_bottom__



<!-- Modal -->
<div class="modal fade" id="lost_login_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background:#232D3B;">
      <div class="modal-header" style="background: #ff7f00; color:white;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Récupération de votre mot de passe</h4>
      </div>
      <div class="modal-body" style="height:150px;">
      	<h4 class="modal-title" style="color:white;">un email a été envoyé, verif lmog</h4></br>
	      <form action="#" method="post">
       			<div style="float:left;" class="col-lg-12 form-group <?php echo (isset($_SESSION['error']))?'has-error':''; ?>">
					<?php echo (isset($_SESSION['error']))?'<label style="color:red;" for="exampleInputPassword1">'.$_SESSION['error'].'</label>':''; ?>
					<input name="pseudo" type="text" class="form-control" required autofocus placeholder="Pseudo">
				</div>
				<input type="hidden" name="return_form_complet_lost_login" value="71407141">
				<button type="submit" class="col-lg-12 btn btn-default">Récupérer votre mot de passe</button>
			</form>
      </div>
    </div>
  </div>
</div>