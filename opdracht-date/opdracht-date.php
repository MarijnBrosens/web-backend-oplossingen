<?php 
	setlocale(LC_ALL, 'nld_nld');
	$timestamp		=	mktime(22, 35, 25, 01, 21, 1904);
	$showTimestamp	=	strftime("%d %B %Y , %I:%M:%S %p ", $timestamp);

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>opdracht-date</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
    <h1>Opdracht-date</h1>
    <pre>
    	
	setlocale(LC_ALL, 'nld_nld');
	$timestamp		=	mktime(22, 35, 25, 01, 21, 1904);
	$showTimestamp	=	strftime("%d %B %Y , %I:%M:%S %p ", $timestamp);

    </pre>
    <p>Timestamp: 		<?php echo $timestamp ?></p>
	<p>ShowTimestamp: 	<?php echo $showTimestamp ?></p>
    </body>
</html>