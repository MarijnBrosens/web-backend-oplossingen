<?php 


	session_start();

	function __autoload( $classname )
	{
		require_once( 'classes/' . $classname . '.php' );
	}

	$connection 	=	 new PDO( 'mysql:host=localhost;dbname=db_ajax', 'root', '' );
	$db = new Database( $connection );

	if ( isset( $_POST[ 'submit' ] ) ) 
	{

		$tokens = array(  	':email'        => $_POST[ 'afzenderEmail' ],
		                    ':message'      => $_POST[ 'bericht' ] );

		$query	=	'	INSERT INTO 
							contact_messages
							(
								email,
								message,
								time_sent
							)														
							VALUES 
							(
								:email,
								:message,
								NOW()
							)';

		$insertEmail = $db->query( $query, $tokens );

		//var_dump( $insertEmail );

		if ( $insertEmail ) {

			$admin 			= 	'hpo82988@kiois.com';
			$titel 			= 	'titel van de mail komt hier';

			$bericht 		= 	$_POST[ 'bericht' ];
			$afzenderEmail 	= 	$_POST[ 'afzenderEmail' ];

			$copy			=	( isset($_POST['copy'] ) ) ? true : false; // checkbox
			
			$headers 		= 	'From: ' . $afzenderEmail ;

			mail( $admin, $titel, $bericht, $headers );

			
			// copie checked
			if ( $copy ) {

				$admin 			= 	$afzenderEmail;
				$titel 			= 	'titel van de mail komt hier';

				$bericht 		= 	$_POST[ 'bericht' ];
				$afzenderEmail 	= 	$_POST[ 'afzenderEmail' ];

				$copy			=	( isset($_POST['copy'] ) ) ? true : false; // checkbox
				
				$headers 		= 	'From: ' . $afzenderEmail ;

				mail( $admin, $titel, $bericht, $headers );

			}

			$message	=	new Message( 'ok', 'mail verzonden'  );
			header( 'location: contact-form.php' );

		} else {

			$message	=	new Message( 'error', 'mail kon niet worden toegevoegd aan de db'  );
			header( 'location: contact-form.php' );

		}


	} else {

		$message	=	new Message( 'error', 'mail niet verzonden'  );
		header( 'location: contact-form.php' );

	}



	// Check of de request een ajax-request was
	if ( !empty( $_SERVER[ 'HTTP_X_REQUESTED_WITH' ] ) && strtolower( $_SERVER[ 'HTTP_X_REQUESTED_WITH' ] ) == 'xmlhttprequest' )
	{
		if ( isset($_POST[ 'email' ] ) )
		{

			$ajaxMessage[ 'type' ]	=	'success';
			echo json_encode( $ajaxMessage );

		}

	}

 ?>