<?php

	session_start();

	function __autoload( $classname ) 
	{
		require_once( $classname . '.php' );
	}

	$connection = new PDO( 'mysql:host=localhost;dbname=db_CRUD_CMS', 'root', '' );

	$db = new Database( $connection );

	if( isset( $_POST['submit'] ) ) {

		$tokens = array(	':id'			=> $_POST['id'],
						  	':titel'        => $_POST['titel'],
		                    ':artikel'      => $_POST['artikel'],
		                    ':kernwoorden'  => $_POST['kernwoorden'],
		                    ':datum'        => $_POST['datum']);

		$wijzigArtikel 	= $db->query(	"	UPDATE
												artikels
											SET
												titel 		= :titel,
												artikel 	= :artikel,
												kernwoorden = :kernwoorden,
												datum 		= :datum
											WHERE
												(
												id 			= :id
												) ", $tokens);


		var_dump( $wijzigArtikel['data'] );

		if ( $wijzigArtikel ) {

			new Message( "ok", "Wijzingen succesvol toegepast" ); 
			header('location: artikel-overzicht.php');

		} else {

			new Message( "error", "Probleem bij het wijzigen" ); 
			header('location: artikel-overzicht.php');

		}


	}




 ?>