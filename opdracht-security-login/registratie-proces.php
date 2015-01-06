<?php
	
	session_start();

	$message			=	false;


	// generate password
	if(isset($_POST['generate-Password'])) {

	    $generatedPassword = generatePassword(20);

	    var_dump($generatedPassword);

	    $_SESSION['registration']['email']      = $_POST['email'];
	    $_SESSION['registration']['password']   = $generatedPassword;

	    header('location: registratie-form.php');
	}


	//willekeurig passwoord maken - geef een lengte mee van passwoord
	function generatePassword($length){

		$chars = "0123456789abcdefghijklmnopqrstuvwxyz!@#$%^&*()_-=+;:,.?ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	    $password = substr(str_shuffle($chars), 0, $length);

	    var_dump($password);
	    return $password;

	}

?>