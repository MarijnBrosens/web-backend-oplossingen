<?php 

    session_start();

    $email      = '';
    $password   = '';

    function __autoload( $classname )
    {
        require_once( $classname . '.php' );
    }    

    $connection = new PDO(  'mysql:host=localhost;dbname=db_CRUD_CMS', 'root', '' );
    
    if ( User::validate( $connection )) {

        header('location: dashboard.php') ;

    } else {

        $message = Message::getMessage();

        if (isset($_SESSION['login'])) {

            $email      = $_SESSION['login']['email'];
            $password   = $_SESSION['login']['password'];

        }

    }

    /*
    if(isset($_SESSION['notification'])) {

        $notification = $_SESSION['notification'];
        
    }
    */

    //var_dump($email);
    //var_dump($password);

?>

<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>login-form</title>
        <link rel="stylesheet" href="../style.css">  
    </head>
    <body>  

        <?php if ( $message ): ?>
            <div class="modal <?php echo $message['type'] ?>">
                <?php echo $message['text'] ?>
            </div>
        <?php endif ?>

        <h1>Login</h1>

        <form action="login-proces.php" method="post">
            <ul>
                <li>
                    <label for="email">e-mail</label>
                    <input type="text" name="email" id="email" placeholder="Email" value="<?= $email ?>">
                </li>
                <li>
                    <label for="password">paswoord</label>
                    <input type="password" name="password" placeholder="Password" />
                </li>
            </ul>
            <input name="submit" type="submit" value="Log in">
        </form>
        <p><a href="registratie-form.php">Registreren</a></p>
    </body>