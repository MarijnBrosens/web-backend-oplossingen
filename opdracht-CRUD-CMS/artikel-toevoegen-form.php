<?php
	
	session_start();

	function __autoload( $classname ) 
	{
		require_once( $classname . '.php' );
	}

	$message    = Message::getMessage();
	$email      = $_SESSION['login']['email'];

	if(!isset($_COOKIE['authenticated'])) {

	    header('location: login-form.php');

	}

	// uitloggen
	if(isset($_GET['logout'])) {

	    setcookie('authenticated', TRUE, time() - 60*60*24*30);
	    header('location: login-form.php');

	}
?>

<!DOCTYPE html>
	<html>
	<head>
		<title>Opdracht CRUD CMS</title>
		<link rel="stylesheet" type="text/css" href="../style.css">
	</head>
	<body>
		
			<?php if ( isset ( $message ) ): ?>
				<div class="modal <?= $message['type'] ?>">
					<?= $message['text'] ?>
				</div>
			<?php endif ?>
		
			

		    <ul>
	            <li><a href="dashboard.php">Terug naar dashboard</a></li>
	            <li>Ingelogd als <?= $email ?></li>
	            <li><a href="dashboard.php?logout=true">Uitloggen</a></li>
        	</ul>

        	<h1>Artikel toevoegen</h1>
        	<hr>

        	<form action="artikel-toevoegen-process.php" method="post">
	            <ul>
	                <li>
	                    <label for="titel">Titel</label>
	                    <input type="text" name="titel" id="titel" placeholder="Titel">
	                </li>
	                <li>
	                    <label for="artikel">Artikel</label>
	                    <textarea type="text" name="artikel" id="artikel" placeholder="Artikel"></textarea>
	                </li>
	                <li>
	                    <label for="kernwoorden">Kernwoorden</label>
	                    <input type="text" name="kernwoorden" id="kernwoorden" placeholder="Kernwoorden">
	                </li>
	                <li>
	                    <label for="datum">Datum (jjjj-mm-dd)</label>
	                    <input type="text" name="datum" id="datum" placeholder="Datum">
	                </li>
	            </ul>
	            <input class="button" name="submit" type="submit" value="Artikel toevoegen">
	        </form>
	</body>
</head>