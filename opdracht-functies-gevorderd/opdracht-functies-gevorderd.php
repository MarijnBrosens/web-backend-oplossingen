<?php 

	$md5HashKey 	= 	'd1fa402db91a7a93c4f414b8278ce073';
	$karakter1		=	"2";
	$karakter2		=	"8";
	$karakter3		=	"a";

	function functie1( $haystack, $karakter )
	{
		$haystackCount =  strlen( $haystack );
		$karakterAantal = substr_count ( $haystack, $karakter );
		
		return $karakterAantal;
	}

	function functie2( $karakter )
	{
		global $md5HashKey;
		$haystack = $md5HashKey;
		$haystackCount =  strlen( $haystack );
		$karakterAantal = substr_count ( $haystack, $karakter );

		return $karakterAantal;
	}

	function functie3( $karakter )
	{
		$haystack = $GLOBALS['md5HashKey'];
		$haystackCount =  strlen( $haystack );
		$karakterAantal = substr_count ( $haystack, $karakter );

		return $karakterAantal;
	}

	$eersteMethode 	=	functie1( $md5HashKey, $karakter1 );
	$tweedeMethode 	=	functie2( $karakter2 );
	$derdeMethode 	=	functie3( $karakter3 );

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
		<p> Functie1: De needle '<?php echo $karakter1?>' komt <?php echo $eersteMethode ?> keer voor in de hash '<?php echo $md5HashKey ?>'</p>
		<p> Functie2: De needle '<?php echo $karakter2?>' komt <?php echo $tweedeMethode ?> keer voor in de hash '<?php echo $md5HashKey ?>'</p>
		<p> Functie3: De needle '<?php echo $karakter3?>' komt <?php echo $derdeMethode ?> keer voor in de hash '<?php echo $md5HashKey ?>'</p>	
    </body>
</html>