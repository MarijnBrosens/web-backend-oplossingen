<?php 

    session_start();


    if ( isset( $_POST[ 'submit' ] ) ){

        $_SESSION[ 'email']     = $_POST['email'];                  
        $_SESSION[ 'nickname']  = $_POST['nickname'];
    
    }

    $straat     = $_SESSION[ 'straat'];
    $nummer     = $_SESSION[ 'nummer'];
    $gemeente   = $_SESSION[ 'gemeente'];    
    $postcode   = $_SESSION[ 'postcode'];

?>


<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>pagina-02-adresgegevens</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>

        <h1>Opdracht-sessions-pagina-02-adresgegevens</h1>
        <p>
            Email: <?php echo $_SESSION[ 'email'] ?>
        </p>
        <p>
            Nickname: <?php echo $_SESSION[ 'nickname'] ?>
        </p>

        <form action="opdracht-sessions-pagina-03-overzicht.php" method="POST">

            <ul>
                <li>
                    <label for="straat">Straat:</label>
                    <input type="text" name="straat" id="straat" value="straat">
                </li>
                <li>
                    <label for="nummer">Nummer:</label>
                    <input type="number" name="nummer" id="nummer" value="20">
                </li>
                <li>
                    <label for="gemeente">Gemeente:</label>
                    <input type="text" name="gemeente" id="gemeente" value="gemeente">
                </li>
                <li>
                    <label for="postcode">Postcode:</label>
                    <input type="number" name="postcode" id="postcode" value="2000">
                </li>
            </ul>

            <input type="submit" name="submit" id="submit" value="volgende">

        </form>
        <a href="opdracht-sessions-destroy.php">Destroy session</a>

    </body>
</html>