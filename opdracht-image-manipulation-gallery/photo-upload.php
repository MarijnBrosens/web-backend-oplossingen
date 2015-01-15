<?php

	session_start();

	function __autoload( $classname )
	{
		include_once( 'classes/' . $classname . '.php' );
	}

	var_dump( $_POST );
	var_dump( $_FILES );

	$connection 	=	 new PDO( 'mysql:host=localhost;dbname=db_gallery', 'root', '' );
	$db = new Database( $connection );


	if ( isset( $_POST[ 'submit' ]  ) )
	{

		if ( empty( $_POST[ 'title' ] ) ) {

			new Message('error', 'je moet een titel invullen!');
			header('location: photo-upload-form.php');

		} elseif ( empty( $_POST[ 'caption' ] ) ) {

			new Message('error', 'geef een beschrijving!');
			header('location: photo-upload-form.php');
							
		} else {


			$image 	=	new Image( 	$_FILES['image']['name'], 
									$_FILES['image']['type'], 
									$_FILES['image']['tmp_name'], 
									$_FILES['image']['error'],
									$_FILES['image']['size'] );

			$isType = 	$image->validateType( array( 	"image/jpeg", 
														"image/png", 
														"image/gif" ) );
			$isSize	=	$image->validateSize( 2000000 ); // 2MB
			$hasError	=	$image->validateError();

			if ( $isType && $isSize && !$hasError )
			{

				$newFileName =  $image->createNewFileName();
				$fileExists =  $image->checkIfFileExists( '../uploads/img/' );

				if ( $fileExists ) {

					$image->createNewFileName();

				}

				$isUploaded = $image->upload( '../uploads/img/' );

				if ( $isUploaded )
				{
					$hasThumbnail	=	$image->createThumb( 50, 50 );

					if ( $hasThumbnail )
					{
						$data['src']	=	$image->getThumbnailFilename();
					}					

					$query	=	'INSERT INTO gallery
												( 
													file_name, 
													title, 
													caption
												)
											VALUES 
												( 
													:file_name, 
													:title, 
													:caption 
												)';

					$tokens	=	array(  ':file_name'=> $image->getFullFilename(),
										':title' 	=> $_POST[ 'title' ],
										':caption' 	=> $_POST[ 'caption' ]);

					$gallery	=	 $db->query( $query, $tokens );



					var_dump($gallery);	
					new Message('ok', 'Image geupload.');
	           		header('location: photo-upload-form.php');				
				}
			}

			//error messages
			if ( !$isType ) {
				
				new Message('error', 'Het bestand moet van het type jpeg, png of gif zijn.');
	            header('location: photo-upload-form.php');

			} 

			if ( !$isSize ) {
				
				new Message('error', 'Het bestand kleiner zijn dan 2MB.');
	            header('location: photo-upload-form.php');

			}

			if ( $hasError ) {

				new Message('error', 'Er is een fout gebeurd bij het uploaden.');
	            header('location: photo-upload-form.php');

			}
		}

	}

?>	