<?php 

	$header = 'header.partial.php';
	$body   = 'body.partial.php';
	$footer = 'footer.partial.php';

	function __autoload($className) {
		//var_dump($className);
	    include 'classes/' . $className  . '.php';
	}

	$html   = new HTMLBuilder($header, $body, $footer);
	//
	var_dump($html);

?>