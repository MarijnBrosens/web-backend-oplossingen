<?php
	
	session_start();

	function __autoload( $classname ) 
	{
		require_once( $classname . '.php' );
	}


	if(!isset($_COOKIE['authenticated'])) {

	    header('location: login-form.php');

	}

	// uitloggen
	if(isset($_GET['logout'])) {

	    $notification = 'ingelogd';
	    $_SESSION['notification'] = $notification;

	    setcookie('authenticated', TRUE, time() - 60*60*24*30);
	    header('location: login-form.php');

	}

	//var_dump( $_SESSION );
?>

<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="../style.css">
	</head>
	<body>
		
			<?php if ( isset ( $message ) ): ?>
				<div class="modal <?= $message['type'] ?>">
					<?= $message['text'] ?>
				</div>
			<?php endif ?>
		
		    <h1>Dashboard</h1>

    		<p>hoi</p>

    	<a href="dashboard.php?logout=true">Uitloggen</a>

	</body>
</head>