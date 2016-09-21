<h2 class='col-xs-12 title_page_game'>
	Mon compte
</h2>
<div class="col-xs-12 col-without-padding col-without-radius content_game">

	<div class="col-xs-12 col-md-9">
		<div class="col-lg-12" style="margin-bottom:15px;">
		<h2 class='col-xs-12 title_page_game' style="border-bottom:1px solid #FF7F00;">Changement d'informations personnelles</h2>

<h4 class='title' style="padding-left:50px;">Changer de Mot de passe</h4>

		<form action="#" method="post" class="col-lg-6 col-lg-offset-3">

			<div  class="col-lg-12 form-group <?php echo (isset($_SESSION['error']))?'has-error':''; ?>">
				<?php echo (isset($_SESSION['error']))?'<label for="exampleInputPassword1" style="color:green">'.$_SESSION['error'].'</label><br/>':''; ?>
				<label style="color:white">Pseudo</label>
				<input disabled name="pseudo" type="text" class="form-control " id='disabledInput' value="<?= $user->user_infos->login; ?>">
			</div>

			<div  class="col-lg-12 form-group <?php echo (isset($_SESSION['error']))?'has-error':''; ?>">
				<label style="color:white">Nouveau mot de passe</label>					
				<input name="password-1" type="password" class="form-control " value="">
			</div>

			<div  class="col-lg-12 form-group <?php echo (isset($_SESSION['error']))?'has-error':''; ?>">
				<label style="color:white">Confirmation du nouveau mot de passe</label>					
				<input name="password-2" type="password" class="form-control " value="">
			</div>

			<input type="hidden" name="return_post_account_pass_change" value="18041997">
			<button type="submit" class="col-lg-4 btn btn-default">Envoyer</button>

		</form>
		</div>
	</div>
</div>
<? unset($_SESSION['error']); // permet de ne pas afficher les erreurs de connection si on reload la page ?>