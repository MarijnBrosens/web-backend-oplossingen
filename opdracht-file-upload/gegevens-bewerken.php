<?php

    session_start();

    function __autoload( $classname ) 
    {
        require_once( $classname . '.php' );
    }

    $message    = Message::getMessage();
    $email      = $_SESSION[ 'login' ][ 'email' ];

    $connection = new PDO( 'mysql:host=localhost;dbname=db_file_upload', 'root', '' );

    $db = new Database( $connection );

    // img met huidige tijd_ naam
    $file       = 'img/' . time() . '_' . basename( $_FILES[ 'profile_picture' ][ 'name' ] );

    if( isset( $_POST['submit'] ) ) {

        if( $_FILES[ "profile_image" ][ "type" ] != 'jpg'   || 
            $_FILES[ "profile_image" ][ "type" ] != 'jpeg'  ||
            $_FILES[ "profile_image" ][ "type" ] != 'png'   || 
            $_FILES[ "profile_image" ][ "type" ] != 'gif'   &&
            ($_FILES["profile_image" ][ "size" ] < 2000000 ) ) {

            // juist bestandstype hier

            if ( $_FILES["profile_image"]["error"] > 0 ) {

                new Message( "error", "Het bestand is niet geupload!" );
                header( 'location: gegevens-bewerken-form.php?user=' . $email );

            } else {

                // geen error bij het uploaden hier - juiste bestandstype

                $fileName = time() . $_FILES[ "profile_image" ][ "name" ];

                if ( file_exists( time() . '_' . $file ) ) {
                                
                    new Message( "error", "De afbeelding bestaat al!" ); 

                } else {

                    // geen error bij het uploaden hier - juiste bestandstype - uniek bestand

                    if ( move_uploaded_file( $_FILES[ 'profile_picture' ][ 'tmp_name' ], $file ) ) {

                        // bestand succesvol verplaatst

                        $tokens = array(    ':id'               => $_POST[ 'id' ],
                                            ':email'            => $_POST[ 'email' ],
                                            ':profile_picture'  => time() . '_' . $_FILES[ 'profile_picture' ][ 'name' ]);
                        
                        $updateUserQuery = "UPDATE
                                                users
                                            SET
                                                email = :email,
                                                profile_picture = :profile_picture
                                            WHERE
                                            (
                                                id = :id
                                            )";

                        $updatedUser     =$db->query( $updateUserQuery , $tokens );

                        if ( $updatedUser ) {

                            new Message( "ok", "profiel geupdated!" );
                            header('location: dashboard.php');

                        }
                        
                    } else {

                        new Message( "error", "Fout bij uploaden!" );
                        header('location: gegevens-bewerken-form.php?user=' . $email);

                    }

                } 

            }

        } else {

            new Message( "error", "Het bestand moet van het type: jpg, jpeg, png of gif zijn en moet kleiner dan 2MB zijn!" );             
        } // end type

    } //end submit

?>