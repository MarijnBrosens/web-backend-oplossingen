<?php  

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

		$kolommen	=	array();
		$kolommen[]	=	"#";

		foreach( $bieren[0] as $key => $bier ) {
			$kolommen[]	=	$key;
		}

		Message::setMessage( 'connectie gelukt' , 'ok');

	} catch ( PDOException $e ) {

		Message::setMessage( $e->getMessage() , 'error');

		/*$message['type']	=	'error';
		$message['text']	=	$e->getMessage();*/
	}

?>