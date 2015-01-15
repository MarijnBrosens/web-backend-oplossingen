<?php

	session_start();

	function __autoload( $classname )
	{
		require_once( 'classes/' . $classname . '.php' );
	}

	if ( isset( $_POST[ 'submit' ] ) ) 
	{

		$aan 			= 	'hpo82988@kiois.com';
		$titel 			= 	'titel van de mail komt hier';

		$bericht 		= 	$_POST[ 'bericht' ];
		$afzenderEmail 	= 	$_POST[ 'afzenderEmail' ];

		$copy			=	( isset($_POST['copy'] ) ) ? true : false; // checkbox
		
		$headers 		= 	'From: ' . $afzenderEmail ;

		mail( $aan, $titel, $bericht, $headers );

		$message	=	new Message( 'ok', 'mail verzonden'  );
		header( 'location: contact-form.php' );

	} else {

		$message	=	new Message( 'error', 'mail niet verzonden'  );
		header( 'location: contact-form.php' );

	}

?>
