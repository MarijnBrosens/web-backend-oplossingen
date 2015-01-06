<?php 

$email      = '';
$password   = '';

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
                    <input type="text" id="email" placeholder="Email">
                </li>
                <li>
                    <label for="password">paswoord</label>
                    <input type="<?= ($password != '') ? 'text' : 'password' ?>" name="password" value="<?= $password ?>" placeholder="Password" >
                    <input type="submit" name="generatePassword" value="Genereer een paswoord">
                </li>
            </ul>
            <input type="submit" value="Registreer">
        </form>
    </body>