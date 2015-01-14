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

	//var_dump( $_SESSION );
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

        	<h1>Dashboard</h1>

        	<hr>

        	<ul>
                <li><a href="artikel-overzicht.php">Artikels</a></li>
                <li><a href="gegevens-wijzigen-form.php"></a></li>
            </ul>

	</body>
</head>