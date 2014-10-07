<?php 

	$erfenisInEuro		=	100000;
	$rentevoetInPercent	=	8;
	$termijnInJaar		=	10;


	function berekenEindBedrag( $erfenisInEuro,$rentevoetInPercent,$termijnInJaar ) 
	{
		static $aantalJaarSindsBegin	=	1;
		static $arrayMetResultaten		=	array();

		$winstPerJaar			=	$erfenisInEuro*($rentevoetInPercent/100);
		$totaalDitJaar			=	$erfenisInEuro+$winstPerJaar;

		$arrayMetResultaten[] .= $aantalJaarSindsBegin . ' jaar - totaal bedrag ' . floor($totaalDitJaar) . ' - winst dit jaar ' . floor($winstPerJaar).  ' euro.';

		if ($aantalJaarSindsBegin<$termijnInJaar) {
			$aantalJaarSindsBegin++;
			return berekenEindBedrag($totaalDitJaar,$rentevoetInPercent,$termijnInJaar);
		}

		return $arrayMetResultaten;
	}

	$winst = berekenEindBedrag( $erfenisInEuro, $rentevoetInPercent, $termijnInJaar );
 ?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../style.css">
    </head>
    <body>
	
	<h1>Opdracht recursive: deel 1</h1>
	<pre>
static $aantalJaarSindsBegin	=	1;
static $arrayMetResultaten		=	array();

$winstPerJaar			=	$erfenisInEuro*($rentevoetInPercent/100);
$totaalDitJaar			=	$erfenisInEuro+$winstPerJaar;

$arrayMetResultaten[] .= $aantalJaarSindsBegin . ' jaar - totaal bedrag ' . floor($totaalDitJaar) . ' - winst dit jaar ' . floor($winstPerJaar).  ' euro.';

if ($aantalJaarSindsBegin<$termijnInJaar) {
	$aantalJaarSindsBegin++;
	return berekenEindBedrag($totaalDitJaar,$rentevoetInPercent,$termijnInJaar);
}

return $arrayMetResultaten;
}

$winst = berekenEindBedrag( $erfenisInEuro, $rentevoetInPercent, $termijnInJaar );
	</pre>

	<?php foreach($winst as $value): ?>
		<p><?php echo $value ?></p>
	<?php endforeach ?>

    </body>
</html>