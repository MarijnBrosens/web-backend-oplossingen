<?php
	$fruit1					= 	'kokosnoot';
	$fruit2					=	'ananas';

	$letter1				=	'o';
	$letter2				=	'a';

	$lettertje				=	'e';
	$cijfertje				=	'3';
	$langsteWoord			=	'zandzeepsodemineralenwatersteenstralen';

	$replaceWord			= 	str_replace($lettertje, $cijfertje, $langsteWoord);

	$aantalKarakters		=	strlen($fruit1);

	$positionEersteLetter	=	strpos($fruit1 ,$letter1);
	$positionLaatsteLetter	=	strrpos($fruit2, $letter2);

	$fruit2HOOFDLETTERS		= 	strtoupper($fruit2);

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>

	<h1>String extra functies deel1</h1>
	<pre>strlen($fruit1);</pre>
	<p>Aantal karakters in
		<?= $fruit1 ?>: 
		<?= $aantalKarakters ?>
	</p>
	<pre>strpos($fruit1 ,$letter1);</pre>
	<p>Positie van eerste letter 
		<?= $letter1 ?>
		in
		<?= $fruit1 ?>:
		<?= $positionEersteLetter ?>
	</p>



	<h1>String extra functies deel2</h1>
	<pre>strrpos($fruit2, $letter2);</pre>
	<p>Laatste positie van
		<?= $letter2 ?>
		in
		<?= $fruit2 ?>:
		<?= $positionLaatsteLetter ?>
	</p>
	<pre>strtoupper($fruit2);</pre>
	<p>
		<?= $fruit2 ?>
		in hoofdletters:
		<?= $fruit2HOOFDLETTERS ?>
	</p>

	<h1>String extra functies deel3</h1>
	<pre>str_replace($lettertje, $cijfertje, $langsteWoord);</pre>

	<p>Vervang
		<?= $lettertje ?>
		in
		<?= $cijfertje ?>:
		<?= $langsteWoord ?>:
		<?= $replaceWord ?>
	</p>
</body>
</html>