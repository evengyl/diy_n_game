<div class="col-lg-12 col-without-padding connect-form">		
	<form action="#" method="post" class="col-lg-8 col-lg-offset-2">

		<div style="float:left;" class="col-lg-4 form-group <?php echo (isset($_SESSION['error']))?'has-error':''; ?>">
			<?php echo (isset($_SESSION['error']))?'<label for="exampleInputPassword1">'.$_SESSION['error'].'</label>':''; ?>
			<input name="pseudo" type="text" class="form-control " required placeholder="Pseudo">
		</div>

		<div style="float:left;" class="col-lg-4 form-group <?php echo (isset($_SESSION['error']))?'has-error':''; ?>">
			<input name="password" type="password" class="form-control" required placeholder="Mot de passe">
		</div>
		<input type="hidden" name="return_form_complet" value="1">
		<button type="submit" class="col-lg-4 btn btn-default">Connexion</button>

	</form>
</div>