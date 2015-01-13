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
	elseif ( isset( $_POST[ 'submit' ] ) ) {

		$email			= $_POST[ 'email' ];
		$password		= $_POST[ 'password' ];
		
		/*$salt           = uniqid( mt_rand() , true );
    	$hashedPassword = crypt( $password , $salt );    	*/

		$_SESSION[ 'registration' ][ 'email' ]			= $email;
    	$_SESSION[ 'registration' ][ 'password' ]	    = $password;
    	//$_SESSION[ 'registration' ][ 'hashedPassword' ]	= $hashedPassword;


		// Email check
		$isEmail	=	filter_var( $email , FILTER_VALIDATE_EMAIL );

		if ( $isEmail ) {
			
			$connection	=	new PDO( 'mysql:host=localhost;dbname=db_secure_login', 'root', '' );

			$db = new Database( $connection );	
			
			$userData	=	$db->query( '	SELECT * 
											FROM users 
											WHERE email = :email', 
											array(':email' => $email ) );	

			if (  isset( $userData['data'][ 0 ]) ) {
				// user bestaat

				$userExistsError = new Message( "error", "De gebruiker met het e-mailadres " . $email . "komt reeds voor in onze database." ); 
				header('location: ' . $formLocatie );

				
			} else {


				$newUser = User::CreateNewUser( $connection , $email , $password );

				if ( $newUser ) {

					$registrationSuccess = new Message("success", "Welkom, u bent vanaf nu geregistreerd in onze app.");
					header( 'location: dashboard.php' );
				}				

			}

		} elseif ( $password == "" ) {

			new Message( "error", "Dit is geen geldig paswoord. Vul een geldig paswoord in." ); 
			
			header('location: ' . $formLocatie );

		} else {

			$emailError = new Message( "error", "Dit is geen geldig e-mailadres. Vul een geldig e-mailadres in." ); 
			
			header('location: ' . $formLocatie );

		}

	}	


	//willekeurig passwoord maken - geef een lengte mee van passwoord
	function generatePassword( $length ){

		$chars = "0123456789abcdefghijklmnopqrstuvwxyz!@#$%^&*()_-=+;:,.?ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	    $password = substr( str_shuffle( $chars ), 0, $length );

	    var_dump( $password );
	    return $password;

	}

?>