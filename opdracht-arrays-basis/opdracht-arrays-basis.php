<?php
	
	$dieren 	=	array('hond','kat','haai','slang','schildpad','paard','koe','ezel','spin','varken');
	
	$dieren2[]	=	'hond';
	$dieren2[]	=	'kat';
	$dieren2[]	=	'haai';
	$dieren2[]	=	'slang';
	$dieren2[]	=	'schildpad';
	$dieren2[]	=	'paard';
	$dieren2[]	=	'koe';
	$dieren2[]	=	'ezel';
	$dieren2[]	=	'spin';
	$dieren2[]	=	'varken';

	$voertuigen = array(
		'landvoertuigen' 		=> array('auto', 'vespa','fiets' ),
		'watervoertuigen'		=> array('boot', 'jetski'),
		'luchtvoertuigen'		=> array('vliegtuig', 'helicopter','droid'),
		'ruimtevoertuigen'		=> array('raket'),
		'onderwatervoertuigen'	=> array('duikboot', 'duikerspak')
	);

	var_dump($voertuigen);
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>

	<h1>Opdracht array basis</h1>
	<pre>
$dieren 	=	array('hond','kat','haai','slang','schildpad','paard','koe','ezel','spin','varken');

$dieren2[]	=	'hond';
$dieren2[]	=	'kat';
$dieren2[]	=	'haai';
$dieren2[]	=	'slang';
$dieren2[]	=	'schildpad';
$dieren2[]	=	'paard';
$dieren2[]	=	'koe';
$dieren2[]	=	'ezel';
$dieren2[]	=	'spin';
$dieren2[]	=	'varken';

$voertuigen = array(
	'landvoertuigen' => array('auto', 'vespa','fiets' ),
	'watervoertuigen'=> array('boot', 'jetski'),
	'luchtvoertuigen'=> array('vliegtuig', 'helicopter','droid')
);

var_dump($voertuigen);
	</pre>
</body>
</html>