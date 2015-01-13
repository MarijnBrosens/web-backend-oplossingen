<?php 

    session_start();

    function __autoload( $classname )
    {
        require_once( $classname . '.php' );
    }    
    
    if(isset($_SESSION['notification'])) {

        $notification = $_SESSION['notification'];
        
    }

    $message    = Message::getMessage();
    $email      = '';
    $password   = '';

    if (isset($_SESSION['registration'])) {

        $email      = $_SESSION['registration']['email'];
        $password   = $_SESSION['registration']['password'];

    }

    var_dump($email);
    var_dump($password);

?>

<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registratie-form</title>
        <link rel="stylesheet" href="../style.css">  
    </head>
    <body>  

        <?php if ( $message ): ?>
            <div class="modal <?php echo $message['type'] ?>">
                <?php echo $message['text'] ?>
            </div>
        <?php endif ?>

        <h1>Registreren</h1>

        <form action="registratie-proces.php" method="post">
            <ul>
                <li>
                    <label for="email">e-mail</label>
                    <input type="text" name="email" id="email" placeholder="Email" value="<?= $email ?>">
                </li>
                <li>
                    <label for="password">paswoord</label>

                    <input type="<?= ($password != '') ? 'text' : 'password' ?>" name="password" value="<?= $password ?>" placeholder="Password" >
                    <input type="submit" name="generate-Password" value="Genereer een paswoord">
                </li>
            </ul>
            <input name="submit" type="submit" value="Registreer">
        </form>
        <p><a href="login-form.php">Login</a></p>
    </body>