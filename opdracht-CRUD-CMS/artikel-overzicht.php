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

	$connection = new PDO( 'mysql:host=localhost;dbname=db_CRUD_CMS', 'root', '' );

  	$db = new Database( $connection );

	$alleArtikelsQuery = $db->query('	SELECT
											id, 
											titel, 
											artikel, 
											kernwoorden, 
											datum, 
											is_active, 
											is_archived
				                   		FROM
				                      		artikels ');

	$artikelFieldNames			= 	$alleArtikelsQuery[ 'fieldnames' ];
	$artikels					=	$alleArtikelsQuery[ 'data' ];
	$artikelsTitel				=	$alleArtikelsQuery[ 'data' ][0]['titel'];

	//var_dump($artikels);

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

    	<h1>Overzicht van de artikels</h1>

    	<hr>

    	<ul>
            <li><a href="artikel-toevoegen-form.php">Nieuw artikel</a></li>
        </ul>

		<div class="row">

			<?php foreach ( $artikels as $key => $artikel ): ?>

				<div class="col-lg-4">

					<article class="<?= ($artikels[$key]['is_active'] == 0) ? 'onactief' : 'actief'  ?>">
						<h2>Titel: <?php echo $artikels[$key]['titel']  ?>				</h2>
						<p>Artikel: <?php echo $artikels[$key]['artikel']  ?>			</p>
						<p>Kernwoorden: <?php echo $artikels[$key]['kernwoorden']  ?>	</p>
						<p>Datum: <?php echo $artikels[$key]['datum']  ?>				</p>	

						<hr>

						<p>
	                        <a href="artikel-wijzigen-form.php?artikel=<?= ( $artikels[$key]['id'] ) ?>">artikel wijzigen</a> |
	                        <a href="artikel-activeren.php?artikel=<?= ( $artikels[$key]['id'] ) ?>"> <?= ( $artikels[$key]['is_active'] == 0) ? 'artikel activeren' : 'artikel deactiveren'  ?></a> |
	                        <a href="artikel-verwijderen.php?artikel=<?= ( $artikels[$key]['id'] ) ?>"><?= ( $artikels[$key]['is_archived'] == 0) ? 'artikel verwijderen' : 'artikel uit archief halen'  ?></a>
	                    </p>					
					</article>	
					
				</div>

			<?php endforeach ?>	

		</div>

    </body>
</head>