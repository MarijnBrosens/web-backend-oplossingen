<?php

	$geselecteerdeBrouwer	=	false;

	//opdracht-Security-login bekijken
	spl_autoload_register(  function( $class ) { include_once( $class .'.php' ); } );

	function view( $file, $data = false )
	{
		if ( $data )
		{
			extract( $data );
		} 

		include( $file );
	}


	try {

		$connection	=	new PDO( 'mysql:host=localhost;dbname=bieren', 'root', '' );
		$db 		= 	new Database( $connection );
		$db->deleteQuery( '	DELETE FROM brouwers
							WHERE brouwernr = :brouwernr');

		$dataArray = $db->selectQuery('	SELECT * 
							FROM brouwers');

		$brouwersFieldnames = $dataArray['brouwersFieldnames'];
		$brouwers 			= $dataArray['brouwers'];

	} catch ( PDOException $e ) {

		Message::setMessage( $e->getMessage() , 'error');
	}

	view( 'header.view.php', array( 'title' 	=> 'Opdracht-CRUD-delete', 
									'messages' 	=> Message::getMessages() ) );

	view( 'body.view.php', array('brouwersFieldnames' => $brouwersFieldnames,'brouwers' => $brouwers) );

	view( 'footer.view.php' );

?>