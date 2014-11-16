<?php 

	//var_dump( $GLOBALS);

	$artikels = array(		
					array( 	'titel' 				=> 'Halowkes1' , 
							'datum' 				=> '20 aug 2014' , 
							'inhoud' 				=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dictum, ligula et imperdiet gravida, nisl magna accumsan dui, sit amet porta felis odio ac arcu. Maecenas tellus leo, tempor a odio id, placerat pulvinar arcu. Proin mi est, tristique non turpis nec, dictum aliquam mauris. Cras condimentum sed dolor quis rutrum. Nam ut placerat nulla. Fusce dolor tellus, finibus sed iaculis eget, mattis eget nunc. Nam egestas turpis non ante pretium laoreet. Nulla pharetra, leo a eleifend egestas, justo tellus tincidunt lacus, sagittis blandit purus justo at purus. Praesent vehicula justo dolor. Nulla eu volutpat metus. Donec laoreet eu neque sit amet dignissim. Sed a suscipit tortor, fermentum tempor augue. Proin congue ante sed pretium dictum. Nullam nisi eros, fermentum at eros at, porta mollis lorem. Mauris lacus massa, dapibus eu leo quis, placerat tristique elit.' , 
							'afbeelding' 			=> 'img-01.jpg' , 
							'afbeeldingBeschrijving'=> 'afbeelding1'),

					array( 	'titel' 				=> 'Halowkes2' , 	
							'datum' 				=> '25 sep 2014' , 
							'inhoud' 				=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dictum, ligula et imperdiet gravida, nisl magna accumsan dui, sit amet porta felis odio ac arcu. Maecenas tellus leo, tempor a odio id, placerat pulvinar arcu. Proin mi est, tristique non turpis nec, dictum aliquam mauris. Cras condimentum sed dolor quis rutrum. Nam ut placerat nulla. Fusce dolor tellus, finibus sed iaculis eget, mattis eget nunc. Nam egestas turpis non ante pretium laoreet. Nulla pharetra, leo a eleifend egestas, justo tellus tincidunt lacus, sagittis blandit purus justo at purus. Praesent vehicula justo dolor. Nulla eu volutpat metus. Donec laoreet eu neque sit amet dignissim. Sed a suscipit tortor, fermentum tempor augue. Proin congue ante sed pretium dictum. Nullam nisi eros, fermentum at eros at, porta mollis lorem. Mauris lacus massa, dapibus eu leo quis, placerat tristique elit.' , 
							'afbeelding' 			=> 'img-02.jpg' , 
							'afbeeldingBeschrijving'=> 'afbeelding2'),

					array( 	'titel' 				=> 'Halowkes3' , 	
							'datum' 				=> '26 sep 2014' , 
							'inhoud' 				=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dictum, ligula et imperdiet gravida, nisl magna accumsan dui, sit amet porta felis odio ac arcu. Maecenas tellus leo, tempor a odio id, placerat pulvinar arcu. Proin mi est, tristique non turpis nec, dictum aliquam mauris. Cras condimentum sed dolor quis rutrum. Nam ut placerat nulla. Fusce dolor tellus, finibus sed iaculis eget, mattis eget nunc. Nam egestas turpis non ante pretium laoreet. Nulla pharetra, leo a eleifend egestas, justo tellus tincidunt lacus, sagittis blandit purus justo at purus. Praesent vehicula justo dolor. Nulla eu volutpat metus. Donec laoreet eu neque sit amet dignissim. Sed a suscipit tortor, fermentum tempor augue. Proin congue ante sed pretium dictum. Nullam nisi eros, fermentum at eros at, porta mollis lorem. Mauris lacus massa, dapibus eu leo quis, placerat tristique elit.' , 
							'afbeelding' 			=> 'img-03.jpg' , 
							'afbeeldingBeschrijving'=> 'afbeelding3')
				);//einde artikel	


	// Configuratie-variabelen
	$individueelArtikel		=	false;
	$nietBestaandArtikel	=	false;

	// Controleren of de get-variabele ID geset is om een individueel artikel op te halen
	if ( isset ( $_GET['id'] ) )
	{
		$id = $_GET['id'];

		// Controleren of de opgevraagde key (=id) bestaat in de array $artikels
		if ( array_key_exists( $id , $artikels ) )
		{
			$artikels 			= 	array( $artikels[$id] );
			$individueelArtikel	=	true;
		}
		else
		{
			$nietBestaandArtikel=	true;
		}		
	}


	if ( isset ( $_GET['keyWord'] ) )
	{
		$keyWord = $_GET['keyWord'];

		// Controleren of de opgevraagde key (=id) bestaat in de array $artikels
		if ( stristr( $keyWord , $artikels ) )
		{
			foreach($artikels as $key => $arrayItem){
				        if( stristr( $arrayItem, $keyword ) ){
				            return $key;
				        }
				    }
		}
		else
		{
			$nietBestaandArtikel=	true;
		}		
	}

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">

        	<?php if ( !$individueelArtikel ): ?>
				<title>Oplossing get: deel1</title>
			<?php elseif ( $nietBestaandArtikel ): ?>
				<title>Het artikel met id <?php echo $id ?> bestaat niet</title>
			<?php else: ?>
				<title>Artikel: <?php echo $artikels[0]['titel'] ?></title>
			<?php endif ?>

        <link rel="stylesheet" type="text/css" href="../style.css">
    </head>
    <body>
	<div class="container">
	<h1><a href="opdracht-get.php">Opdracht GET</a></h1>

		<form action="?keyWord=<?php echo $key ?>" method="get">

			<input type="text" name="keyWord" id="email">
			<input type="submit" value="Verzend">

		</form>




		<p>Inhoud van $_GET: <pre><?php print_r( $_GET ) ?></pre></p>
		<p>Inhoud van $_GET['keyWord']: <?php echo $_GET['keyWord'] ?></p>

	</div>
	<pre></pre>
	<div class="container">
		<div class="row">
			<?php if (!$nietBestaandArtikel): ?>

				<?php foreach ($artikels as $key => $artikel): ?>

		        	<?php if ( !$individueelArtikel ): ?>
						<div class="col-lg-4 ">
					<?php else: ?>
						<div class="col-lg-12 single-article">
					<?php endif ?>	
						<article>
							<h2> <?php echo $artikel['titel'] ?> </h2>
							<span> <?php echo $artikel['datum'] ?> </span>
							<img src="img/<?php echo $artikel['afbeelding'] ?>" alt="<?php echo $artikel['afbeeldingBeschrijving'] ?>">

							<?php if ( !$individueelArtikel ): ?>						
								<p>	 <?php echo substr($artikel['inhoud'], 0,50)  ?> </p>
							<?php else: ?>
								<p>	 <?php echo $artikel['inhoud'] ?> </p>
							<?php endif ?>	


							<?php if ( !$individueelArtikel ): ?>
								<a class="button" href="?id=<?php echo $key ?>"> lees meer </a>
							<?php else: ?>
								<a class="button" href="opdracht-get.php"> terug </a>
							<?php endif ?>
						</article>	

					</div><!--/ col-lg-12 -->

				<?php endforeach ?>	

			<?php else: ?>

				<p>Het artikel met id <?php echo $id ?> bestaat niet.</p>

			<?php endif ?>

			</div><!--/col-lg-4 -->

		</div><!--/row-->
	</div><!--/container-->
    </body>
</html>