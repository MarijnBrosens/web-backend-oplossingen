<?php 

	$voornaam 	= "Marijn";
	$naam 		= "Brosens";
    $volledigeNaam = $voornaam . ' ' . $naam;

    /* 
		Marijn Brosens
		marijn.brosens@student.kdg.be
	*/

?>




<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht string concatenation:deel1</title>
        <link rel="stylesheet" type="text/css" href="../style.css">
    </head>
    <body>
        <h1>Opdracht string-concatentations</h1>
        <pre>
$voornaam   = "Marijn";
$naam       = "Brosens";
$volledigeNaam = $voornaam . ' ' . $naam;
        </pre>
        <p>
        	<?= $voornaam ?>
        	<?= $naam ?>
        </p>
    </body>
</html>