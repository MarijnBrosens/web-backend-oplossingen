<?php
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
		$brouwerArray	=	$db->query( '	SELECT brnaam, brouwernr 
											FROM brouwers');

		$kolomnamen = $brouwerArray['kolommen'];
//		var_dump( $kolomnamen );		
		$brouwers 	= $brouwerArray['brouwers'];
//		var_dump( $bieren);



		// Bieren query die bij brouwer horen
		if ( isset( $_GET[ 'brouwernr' ] ) )
		{
			$geselecteerdeBrouwer	=	$_GET[ 'brouwernr' ];

			$bierenArray	=	$db->query('SELECT bieren.naam
										FROM bieren 
										WHERE bieren.brouwernr = :brouwernr');
		}
		else
		{
			$bierenQueryString	=	'SELECT bieren.naam
										FROM bieren';

			$bierenArray = $db->prepare( $bierenQueryString );
		}








		Message::setMessage( 'connectie gelukt' , 'ok');

	} catch ( PDOException $e ) {

		Message::setMessage( $e->getMessage() , 'error');
	}

	view( 'header.view.php', array( 'title' 	=> 'Opdracht-CRUD-query', 
									'messages' 	=> Message::getMessages() ) );

	view( 'body.view.php', array( 	'kolommen' 	=> $kolomnamen, 
									'brouwers' 	=> $brouwers ) );

	view( 'footer.view.php' );

?>