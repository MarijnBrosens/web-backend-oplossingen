<?php

	session_start();

	function __autoload( $classname )
	{
		require_once( 'classes/' . $classname . '.php' );
	}

	$message	=	Message::getMessage();

?>


<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>opdracht-mail</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>


	<?php if ( isset ( $message ) ): ?>

        <div class="modal <?= $message['type'] ?>">
            <?= $message['text'] ?>
        </div>

    <?php endif ?>  


    <h1>Opdracht mail</h1>

    <hr>

    <form action="contact.php" method="POST">

    	<ul>
    	    <li><label for="afzenderEmail">afzender email adres</label></li>
    	    <li><input type="email" name="afzenderEmail" placeholder="Email"></li>

    	    <li><textarea name="bericht" id="bericht" cols="30" rows="10"></textarea></li>

    	    <li><input type="checkbox" name="copy" id="copy"></li>

    	    <li><input type="submit" name="submit" value="Verzenden"></li>
    	</ul>

    </form> 

    </body>
</html>