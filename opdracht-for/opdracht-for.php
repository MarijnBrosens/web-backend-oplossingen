<?php

	$getallen		=	array();
	$getallen2	=	array();

	$aantalGetallen	=	100;

	$getal = 0;

	for ( $getal ; $getal <= $aantalGetallen;  $getal++)
	{
		$getallen[$getal]	=	$getal;
		
		if ( $getal % 3 == 0 && $getal > 40 && $getal < 80 )
		{
			$getallen2[$getal]	=	$getal;
		}
	}

	$alleGetallen	=	implode( ' , ', $getallen );
	$alleGetallen2	=	implode( ' , ', $getallen2 );

	$maxTafels		=	11;
	$maxProduct		=	10;

/*-------------------------------------------------*/

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>

	<h1>Opdracht for</h1>

	<pre>
$getallen		=	array();
$getallen2	=	array();

$aantalGetallen	=	100;

$getal = 0;

for ( $getal ; $getal <= $aantalGetallen;  $getal++)
{
	$getallen[$getal]	=	$getal;
	
	if ( $getal % 3 == 0 && $getal > 40 && $getal < 80 )
	{
		$getallen2[]	=	$getal;
	}
}

$alleGetallen	=	implode( ' , ', $getallen );
$alleGetallen2	=	implode( ' , ', $getallen2 );

$maxTafels		=	11;
$maxProduct		=	10;
	</pre>

	<h1>Deel1</h1>
	<p>
		Alle getallen: <?= $alleGetallen ?>
	</p>
	<p>
		Alle getallen deelbaar door 3 en groter 40 maar kleiner zijn dan 80: <?= $alleGetallen2 ?>
	</p>
	<h1>Deel2</h1>
		<table>
			<?php 
				$tafel 		= 	0;
			?>
			<?php for ($tafel=0; $tafel < $maxTafels ; $tafel++) { ?>
				<tr>
					<?php 
						$product = 	0;
					?>
					<?php for ($product=0; $product <= $maxProduct ; $product++) { ?>
						<td class="<?= ( ( $tafel * $product ) % 2 > 0 ) ? '' : 'oneven' ?>"><?= $tafel * $product ?></td>
					<?php } ?>
				</tr>

			<?php } ?>

		</table>
</body>
</html>