<?php

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

		$db = new PDO(	"mysql:host=localhost;dbname=bieren",
						"root",
						"" 
					 );

		$queryString	=	"SELECT bieren.brouwernr, brouwers.brnaam
								FROM bieren 
								INNER JOIN brouwers
								ON bieren.brouwernr = brouwers.brouwernr
								WHERE bieren.naam LIKE 'du%'
								AND brouwers.brnaam LIKE '%a%'";

		$statement = $db->prepare( $queryString );
		$statement->execute();

		var_dump($statement);
		var_dump($statement->fetch( PDO::FETCH_ASSOC ));

		$bieren	=	array();

		while ( $row = $statement->fetch( PDO::FETCH_ASSOC ) ) {
			$bieren[] 	=	$row;
			//var_dump($bieren);
		}

		$brouwers = array();

		foreach( $bieren as $key => $bier ) {
			$brouwers[]	=	$key;
			var_dump($brouwers);
		}
/*
		$kolommen	=	array();
		$kolommen[]	=	"#";

		foreach( $bieren[0] as $key => $bier ) {
			$kolommen[]	=	$key;
		}
*/
		Message::setMessage( 'connectie gelukt' , 'ok');

	} catch ( PDOException $e ) {

		Message::setMessage( $e->getMessage() , 'error');

		/*$message['type']	=	'error';
		$message['text']	=	$e->getMessage();*/
	}

	view( 'header.view.php', array( 'title' 	=> 'Opdracht-CRUD-query', 
									'messages' 	=> Message::getMessages() ) );
/*
	view( 'body.view.php', array( 	'kolommen' 	=> $kolommen, 
									'bieren' 	=> $bieren ) );
*/
	view( 'footer.view.php' );

?>