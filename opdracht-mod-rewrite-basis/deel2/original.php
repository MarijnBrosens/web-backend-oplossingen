<?php
/*
    $baseName = '/' . basename(__FILE__) . '/';

    $root = preg_replace($baseName, '', __FILE__);

    $htaccess = file_get_contents($root .'/.htaccess');
*/
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Het originele bestand.</title>
        <link rel="stylesheet" href="../../style.css">
        <link rel="author" href="humans.txt">
    </head>
    <body>
    	<h1>Het originele bestand.</h1>
        <h3>var_dump() van $_GET variabele</h3>
    	<hr>

        <?=  var_dump($_GET); ?>

    </body>
</html>