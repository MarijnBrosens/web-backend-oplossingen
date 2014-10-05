<?php
	
	$dieren 		=	array('hond','kat','haai','slang','schildpad','paard','koe','ezel','varken');	
	$aantaldieren	= 	count($dieren);
	$teZoekenDier	=	'hond';
	$resultaatZoekOpdracht	= 'vul iets in';

	if (in_array($teZoekenDier, $dieren) ) {
		$resultaatZoekOpdracht 	=	'jep, gevonden';
	}else{
		$resultaatZoekOpdracht	=	'niet gevonden';
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
$dieren 		=	array('hond','kat','haai','slang','schildpad','paard','koe','ezel','varken');	
$aantaldieren	= 	count($dieren);
$teZoekenDier	=	'hond';
$resultaatZoekOpdracht	= 'vul iets in';

if (in_array($teZoekenDier, $dieren) ) {
	$resultaatZoekOpdracht 	=	'jep, gevonden';
}else{
	$resultaatZoekOpdracht	=	'niet gevonden';
}
	</pre>
	<p>
		Aantal dieren in '$dieren' = <?= $aantaldieren ?>
	</p>
	<p>
		Te zoeken dier = <?= $teZoekenDier ?>
	</p>
	<p>
		<?= $resultaatZoekOpdracht ?>
	</p>
</body>
</html>