<?php

  session_start();

  function __autoload( $classname ) 
  {
    require_once( $classname . '.php' );
  }

  $message    = Message::getMessage();
  $email      = $_SESSION['login']['email'];


  if(!isset($_COOKIE['authenticated'])) {

      header('location: login-form.php');

  }

  $connection = new PDO( 'mysql:host=localhost;dbname=db_file_upload', 'root', '' );

  $db = new Database( $connection );

  $tokens = array(  ':email'     => $_GET[ 'user' ] );

  $userData = $db->query( "   SELECT
                                  id, 
                                  email,
                                  profile_picture
                                FROM
                                  users
                                WHERE
                                (
                                  email = :email
                                ) " , $tokens ) ;

  //var_dump( $userData );

  if( isset( $_GET[ 'user' ] ) ) {

      if ( $userData ) {

        $id               = $userData['data'][0]['id'];
        $email            = $userData['data'][0]['email'];
        $profile_picture  = $userData['data'][0]['profile_picture'];        
        //var_dump($id);

      }

  }

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

      <?php if ( isset ( $message ) ): ?>
        <div class="modal <?= $message['type'] ?>">
          <?= $message['text'] ?>
        </div>
      <?php endif ?>

        <ul>
              <li><a href="dashboard.php">Terug naar dashboard</a></li>
              <li>Ingelogd als <?= $email ?></li>
              <li><a href="dashboard.php?logout=true">Uitloggen</a></li>
        </ul>

        <h1>Profiel bewerken</h1>

        <hr>

        <p>Profielfoto</p>

        <img src="img/<?= ( $profile_picture == '' ) ? 'placeholder.jpg' : $profile_picture ?>" alt="<?= $email ?>">

        <form action="gegevens-bewerken.php" method="POST" enctype="multipart/form-data">

            <input type="file" name="profile_picture" id="profile_picture">

            <input type="text" name="email" placeholder="Email" value="<?= $email ?>">

            <input type="hidden" name="id" value="<?= $id ?>">

            <input type="submit" name="submit" value="Profiel bijwerken">

        </form>

</div>

</body>
</html>