<?php 

	session_start();

	function __autoload( $classname ) 
	{
		require_once( $classname . '.php' );
	}

	$connection = new PDO( 'mysql:host=localhost;dbname=db_CRUD_CMS', 'root', '' );

	$db = new Database( $connection );

	$toggleArticleId =   $_GET['artikel'] ;

	$artikelActiveren = $db->query( "	UPDATE 	artikels
										SET 	is_active =	!is_active
										WHERE 	(id = $toggleArticleId)");


	var_dump($artikelActiveren);

	header( 'location: artikel-overzicht.php' );


 ?>