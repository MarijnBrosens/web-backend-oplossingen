<?php

	$message			=	false;

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
		
		$orderColumn	=	'bieren.biernr';
		$order			=	'ASC';

		if ( isset( $_GET[ 'orderBy' ] ) )
		{
			$orderArray		=	explode( '-', $_GET[ 'orderBy' ] );
			$orderColumn	=	$orderArray[ 0 ];

			$order		=	$orderArray[ 1 ];
		}

		$orderQuery		=	'ORDER BY ' . $orderColumn . ' ' . $order;

		// Om ASC-ASC-ASC-ASC val tegen te gaan
		// Om DESC-DESC-DESC-DESC val tegen te gaan
		// OM het omgekeerde (asc tonen ipv desc) tegen te gaan
		// OM het omgekeerde (desc tonen ipv asc) tegen te gaan
		if ( isset( $_GET[ 'orderBy' ] ) )
		{
			$order = ( $orderArray[ 1 ] != 'DESC') ? 'DESC' 	:	'ASC';
		}

		$query	=	'SELECT bieren.biernr,
							bieren.naam,
							brouwers.brnaam,
							soorten.soort,
							bieren.alcohol 
						FROM bieren 
							INNER JOIN brouwers
							ON bieren.brouwernr	= brouwers.brouwernr
							INNER JOIN soorten
							ON bieren.soortnr = soorten.soortnr '
							. $orderQuery;

		$bierenQuery =  $db->query( $query );

		//var_dump($bierenQuery);

		$bierenFieldnames		= 	$bierenQuery[ 'fieldnames' ];
		$bierenCleanFieldnames	= 	processFieldnames( $bierenFieldnames );
		$bieren					=	$bierenQuery[ 'data' ];

	} catch ( PDOException $e ) {

		Message::setMessage( 'de connectie kon niet worden gemaakt' , 'error');
	}

	function processFieldnames( $array )
	{

		$cleanFieldnames	=	array();

		foreach( $array as $value )
		{
			switch( $value )
			{
				case "biernr":
					$name	=	"Biernummer (PK)";
					break;
				case "naam":
					$name	=	"Bier";
					break;
				case "brnaam":
					$name	=	"Brouwer";
					break;
				case "soort":
					$name	=	"Soort";
					break;
				case "alcohol":
					$name	=	"Alcoholpercentage";
					break;
				default:
					$name	=	$value;
			}

			$cleanFieldnames[ ]	=	$name;
		}

		return $cleanFieldnames;
	}

	view( 'header.view.php', array( 'title' 	=> 'Opdracht-CRUD-delete', 
									'messages' 	=> Message::getMessages() ) );

	view( 'body.view.php', array(	'bierenCleanFieldnames'	=> $bierenCleanFieldnames,
									'order'					=> $order,
									'bierenFieldnames'		=> $bierenFieldnames,
									'orderColumn'			=> $orderColumn, 
									'bieren' 				=> $bieren) );

	view( 'footer.view.php' );

?>