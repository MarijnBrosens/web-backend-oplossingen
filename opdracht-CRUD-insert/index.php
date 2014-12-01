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
		$brouwerArray	=	$db->query( '	INSERT INTO brouwers 
														(brnaam, adres, postcode, gemeente, omzet)
											VALUES ( :brnaam, :adres, :postcode, :gemeente, :omzet )');

		$kolomnamen = $brouwerArray['kolommen'];



		Message::setMessage( 'connectie gelukt' , 'ok');

	} catch ( PDOException $e ) {

		Message::setMessage( $e->getMessage() , 'error');
	}

	view( 'header.view.php', array( 'title' 	=> 'Opdracht-CRUD-query', 
									'messages' 	=> Message::getMessages() ) );

	view( 'body.view.php', array( 	'kolommen' 	=> $kolomnamen) );

	view( 'footer.view.php' );

?>