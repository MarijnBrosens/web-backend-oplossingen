<?php

	if ( isset( $_POST[ 'submit' ] ) ){

		session_start();
		session_destroy();
		header('Location: opdracht-sessions-pagina-02-adresgegevens.php');

	}
	
?>