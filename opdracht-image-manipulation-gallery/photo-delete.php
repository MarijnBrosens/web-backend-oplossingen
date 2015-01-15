<?php

	session_start();

	function __autoload( $classname )
	{
		require_once( 'classes/' . $classname . '.php' );
	}

	$connection 	=	 new PDO( 'mysql:host=localhost;dbname=db_gallery', 'root', '' );
	$db = new Database( $connection );

	if ( isset( $_POST[ 'submit' ] ) )
	{

		$file_name	=	$_POST[ 'file_name' ];

		$query	=	'UPDATE 
						gallery
					SET 
						is_archived = 1
					WHERE 
					(
						id = :id
					)';

		$tokens	=	array( ':id' => $_POST[ 'id' ] );

		$delete	=	$db->query( $query, $tokens );

		$moveImg	=	rename( 
							'uploads/img/' . $file_name,
							'uploads/bin/' . $file_name );

		$moveThumbs =	rename( 
							'uploads/img/thumbnails/thumb_' . $file_name,
							'uploads/bin/thumb_' . $file_name );

		

		if ( $delete && $moveImg && $moveThumbs )
		{
			$message	=	new Message( 'ok', 'Afbeelding verwijderd.'  );
			header( 'location: gallery.php' );
		
		} else {

			$message	=	new Message( 'error', 'Afbeelding niet verwijderd'  );
			header( 'location: gallery.php' );

		}

	}

?>