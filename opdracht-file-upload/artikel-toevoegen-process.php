<?php

  session_start();

  function __autoload( $classname ) 
  {
    require_once( $classname . '.php' );
  }

  $connection = new PDO( 'mysql:host=localhost;dbname=db_CRUD_CMS', 'root', '' );

  $db = new Database( $connection );


  $tokens = array(  ':titel'        => $_POST['titel'],
                    ':artikel'      => $_POST['artikel'],
                    ':kernwoorden'  => $_POST['kernwoorden'],
                    ':datum'        => $_POST['datum']);

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


      




  if( isset( $_POST['submit'] ) ) {

      if( $insertArticle ) {

          // query successful
          new Message( "ok", "artikel toegevoegd aan db" ); 
          header( 'location: artikel-overzicht.php' );

      } else {

          // query failed
          new Message( "error", "artikel toegevoegd aan db MISLUKT" ); 
          header( 'location: artikel-toevoegen-form.php' );

      }
  }
?>