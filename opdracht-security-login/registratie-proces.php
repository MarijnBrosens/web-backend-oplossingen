<?php
	
	session_start();

	function __autoload( $classname )
	{
		require_once( $classname . '.php' );
	}

	$formLocatie = 'registratie-form.php';




	// password maken
	if(isset($_POST['generate-Password'])) {

	    $generatedPassword = generatePassword(20);

	    var_dump($generatedPassword);

	    $_SESSION['registration']['email']      = $_POST['email'];
	    $_SESSION['registration']['password']   = $generatedPassword;

	    header('location: ' . $formLocatie);

	} 



	//registreren
	if ( isset( $_POST[ 'submit' ] ) ) {

		$email		=	$_POST[ 'email' ];
		$_SESSION[ 'registration' ][ 'email' ]	= $email;

		$password	=	$_POST[ 'password' ];
		$salt           = uniqid( mt_rand() , true );
    	$hashedPassword = crypt( $password , $salt );

    	$_SESSION[ 'registration' ][ 'password' ]	    = $password;
    	$_SESSION[ 'registration' ][ 'hashedPassword' ]	= $hashedPassword;


		// Email check
		$isEmail	=	filter_var( $email, FILTER_VALIDATE_EMAIL );

		if ($isEmail) {
			
			$connection	=	new PDO( 'mysql:host=localhost;dbname=db_secure_login', 'root', '' );

			$db = new Database( $connection );	
			
			$checkUserDuplicate = $db->query('	SELECT *
						                      	FROM users
												WHERE email = :email', array(':email' => $email ) );	

			if (  isset( $checkUserDuplicate['data'][ 0 ]) ) {
				// user bestaat

				header('location: ' . $formLocatie );

				
			} else {


				$connection	=	new PDO( 'mysql:host=localhost;dbname=db_secure_login', 'root', '' );

				$db = new Database( $connection );	
			
				$checkUserDuplicate = $db->query(' INSERT INTO users
                  (
                    email,
                    salt,
                    hashed_password,
                    last_login_time
                  )
                  VALUES
                  (
                    '".$connection->real_escape_string($_POST['email'])."',
                    '".$salt."',
                    '".$hashedPassword."',
                    NOW()
                  )") ');

				header('location: dashboard.php');


			}

		}


	}	


	//willekeurig passwoord maken - geef een lengte mee van passwoord
	function generatePassword($length){

		$chars = "0123456789abcdefghijklmnopqrstuvwxyz!@#$%^&*()_-=+;:,.?ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	    $password = substr(str_shuffle($chars), 0, $length);

	    var_dump($password);
	    return $password;

	}

?>