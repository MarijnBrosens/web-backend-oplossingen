<?php 

	$text 			= 	file_get_contents("text-file.txt");
	$textChars		= 	str_split($text);
	rsort($textChars);
	$reversedArray	=	array_reverse($textChars);

	$tellerArray	= 	array();

	foreach($reversedArray as $value) {
		if ( isset ( $tellerArray[ $value ] ) ){
			++$tellerArray[ $value ];
		}
		else{
			$tellerArray[ $value ] = 1;
		}		
	}
 ?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../style.css">
    </head>
    <body>
	
	<h1>Opdracht foreach</h1>
	<pre></pre>
	<p>


	<?php foreach($tellerArray as $value): ?>
		<p><?php echo $value ?></p>
	<?php endforeach ?>

	</p>

    </body>
</html>