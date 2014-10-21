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
            header('Location: opdracht-sessions-pagina-01-registratie.php'); 
            //als er niets werd ingevuld in een van de vakjes, terug gaan naar pagina-01
        }

    }else{

        $_SESSION['straat']       = '';
        $_SESSION['nummer']       = '';
        $_SESSION['gemeente']     = '';
        $_SESSION['postcode']     = '';
        $_SESSION['errorMessage'] = '';

    }
    
    if (isset($_SESSION[ 'email']))         { $email        = $_SESSION[ 'email'];}        else{ $email = '';}

    if (isset($_SESSION[ 'nickname']))      { $nickname     = $_SESSION[ 'nickname'];}     else{ $nickname = '';}

    if (isset($_SESSION[ 'straat']))        { $straat       = $_SESSION[ 'straat']; }      else{ $straat     = '';}

    if (isset($_SESSION[ 'nummer']))        { $nummer       = $_SESSION[ 'nummer']; }      else{ $nummer     = '';}

    if (isset($_SESSION[ 'gemeente']))      { $gemeente     = $_SESSION[ 'gemeente'];}     else{ $gemeente   = '';}

    if (isset($_SESSION[ 'postcode']))      { $postcode     = $_SESSION[ 'postcode'];}     else{ $postcode   = '';}  

    if (isset($_SESSION[ 'errorMessage']))  { $errorMessage = $_SESSION[ 'errorMessage'];} else{ $errorMessage = '';}  

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
            Email: <?php echo $_SESSION[ 'email'] ?> / <a href="opdracht-sessions-pagina-01-registratie.php?focus=email"> Wijzig</a>
        </p>
        <p>
            Nickname: <?php echo $_SESSION[ 'nickname'] ?> / <a href="opdracht-sessions-pagina-01-registratie.php?focus=nickname"> Wijzig</a>
        </p>
        <p>
            Straat: <?php echo $_SESSION[ 'straat'] ?> / <a href="opdracht-sessions-pagina-02-adresgegevens.php?focus=straat"> Wijzig</a>
        </p>
        <p>
            Nummer: <?php echo $_SESSION[ 'nummer'] ?> / <a href="opdracht-sessions-pagina-02-adresgegevens.php?focus=nummer"> Wijzig</a>
        </p>
        <p>
            Gemeente: <?php echo $_SESSION[ 'gemeente'] ?> / <a href="opdracht-sessions-pagina-02-adresgegevens.php?focus=gemeente"> Wijzig</a> 
        </p>
        <p>
            Postcode: <?php echo $_SESSION[ 'postcode'] ?> / <a href="opdracht-sessions-pagina-02-adresgegevens.php?focus=postcode"> Wijzig</a>
        </p>
    </body>
</html>