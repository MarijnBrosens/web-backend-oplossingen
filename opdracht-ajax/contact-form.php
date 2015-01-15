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
        <title>opdracht-ajax</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>


	<?php if ( isset ( $message ) ): ?>

        <div class="modal <?= $message['type'] ?>">
            <?= $message['text'] ?>
        </div>

    <?php endif ?>  


    <h1>Opdracht ajax</h1>

    <hr>

    <form action="contact.php" method="POST" id="form">

    	<ul>
    	    <li><label for="afzenderEmail">afzender email adres</label></li>
    	    <li><input type="email" name="afzenderEmail" placeholder="Email"></li>

    	    <li><textarea name="bericht" id="bericht" cols="30" rows="10"></textarea></li>

    	    <li><input type="checkbox" name="copy" id="copy"></li>

    	    <li><input type="submit" name="submit" id="submit" value="Verzenden"></li>
    	</ul>

    </form> 

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
     <script>

        $( document ).ready( function() {
         
            //alert( "jquery werkt" );

            $( "#form" ).submit( function( event ) {

                //alert( "Handler for .submit() called." );
                //event.preventDefault();

                var data    =   $('#form').serialize();

                $.ajax({
                    type: 'POST',
                    url: 'contact-API.php',
                    data: data,
                    success: function( data ) {
                            
                        parsedData = JSON.parse( data );
                        console.log( parsedData );
                        
                    }
                })
            
                return false;

            });

        });

     </script>
    </body>
</html>