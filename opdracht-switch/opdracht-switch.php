<?php

$getal		= 	5;
$dag		=	'deze dag bestaat niet';

switch ($getal) {
	case 1:
		$dag	=	'maandag';
		break;
	case 2:
		$dag	=	'dinsdag';
		break;
	case 3:
		$dag	=	'woensdag';
		break;
	case 4:
		$dag	=	'donderdag';
		break;
	case 5:
		$dag	=	'vrijdag';
		break;
	case 6:
		$dag	=	'zaterdag';
		break;
	case 7:
		$dag	=	'zondag';
		break;
	default:
		$dag;
		break;
}

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>

	<h1>Opdracht switch</h1>
	<pre>
$getal		= 	5;
$dag		=	'deze dag bestaat niet';

switch ($getal) {
	case 1:
		$dag	=	'maandag';
		break;
	case 2:
		$dag	=	'dinsdag';
		break;
	case 3:
		$dag	=	'woensdag';
		break;
	case 4:
		$dag	=	'donderdag';
		break;
	case 5:
		$dag	=	'vrijdag';
		break;
	case 6:
		$dag	=	'zaterdag';
		break;
	case 7:
		$dag	=	'zondag';
		break;
	default:
		$dag;
		break;
}

	</pre>
	<p>
		Getal: <?= $getal ?>
	</p>
	<p>
		Dag: <?= $dag ?>
	</p>
</body>
</html>