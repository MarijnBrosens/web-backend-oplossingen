<?php
	
	session_start();

	function __autoload( $classname ) 
	{
		require_once( $classname . '.php' );
	}

	$message    = Message::getMessage();

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
		
		    <h1>Dashboard</h1>

		    <ul>
	            <li><a href="dashboard.php">Back to dashboard</a> </li>
	            <li>Hoi <?= $_COOKIE['authenticated'] ?></li>
	            <li><a href="dashboard.php?logout=true">Uitloggen</a></li>
        	</ul>

	</body>
</head>