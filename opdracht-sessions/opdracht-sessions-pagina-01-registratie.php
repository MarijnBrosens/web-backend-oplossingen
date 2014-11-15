<?php 



	session_start();

	if (isset($_SESSION[ 'email']))			{$email 		= $_SESSION[ 'email'];}			else{ $email = '';}

	if (isset($_SESSION[ 'nickname']))		{$nickname 		= $_SESSION[ 'nickname'];}		else{ $nickname = '';}

	if (isset($_SESSION[ 'errorMessage'])) 	{$errorMessage 	= $_SESSION[ 'errorMessage'];}	else{ $errorMessage = '';}

	var_dump( $_SESSION );
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
 			<p class="error"><?php echo $errorMessage ?></p>
			<ul>
				<li>
					<label for="e-mail">Email:</label>
					<input type="text" name="email" id="email" value="<?php echo $email ?>" <?php echo (isset($_GET['focus']) && $_GET['focus']=='email')? 'autofocus' : '' ?> >
				</li>
				<li>
					<label for="nickname">Nickname:</label>
					<input type="text" name="nickname" id="nickname" value="<?php echo $nickname ?>"<?php echo (isset($_GET['focus']) && $_GET['focus']=='nickname')? 'autofocus' : '' ?>>
				</li>
			</ul>

			<input type="submit" name="submit-pagina-01" id="submit-pagina-01" value="volgende">

        </form>

    </body>
</html>