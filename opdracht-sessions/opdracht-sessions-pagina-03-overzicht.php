<?php 

    session_start();

    if ( isset( $_POST[ 'submit' ] ) ){

        $_SESSION[ 'straat']    = $_POST['straat'];
        $_SESSION[ 'nummer']    = $_POST['nummer'];
        $_SESSION[ 'gemeente']  = $_POST['gemeente'];    
        $_SESSION[ 'postcode']  = $_POST['postcode'];

    }

?>


<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>pagina-03-overzicht</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>

        <h1>Opdracht-sessions-pagina-03-overzicht</h1>

        <p>
            Email: <?php echo $_SESSION[ 'email'] ?>
        </p>
        <p>
            Nickname: <?php echo $_SESSION[ 'nickname'] ?>
        </p>
        <p>
            Straat: <?php echo $_SESSION[ 'straat'] ?>
        </p>
        <p>
            Nummer: <?php echo $_SESSION[ 'nummer'] ?>
        </p>
        <p>
            Gemeente: <?php echo $_SESSION[ 'gemeente'] ?>
        </p>
        <p>
            Postcode: <?php echo $_SESSION[ 'postcode'] ?>
        </p>
    </body>
</html>