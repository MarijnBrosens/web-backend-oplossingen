<?php

$getal		= 	79;
$minGetal 	= 	0;
$maxGetal	= 	10;

if ($getal <= 10) {
	$minGetal 	= 	0;
	$maxGetal	=	10;
}elseif ($getal > 10 && $getal <= 20) {
	$minGetal	=	10;
	$maxGetal	=	20;
}elseif ($getal > 20 && $getal <= 30) {
	$minGetal	=	20;
	$maxGetal	=	30;
}elseif ($getal > 30 && $getal <= 40) {
	$minGetal	=	30;
	$maxGetal	=	40;
}elseif ($getal > 40 && $getal <= 50) {
	$minGetal	=	40;
	$maxGetal	=	50;
}elseif ($getal > 50 && $getal <= 60) {
	$minGetal	=	50;
	$maxGetal	=	60;
}elseif ($getal > 60 && $getal <= 70) {
	$minGetal	=	60;
	$maxGetal	=	70;
}elseif ($getal > 70 && $getal <= 80) {
	$minGetal	=	70;
	$maxGetal	=	80;
}elseif ($getal > 80 && $getal <= 90) {
	$minGetal	=	80;
	$maxGetal	=	90;
}elseif ($getal > 90 && $getal <= 100) {
	$minGetal	=	90;
	$maxGetal	=	100;
}

$text			=	'Het getal: ' . $getal  . ' ligt tussen ' . $minGetal . ' en ' . $maxGetal;
$omgekeerdeText	=	strrev($text);

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>

	<h1>String extra functies deel1</h1>
	<pre>
$getal		= 	79;
$minGetal 	= 	0;
$maxGetal	= 	10;

if ($getal <= 10) {
	$minGetal 	= 	0;
	$maxGetal	=	10;
}elseif ($getal > 10 && $getal <= 20) {
	$minGetal	=	10;
	$maxGetal	=	20;
}elseif ($getal > 20 && $getal <= 30) {
	$minGetal	=	20;
	$maxGetal	=	30;
}elseif ($getal > 30 && $getal <= 40) {
	$minGetal	=	30;
	$maxGetal	=	40;
}elseif ($getal > 40 && $getal <= 50) {
	$minGetal	=	40;
	$maxGetal	=	50;
}elseif ($getal > 50 && $getal <= 60) {
	$minGetal	=	50;
	$maxGetal	=	60;
}elseif ($getal > 60 && $getal <= 70) {
	$minGetal	=	60;
	$maxGetal	=	70;
}elseif ($getal > 70 && $getal <= 80) {
	$minGetal	=	70;
	$maxGetal	=	80;
}elseif ($getal > 80 && $getal <= 90) {
	$minGetal	=	80;
	$maxGetal	=	90;
}elseif ($getal > 90 && $getal <= 100) {
	$minGetal	=	90;
	$maxGetal	=	100;
}

$text			=	'Het getal: ' . $getal  . ' ligt tussen ' . $minGetal . ' en ' . $maxGetal;
$omgekeerdeText	=	strrev($text);
	</pre>
	<p>
		<?= $text ?>
	</p>
	<p>		
		<?= $omgekeerdeText ?>
	</p>
</body>
</html>