<?php

	$message			=	false;
	$deleteConfirm		=	false;
	$deleteId			=	false;
	$brouwersEdit		=	false;

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
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '' ); // Connectie maken

		if ( isset( $_POST[ 'confirm-delete' ] ) )
		{
			$deleteConfirm	=	true;
			$deleteId		=	$_POST[ 'confirm-delete' ];
		}

		if ( isset( $_POST[ 'confirm-edit' ] ) )
		{
			/* 	
				Haal data en fieldnames op voor specifieke brouwer 
				dmv een zelfgeschreven functie query() 
			*/
			$brouwersEdit	=	query( $db, 'SELECT * FROM brouwers WHERE brouwernr = :brouwernr', array( ':brouwernr' => $_POST[ 'confirm-edit' ] ) );
		}

		if ( isset( $_POST[ 'edit' ] ) )
		{
			/* 	
				Haal data en fieldnames op voor specifieke brouwer 
				dmv een zelfgeschreven functie query() 
			*/

			$updateQuery	=	'UPDATE brouwers
									SET brnaam 			=	:brnaam,
										adres			=	:adres,
										postcode		=	:postcode,
										gemeente		=	:gemeente,
										omzet			=	:omzet
									WHERE brouwernr		= :brouwernr
									LIMIT 1';

			$statement = $db->prepare( $updateQuery );
			
			$statement->bindValue( ":brouwernr",  	$_POST[ 'brouwernr' ] );						
			$statement->bindValue( ":brnaam",  		$_POST[ 'brnaam' ] );						
			$statement->bindValue( ":adres",  		$_POST[ 'adres' ] );						
			$statement->bindValue( ":postcode",  	$_POST[ 'postcode' ] );						
			$statement->bindValue( ":gemeente",  	$_POST[ 'gemeente' ] );						
			$statement->bindValue( ":omzet",  		$_POST[ 'omzet' ] );

			$updateSuccessful	=	$statement->execute();

			if ( $updateSuccessful )
			{
				$message['type']	=	'success';
				$message['text']	=	'Update op de brouwer ' . $_POST[ 'brnaam' ] . ' succesvol uitgevoerd.';
			}
			else
			{
				$message['type']	=	'error';
				$message['text']	=	'Update op de brouwer ' . $_POST[ 'brnaam' ] . ' kon niet uitgevoerd worden. Probeer opnieuw. Bij aanhoudende problemen, contacteer de <a href="mailto:bilgates@microsoft.com">systeembeheerder</a>.';
			}			

		}

		if ( isset( $_POST['delete'] ) )
		{
			$deleteQuery	=	'DELETE FROM brouwers
									WHERE brouwernr = :brouwernr';

			$deleteStatement = $db->prepare( $deleteQuery );

			$deleteStatement->bindValue( ':brouwernr', $_POST['delete'] );

			$isDeleted 	=	$deleteStatement->execute();

			if ( $isDeleted )
			{
				Message::setMessage( 'Deze record is succesvol verwijderd.' , 'error');
			}
			else
			{
				Message::setMessage( 'Deze record kon niet verwijderd worden.' , 'error');
			}
		}

		$brouwersQuery	=	query( $db, 'SELECT * FROM brouwers' ) ;

		$brouwersFieldnames	= 	$brouwersQuery[ 'fieldnames' ];
		$brouwers			=	$brouwersQuery[ 'data' ];

	} catch ( PDOException $e ) {

		Message::setMessage( 'de connectie kon niet worden gemaakt' , 'error');
	}

		function query( $db, $query, $tokens = false )
		{
			$statement = $db->prepare( $query );
			
			if ( $tokens )
			{
				foreach ( $tokens as $token => $tokenValue )
				{
					$statement->bindParam( $token, $tokenValue );
				}
			}

			$statement->execute();

			/*  Veldnamen ophalen*/
			$fieldnames	=	array();

			for ( $fieldNumber = 0; $fieldNumber < $statement->columnCount(); ++$fieldNumber )
			{
				$fieldnames[]	=	$statement->getColumnMeta( $fieldNumber )['name'];
			}

			/*De brouwer-data ophalen*/
			$data	=	array();

			while( $row = $statement->fetch( PDO::FETCH_ASSOC ) )
			{
				$data[]	=	$row;
			}

			$returnArray['fieldnames']	=	$fieldnames;
			$returnArray['data']		=	$data;

			return $returnArray;
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