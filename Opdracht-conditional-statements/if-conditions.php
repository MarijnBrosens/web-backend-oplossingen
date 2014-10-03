<?php

$getal 	= 	3;
$dag 	=	'dag 0 bestaat niet';

if ($getal == 1) {
	$dag='maandag';
}
if ($getal ==2) {
	$dag='dinsdag';
}
if ($getal == 3) {
	$dag='woensdag';
}
if ($getal == 4) {
	$dag='donderdag';
}
if ($getal == 5) {
	$dag='vrijdag';
}
if ($getal == 6) {
	$dag='zaterdag';
}
if ($getal == 7) {
	$dag='zondag';
}

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>

	<h1>Opdracht if-conditions</h1>
	<pre>

$getal 	= 	3;
$dag 	=	'dag 0 bestaat niet';

if ($getal == 1) {
	$dag='maandag';
}
if ($getal ==2) {
	$dag='dinsdag';
}
if ($getal == 3) {
	$dag='woensdag';
}
if ($getal == 4) {
	$dag='donderdag';
}
if ($getal == 5) {
	$dag='vrijdag';
}
if ($getal == 6) {
	$dag='zaterdag';
}
if ($getal == 7) {
	$dag='zondag';
}


	</pre>


	<p><?= $dag ?></p>
</body>
</html>