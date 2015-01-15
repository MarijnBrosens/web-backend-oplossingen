<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Untitled</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>

    <h1>Foto uploaden</h1>

    <hr>

    <form action="photo-upload.php" method="POST">

    	<ul>
    	    <li><label for="email">Titel</label></li>
    	    <li><input type="email" name="email" placeholder="Email"></li>

    	    <li><textarea name="message" id="message" cols="30" rows="10"></textarea></li>
    	    
    	    <li><input type="checkbox" name="copy" id="copy"></li>

    	    <li><input type="submit" name="submit" value="Verzenden"></li>
    	</ul>

    </form> 

    </body>
</html>