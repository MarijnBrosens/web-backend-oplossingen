<?php

  session_start();

  function __autoload( $classname ) 
  {
    require_once( $classname . '.php' );
  }

  $connection = new PDO( 'mysql:host=localhost;dbname=db_CRUD_CMS', 'root', '' );

  $db = new Database( $connection );


  $tokens = array(  ':titel'        => real_escape_string($_POST['titel'],
                    ':artikel'      => real_escape_string($_POST['artikel'],
                    ':kernwoorden'  => real_escape_string($_POST['kernwoorden'],
                    ':datum'        => real_escape_string($_POST['datum']);

  $insertArticle = $db->query( 'INSERT INTO artikels 
                                                  (   
                                                    titel,
                                                    artikel,
                                                    kernwoorden,
                                                    datum
                                                  )
                                                  VALUES 
                                                  (  
                                                    :titel,
                                                    :artikel,
                                                    :kernwoorden,
                                                    :datum
                                                  )' , $tokens);


      




  if(isset($_POST['submit'])) {

      if(mysqli_query($connection, $insertArticle)) {

          // query successful
          $notification = 'The article is successful added to the database';
          $_SESSION['notification'] = $notification;
          header('location: articles-overview.php');

      } else {

          // query failed
          $notification = 'The article is not successful added to the database';
          $_SESSION['notification'] = $notification;
          header('location: add-article-form.php');

      }
  }
?>