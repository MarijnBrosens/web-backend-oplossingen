<?php 

	function berekensom($getal1,$getal2){
		$resultaat	=	$getal1	+	$getal2;
		return $resultaat;
	}

 ?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../style.css">
    </head>
    <body>
	
	<h1>Opdracht functies-gevorderd</h1>
	<pre>
	</pre>
	<p>
		<?=($som) ?>
	</p>
	<p>
		<?=($vermenigvuldiging) ?>
	</p>		
		<?php if ( $boolEven ): ?>
			<p>true</p>
		<?php else: ?>
			<p>false</p>
		<?php endif ?>

	<p>
		<?php echo $upperLenght['upper'] ?> is 
		<?php echo $upperLenght['length'] ?> karakters lang.
	</p>	
    </body>
</html>