<?php 

	function berekensom($getal1,$getal2){
		$resultaat	=	$getal1	+	$getal2;
		return $resultaat;
	}

	function vermenigvuldig($getal1,$getal2){
		$resultaat	=	$getal1	*	$getal2;
		return $resultaat;
	}

	function isEven($getal){
		if ($getal %2 == 0) {
			return true;
		}else{
			return false;
		}
	}

	function lengthAndUppercase($string){	
		$resultaat['upper'] 	= strtoupper($string);
		$resultaat['length'] 	= strlen($string);
		return $resultaat;
	}

	$som				=	berekensom(5,2);
	$vermenigvuldiging	=	vermenigvuldig(5,2);
	$boolEven			=	isEven(3);
	$upperLenght		=	lengthAndUppercase('alla lala');

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
function berekensom($getal1,$getal2){
	$resultaat	=	$getal1	+	$getal2;
	return $resultaat;
}

function vermenigvuldig($getal1,$getal2){
	$resultaat	=	$getal1	*	$getal2;
	return $resultaat;
}

function isEven($getal){
	if ($getal %2 == 0) {
		return true;
	}else{
		return false;
	}
}

$som				=	berekensom(5,2);
$vermenigvuldiging	=	vermenigvuldig(5,2);
$boolEven			=	isEven(3);
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