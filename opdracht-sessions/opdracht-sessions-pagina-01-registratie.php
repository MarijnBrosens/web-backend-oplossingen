<?php 

	session_start();
	var_dump( $_SESSION );

	$email 		=	$_SESSION[ 'email'];					
	$nickname 	=	$_SESSION[ 'nickname'];

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>pagina-01-registratie</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>

		<form action="opdracht-sessions-pagina-02-adresgegevens.php" method="POST">

 			<h1>Opdracht-sessions-pagina-01-registratie</h1>
			<ul>
				<li>
					<label for="e-mail">Email:</label>
					<input type="text" name="email" id="email" value="e-mail">
				</li>
				<li>
					<label for="nickname">Nickname:</label>
					<input type="text" name="nickname" id="nickname" value="nickname">
				</li>
			</ul>

			<input type="submit" name="submit" id="submit" value="volgende">

        </form>

    </body>
</html>