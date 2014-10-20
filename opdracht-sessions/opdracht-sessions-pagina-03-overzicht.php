<?php 

    session_start();

    if ( isset( $_POST[ 'submit-pagina-02' ] ) ){

        $_SESSION[ 'straat']        = $_POST['straat'];
        $_SESSION[ 'nummer']        = $_POST['nummer'];
        $_SESSION[ 'gemeente']      = $_POST['gemeente'];    
        $_SESSION[ 'postcode']      = $_POST['postcode'];
        $_SESSION[ 'errorMessage']  = '';
        
        if (($_POST['straat'] == '') || ($_POST['nummer'] == '')|| ($_POST['gemeente'] == '')|| ($_POST['postcode'] == ''))
        {

            $_SESSION[ 'errorMessage'] = 'vul alle velden in';
            header('Location: opdracht-sessions-pagina-02-adresgegevens.php'); 
            //als er niets werd ingevuld in een van de vakjes, terug gaan naar pagina-01
        }

    }else{

        $_SESSION['straat']       = '';
        $_SESSION['nummer']       = '';
        $_SESSION['gemeente']     = '';
        $_SESSION['postcode']     = '';
        $_SESSION['errorMessage'] = '';

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