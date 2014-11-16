<?php

	$username	=	"Marijn";
	$password	=	"azerty";
	$message	=	"niets ingevuld";
	$error		=	false;

	//var_dump( $_POST);
	//var_dump( $message);

	
	//if ( isset ( $_POST ['username']  ) && isset ( $_POST ['password']  ))
	if ( isset ( $_POST ['submit'] ) )
	{

		$inputUsername = $_POST['username'];
		$inputPassword = $_POST['password'];

		// Controleren of de opgevraagde key (=id) bestaat in de array $artikels
		if ( $username ==  $inputUsername && $password == $inputPassword)
		{
			$error		= 	false;
			$message	=	"Welkom";
		}
		else
		{
			$error		=	true;
			$message	=	"Er ging iets mis bij het inloggen, probeer opnieuw";
		}		
	}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Opdracht post</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>

<body>

		<h1>$_POST</h1>
		<form action="opdracht-post.php" method="POST">

			<ul>
				<li>
					<label for="username">Username:</label>
					<input type="text" name="username" id="username" value="marijn">
				</li>
				<li>
					<label for="password">Paswoord:</label>
					<input type="password" name="password" id="password" value="azerty">
				</li>
			</ul>

			<input type="submit" name="submit" value="Verzend">
		</form>

		<?php if (!$error): ?>
			<p><?php echo $message ?></p>
		<?php else: ?>
			<p class="error"><?php echo $message ?></p>
		<?php endif ?>		

</body>
</html>