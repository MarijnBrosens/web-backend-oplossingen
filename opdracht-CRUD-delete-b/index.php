<?php

	$geselecteerdeBrouwer	=	false;
	$deleteConfirm			=	false;
	$deleteId				=	false;

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

		if ( isset( $_POST[ 'confirm' ] ) )
		{
			$deleteConfirm	=	true;
			$deleteId		=	$_POST[ 'confirm' ];
		}

		$connection	=	new PDO( 'mysql:host=localhost;dbname=bieren', 'root', '' );
		$db 		= 	new Database( $connection );
		$db->deleteQuery( '	DELETE FROM brouwers
							WHERE brouwernr = :brouwernr');

		$dataArray = $db->selectQuery('	SELECT * 
							FROM brouwers');

		$brouwersFieldnames = $dataArray['brouwersFieldnames'];
		$brouwers 			= $dataArray['brouwers'];

		if ( $deleteId)
		{
			Message::setMessage( $deleteId,'ok');
		}
		else
		{
			Message::setMessage( 'Deze record kon niet verwijderd worden. ', 'error');
		}



	} catch ( PDOException $e ) {

		Message::setMessage( $e->getMessage() , 'error');
	}

	view( 'header.view.php', array( 'title' 	=> 'Opdracht-CRUD-delete', 
									'messages' 	=> Message::getMessages() ) );

	view( 'body.view.php', array(	'brouwersFieldnames'=> $brouwersFieldnames,
									'brouwers' 			=> $brouwers,
									'deleteConfirm'		=> $deleteConfirm,
									'deleteId'			=> $deleteId) );

	view( 'footer.view.php' );

?>