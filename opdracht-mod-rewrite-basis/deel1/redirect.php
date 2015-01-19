<?php

    $baseName = '/' . basename(__FILE__) . '/';

    $root = preg_replace($baseName, '', __FILE__);

    $htaccess = file_get_contents($root .'/.htaccess');

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Het redirect bestand.</title>
        <link rel="stylesheet" href="../../style.css">
        <link rel="author" href="humans.txt">
    </head>
    <body>
    	<h1>Het redirect bestand.</h1>
    	<hr>
        <pre><?php echo $htaccess ?></pre>

    </body>
</html>