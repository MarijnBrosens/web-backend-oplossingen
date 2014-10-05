<?php

	$getallen		=	array();
	$aantalGetallen	=	100;

	$getal = 0;

	while ( $getal <= $aantalGetallen )
	{
		$getallen[$getal]	=	$getal;
		$getal++;
	}

	$alleGetallen	=	implode( ' , ', $getallen );

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

	<h1>Opdracht while</h1>

	<pre>

$getallen		=	array();
$aantalGetallen	=	100;

$getal = 0;

while ( $getal <= $aantalGetallen )
{
	$getallen[$getal]	=	$getal;
	$getal++;
}

$alleGetallen	=	implode( ' , ', $getallen );

$maxTafels		=	11;
$maxProduct		=	10;
	
	</pre>

	<h1>Deel1</h1>
	<p>
		Alle getallen: <?= $alleGetallen ?>
	</p>
	<h1>Deel2</h1>
		<table>
			<?php 
				$tafel 		= 	0;
			?>
			<?php while( $tafel < $maxTafels ):  ?>
				
				<tr>
					<?php 
						$product = 	0;
					?>
					<?php while( $product <= $maxProduct ):  ?>

						<td class="<?= ( ( $tafel * $product ) % 2 > 0 ) ? '' : 'oneven' ?>"><?= $tafel * $product ?></td>
						<?php $product++ ?>
					<?php endwhile ?>
				</tr>

				<?php $tafel++ ?>
			<?php endwhile ?>
		</table>
</body>
</html>