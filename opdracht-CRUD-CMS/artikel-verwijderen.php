<?php 

	session_start();

	function __autoload( $classname ) 
	{
		require_once( $classname . '.php' );
	}

	$connection = new PDO( 'mysql:host=localhost;dbname=db_CRUD_CMS', 'root', '' );

	$db = new Database( $connection );

	$toggleArticleId =   $_GET['artikel'] ;

	$artikelArchiveren	= $db->query( "	UPDATE 	artikels
										SET 	is_archived =	!is_archived
										WHERE 	(id = $toggleArticleId)");


	var_dump($toggleArticleId);

	if(isset($_GET['artikel'])) {

		new Message( "ok", "artikel succesvol geactiveerd (getoggled)." ); 
		header( 'location: artikel-overzicht.php' );

	} else {

		new Message( "ok", "artikel kon niet worden geactiveerd." ); 
		header( 'location: artikel-overzicht.php' );

	}

 ?>