<?php 

    session_start();

    function __autoload( $classname )
    {
        require_once( $classname . '.php' );
    }    
    
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
        <title>Untitled</title>
        <link rel="stylesheet" href="../style.css">  
    </head>
    <body>  

        <h1>Registreren</h1>

        <form action="registratie-proces.php" method="post">
            <ul>
                <li>
                    <label for="email">e-mail</label>
                    <input type="text" name="email" id="email" placeholder="Email">
                </li>
                <li>
                    <label for="password">paswoord</label>

                    <input type="<?= ($password != '') ? 'text' : 'password' ?>" name="password" value="<?= $password ?>" placeholder="Password" >
                    <input type="submit" name="generate-Password" value="Genereer een paswoord">
                </li>
            </ul>
            <input type="submit" value="Registreer">
        </form>
    </body>