<?php 

    session_start();

    if ( isset( $_POST[ 'submit-pagina-01' ] ) ){

        $_SESSION[ 'email']         = $_POST['email'];                  
        $_SESSION[ 'nickname']      = $_POST['nickname'];
        $_SESSION[ 'errorMessage']  = '';

        if (($_POST['email'] == '') || ($_POST['nickname'] == ''))
        {

            $_SESSION[ 'errorMessage'] = 'vul alle velden in';
            header('Location: opdracht-sessions-pagina-01-registratie.php'); 
            //als er niets werd ingevuld in een van de vakjes, terug gaan naar pagina-01
        }
    
    }else{

        $_SESSION['email']          = '';
        $_SESSION['nickname']       = '';
        $_SESSION['errorMessage']   = '';

    }

    if (isset($_SESSION[ 'straat']))    { $straat     = $_SESSION[ 'straat']; }else{  $straat     = '';}

    if (isset($_SESSION[ 'nummer']))    { $nummer     = $_SESSION[ 'nummer']; }else{  $nummer     = '';}

    if (isset($_SESSION[ 'gemeente']))  { $gemeente   = $_SESSION[ 'gemeente'];}else{ $gemeente   = '';}

    if (isset($_SESSION[ 'postcode']))  { $postcode   = $_SESSION[ 'postcode'];}else{ $postcode   = '';}  

    if (isset($_SESSION[ 'errorMessage']))  {$errorMessage  = $_SESSION[ 'errorMessage'];}  else{ $errorMessage = '';}  

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
        <ul>
            <li>Email: <?php echo $_SESSION[ 'email'] ?></li>
            <li>Nickname: <?php echo $_SESSION[ 'nickname'] ?></li>
        </ul>       
            
        <form action="opdracht-sessions-pagina-03-overzicht.php" method="POST">
            <p class="error"> <?php echo $errorMessage ?></p>
            <ul>
                <li>
                    <label for="straat">Straat:</label>
                    <input type="text" name="straat" id="straat" value="<?php echo $straat ?>">
                </li>
                <li>
                    <label for="nummer">Nummer:</label>
                    <input type="number" name="nummer" id="nummer" value="<?php echo $nummer ?>">
                </li>
                <li>
                    <label for="gemeente">Gemeente:</label>
                    <input type="text" name="gemeente" id="gemeente" value="<?php echo $gemeente ?>">
                </li>
                <li>
                    <label for="postcode">Postcode:</label>
                    <input type="number" name="postcode" id="postcode" value="<?php echo $postcode ?>">
                </li>
            </ul>

            <input type="submit" name="submit-pagina-02" id="submit" value="volgende">

        </form>
        <a href="opdracht-sessions-destroy.php">Destroy session</a>

    </body>
</html>