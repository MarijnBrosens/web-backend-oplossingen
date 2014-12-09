<?php

	$message			=	false;
	$deleteConfirm		=	false;
	$deleteId			=	false;
	$brouwersEdit		=	false;

	$updateSuccessful 	= 	false;
	$isDeleted			=	false;

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

	try{
		$connection	=	new PDO( 'mysql:host=localhost;dbname=bieren', 'root', '' );
		$db 		= 	new Database( $connection );

		if ( isset( $_POST[ 'confirm-delete' ] ) )
		{
			$deleteConfirm	=	true;
			$deleteId		=	$_POST[ 'confirm-delete' ];
		}

		if ( isset( $_POST[ 'confirm-edit' ] ) )
		{
			$brouwersEdit	=	$db->selectQuery( 'SELECT * FROM brouwers WHERE brouwernr = :brouwernr', array( ':brouwernr' => $_POST[ 'confirm-edit' ] ) );
		}

		if ( isset( $_POST[ 'edit' ] ) )
		{
			$updateQuery	=	$db->updateQuery('	UPDATE brouwers
													SET brnaam 			=	:brnaam,
														adres			=	:adres,
														postcode		=	:postcode,
														gemeente		=	:gemeente,
														omzet			=	:omzet
													WHERE brouwernr		= :brouwernr
													LIMIT 1');

			if ( $updateSuccessful )
			{
				Message::setMessage( 'Update op de brouwer ' . $_POST[ 'brnaam' ] . ' succesvol uitgevoerd.' , 'ok');
			}
			else
			{
				Message::setMessage( 'Update op de brouwer ' . $_POST[ 'brnaam' ] . ' kon niet uitgevoerd worden. Probeer opnieuw. Bij aanhoudende problemen, contacteer de <a href="mailto:bilgates@microsoft.com">systeembeheerder</a>.' , 'error');
			}		

		}

		if ( isset( $_POST['delete'] ) )
		{
			$deleteQuery	=	$db->deleteQuery('	DELETE FROM brouwers
													WHERE brouwernr = :brouwernr');

			if ( $isDeleted )
			{
				Message::setMessage( 'Deze record is succesvol verwijderd.' , 'error');
			}
			else
			{
				Message::setMessage( 'Deze record kon niet verwijderd worden.' , 'error');
			}
		}

		$brouwersQuery	=	$db->selectQuery( 'SELECT * FROM brouwers' ) ;

		$brouwersFieldnames	= 	$brouwersQuery[ 'fieldnames' ];
		$brouwers			=	$brouwersQuery[ 'data' ];

	} catch ( PDOException $e ) {

		Message::setMessage( 'de connectie kon niet worden gemaakt' , 'error');
	}

	view( 'header.view.php', array( 'title' 	=> 'Opdracht-CRUD-delete', 
									'messages' 	=> Message::getMessages() ) );

	view( 'body.view.php', array(	'brouwersFieldnames'=> $brouwersFieldnames,
									'brouwers' 			=> $brouwers,
									'deleteConfirm'		=> $deleteConfirm,
									'brouwersEdit'		=> $brouwersEdit,
									'deleteId'			=> $deleteId) );

	view( 'footer.view.php' );

?>