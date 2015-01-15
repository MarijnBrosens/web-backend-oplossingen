<?php

	session_start();

	function __autoload( $classname )
	{
		require_once( 'classes/' . $classname . '.php' );
	}

	$message	=	Message::getMessage();

	$connection 	=	 new PDO( 'mysql:host=localhost;dbname=db_gallery', 'root', '' );
	$db = new Database( $connection );

	$query	=	'SELECT * 
				FROM gallery
				WHERE is_archived = 0';

	$images		=	$db->query( $query );
	$imagesData	= 	$images[ 'data' ];

	//var_dump($images);
	var_dump($imagesData);

?>

<!DOCTYPE html>
<html>
<head>

    <title>Opdracht image manipulation gallery</title>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">

</head>
<body>	

	<?php if ( $message ): ?>

		<div class="modal <?php echo $message[ 'type' ] ?>">
			<?php echo $message[ 'text' ] ?>
		</div>

	<?php endif ?>

	<h1>Fotogalerij</h1>

	<hr>

    <ul>
        <li><a href="photo-upload-form.php"><i class="fa fa-arrow-right"></i> Foto toevoegen</a></li>
    </ul>
	

	<?php foreach ( $imagesData as $image): ?>

		<div class="imageThumb">

			<h2><?= $image[ 'title' ] ?></h2>

			<a href="uploads/img/<?= $image[ 'file_name' ] ?>">

				<img src="uploads/img/thumbs/thumbs_<?= $image[ 'file_name' ] ?>" alt="<?= $image[ 'caption' ] ?>">

			</a>
			
			<form action="photo-delete.php" method="POST">
				
				<input type="hidden" name="file_name" value="<?= $image[ 'file_name' ] ?>">
				<input type="hidden" name="id" value="<?= $image[ 'id' ] ?>">

				<input type="submit" name="submit" value="Verwijderen">

			</form>

			<hr>

		</div>

	<?php endforeach ?>
	
</body>
</html>