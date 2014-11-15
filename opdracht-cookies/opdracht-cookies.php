<?php 
	
	//indien er op loguit gedrukt wordt
	if ( isset($_GET['loguit']) == true ) {  

		// verwijder cookie
	    setcookie( 'ingelogd', '', time() - 360 ); 

	    // zorgt voor een refresh van de pagina
	    header( 'location: opdracht-cookies.php' ); 

	}

	$txt 		= file_get_contents( 'txt-bestand.txt' );
	var_dump($txt);
	$txtinhoud 	= explode(',', $txt );
	var_dump($txtinhoud);
	$ingelogd   = false;
	$message    = '';

	//indien niet ingelogd (cookie bestaat ng niet)
	if( isset( !$_COOKIE['ingelogd'] ) ) { 

	    //niet ingelogd
		$message = "U bent uitgelogd.";

		// als er op submit geklikt wordt
	    if (isset($_POST['submit'])) { 

	    	//check of gebruikersnaam/pass overeenkomt met txtbestand
	        if ( $_POST['gebruikersnaam'] == $txtinhoud[0] && $_POST['password'] == $txtinhoud[1] ) { 

				// maak een cookie aan, cookie zal na 6 min niet meer onthouden worden
	            setcookie( 'ingelogd', TRUE, time() + 360 ); 

	            // zorgt voor een refresh van de pagina
	            header( 'location: opdracht-cookies.php' );  

	        } else {

	            $message = "Gebruikersnaam en/of paswoord niet correct. Probeer opnieuw.";

	        }

	    }

	} else { 

		//cookie bestaat al

		$message = "U bent ingelogd.";
	    $ingelogd = true;

	}

	var_dump($_COOKIE);

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht-Cookies</title>
        <!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">-->
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>

    	<p class="error"> <?php echo $message ?></p>

    	<?php if ($ingelogd): ?>

    		<a class="btn" href="opdracht-cookies.php?loguit=true">Uitloggen</a>    		
    	
    	<?php else: ?>

		<form action="opdracht-cookies.php" method="POST">

 			<h1>Opdracht-cookies</h1>
			<ul>
				<li>
					<label for="gebruikersnaam">Gebruikersnaam:</label>
					<input type="text" name="gebruikersnaam" id="gebruikersnaam" value="<?php echo $txtinhoud[0] ?>" >
				</li>
				<li>
					<label for="password">Password:</label>
					<input type="text" name="password" id="password" value="<?php echo $txtinhoud[1] ?>">
					<!--<input type="text" name="password" id="password" value="<?php echo $txtinhoud[1] ?>">-->
				</li>
			</ul>

			<input type="submit" name="submit" id="submit" value="volgende">

        </form>

        
	<?php endif ?>

    </body>
</html>