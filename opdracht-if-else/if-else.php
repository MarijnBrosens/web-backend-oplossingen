<?php

$jaartal		= 	2000;
$schrikkeljaar	= 	'niets ingevuld';

if ($jaartal % 4 ==0 && $jaartal % 100 !=0 || $jaartal % 400 ==0) {
	$schrikkeljaar	=  "een schrikkeljaar";
}else{
	$schrikkeljaar	=  "geen schrikkeljaar";
}


?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>

	<h1>Opdracht if-else</h1>
	<pre>
$jaartal		= 	2000;
$schrikkeljaar	= 	'niets ingevuld';

if ($jaartal % 4 ==0 && $jaartal % 100 !=0 || $jaartal % 400 ==0) {
	$schrikkeljaar	=  "een schrikkeljaar";
}else{
	$schrikkeljaar	=  "geen schrikkeljaar";
}
	</pre>
	<p>
		<?= $jaartal ?>	is <?= $schrikkeljaar ?>
	</p>
</body>
</html>