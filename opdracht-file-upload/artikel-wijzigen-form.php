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

	$connection = new PDO( 'mysql:host=localhost;dbname=db_file_upload', 'root', '' );

  	$db = new Database( $connection );

  	$wijzigArticleId =   $_GET['artikel'];

	$alleArtikelsQuery = $db->query( "	SELECT
											id, 
											titel, 
											artikel, 
											kernwoorden, 
											datum, 
											is_active, 
											is_archived
				                   		FROM
				                      		artikels 
										WHERE 	( id = $wijzigArticleId )");

	$artikelFieldNames			= 	$alleArtikelsQuery[ 'fieldnames' ];
	$artikels					=	$alleArtikelsQuery[ 'data' ];

	var_dump( $artikels[0]['id'] );


	// uitloggen
	if( isset($_GET['logout']) ) {

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

    	<h1>Artikel bewerken</h1>
    	<hr>

    	<form action="artikel-wijzigen-process.php" method="post">
            <ul>
                <li>
                    <label for="titel">Titel</label>
                    <input type="text" name="titel" id="titel" placeholder="Titel" value="<?php echo $artikels[0]['titel']  ?>">
                </li>
                <li>
                    <label for="artikel">Artikel</label>
                    <textarea type="text" name="artikel" id="artikel" placeholder="Artikel"><?php echo $artikels[0]['artikel']  ?>
                    </textarea>
                </li>
                <li>
                    <label for="kernwoorden">Kernwoorden</label>
                    <input type="text" name="kernwoorden" id="kernwoorden" placeholder="Kernwoorden" value="<?php echo $artikels[0]['kernwoorden']  ?>">
                </li>
                <li>
                    <label for="datum">Datum (jjjj-mm-dd)</label>
                    <input type="text" name="datum" id="datum" placeholder="Datum" value="<?php echo $artikels[0]['datum']  ?>">
                </li>
            </ul>
            
            <input type="hidden" name="id" id="id" placeholder="id" value="<?php echo $artikels[0]['id']  ?>">

            <input class="button" name="submit" type="submit" value="Artikel wijzigen">
        </form>	

	</body>
</head>