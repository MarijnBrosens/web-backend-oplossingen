<?php  

	class Database{

		private $db;

		public function __construct( $db )
		{
			$this->db	=	$db;
		}

		public function query( $queryString )
		{
			$brouwerStatement 	= $this->db->prepare( $queryString );

			$brouwerStatement->bindParam( ':brnaam', $_POST[ 'brnaam' ] );
			$brouwerStatement->bindParam( ':adres', $_POST[ 'adres' ] );
			$brouwerStatement->bindParam( ':postcode', $_POST[ 'postcode' ] );
			$brouwerStatement->bindParam( ':gemeente', $_POST[ 'gemeente' ] );
			$brouwerStatement->bindParam( ':omzet', $_POST[ 'omzet' ] );

			$isAdded = $brouwerStatement->execute();

			if ( $isAdded )
			{
				$insertId			=	$this->db->lastInsertId();
				$message['type']	=	'success';
				$message['text']	=	'Brouwerij succesvol toegevoegd. Het unieke nummer van deze brouwerij is ' . $insertId . '.';
			}
			else
			{
				$message['type']	=	'error';
				$message['text']	=	'Er ging iets mis met het toevoegen, probeer opnieuw';
			}

			//return $returnArray;
		}


	}

?>