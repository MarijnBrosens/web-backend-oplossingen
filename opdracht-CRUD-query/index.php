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
		$dataArray	=	$db->query( "	SELECT *
										FROM bieren 
										INNER JOIN brouwers
										ON bieren.brouwernr = brouwers.brouwernr
										WHERE bieren.naam LIKE 'du%'
										AND brouwers.brnaam LIKE '%a%'"
									);

		$kolomnamen = $dataArray['kolommen'];
//		var_dump( $kolomnamen );		
		$bieren 	= $dataArray['bieren'];
//		var_dump( $bieren);

		Message::setMessage( 'connectie gelukt' , 'ok');

	} catch ( PDOException $e ) {

		Message::setMessage( $e->getMessage() , 'error');
	}

/*
	try {
		$db = new PDO(	"mysql:host=localhost;dbname=bieren",
						"root",
						"" 
					 );


		$queryString	=	"SELECT *
								FROM bieren 
								INNER JOIN brouwers
								ON bieren.brouwernr = brouwers.brouwernr
								WHERE bieren.naam LIKE 'du%'
								AND brouwers.brnaam LIKE '%a%'";


		$statement = $db->prepare( $queryString );
		$statement->execute();

		$bieren	=	array();

		while ( $row = $statement->fetch( PDO::FETCH_ASSOC ) ) {
			$bieren[] 	=	$row;
		}
		var_dump($bieren);

		$kolommen	=	array();
		$kolommen[]	=	"#";

		foreach( $bieren[0] as $key => $bier ) {
			$kolommen[]	=	$key;
			
		}
		var_dump($kolommen);

		Message::setMessage( 'connectie gelukt' , 'ok');

	} catch ( PDOException $e ) {
		Message::setMessage( $e->getMessage() , 'error');
	}

*/






	view( 'header.view.php', array( 'title' 	=> 'Opdracht-CRUD-query', 
									'messages' 	=> Message::getMessages() ) );

	view( 'body.view.php', array( 	'kolommen' 	=> $kolomnamen, 
									'bieren' 	=> $bieren ) );

	view( 'footer.view.php' );

?>