<?php
	$hash = '$2y$10$p2qmTeEThaq3yFbcYcc0huqv3doI8D44emjT3apofEIBsPGVdRgkO';

	if (password_verify('bitebite', $hash)) {
	    echo 'Le mot de passe est valide !';
	} else {
	    echo 'Le mot de passe est invalide.';
	}
?>