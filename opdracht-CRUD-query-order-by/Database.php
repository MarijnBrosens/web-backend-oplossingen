<?php  

	class Database{

/*		private $db;

		public function __construct( $db )
		{
			$this->db	=	$db;
		}*/

		function query( $query, $tokens = false )
		{
			$statement = $db->prepare( $query );
			
			if ( $tokens )
			{
				foreach ( $tokens as $token => $tokenValue )
				{
					$statement->bindParam( $token, $tokenValue );
				}
			}

			$statement->execute();

			/*  Veldnamen ophalen*/
			$fieldnames	=	array();

			for ( $fieldNumber = 0; $fieldNumber < $statement->columnCount(); ++$fieldNumber )
			{
				$fieldnames[]	=	$statement->getColumnMeta( $fieldNumber )['name'];
			}

			/*De brouwer-data ophalen*/
			$data	=	array();

			while( $row = $statement->fetch( PDO::FETCH_ASSOC ) )
			{
				$data[]	=	$row;
			}

			$returnArray['fieldnames']	=	$fieldnames;
			$returnArray['data']		=	$data;

			return $returnArray;
		}

/*
		public function selectQuery( $queryString , $tokens = false )
		{

			$statement = $this->db->prepare( $queryString );
			
			if ( $tokens )
			{
				foreach ( $tokens as $token => $tokenValue )
				{
					$statement->bindParam( $token, $tokenValue );
				}
			}

			$statement->execute();

			/*  Veldnamen ophalen*/
/*			$fieldnames	=	array();

			for ( $fieldNumber = 0; $fieldNumber < $statement->columnCount(); ++$fieldNumber )
			{
				$fieldnames[]	=	$statement->getColumnMeta( $fieldNumber )['name'];
			}

			/*De brouwer-data ophalen*/
/*			$data	=	array();

			while( $row = $statement->fetch( PDO::FETCH_ASSOC ) )
			{
				$data[]	=	$row;
			}

			$returnArray['fieldnames']	=	$fieldnames;
			$returnArray['data']		=	$data;

			return $returnArray;
		}

		public function updateQuery ( $updateQueryString , $tokens = false)
		{
			$statement = $this->db->prepare( $updateQueryString );

			$statement->bindValue( ":brouwernr",  	$_POST[ 'brouwernr' ] );						
			$statement->bindValue( ":brnaam",  		$_POST[ 'brnaam' ] );						
			$statement->bindValue( ":adres",  		$_POST[ 'adres' ] );						
			$statement->bindValue( ":postcode",  	$_POST[ 'postcode' ] );						
			$statement->bindValue( ":gemeente",  	$_POST[ 'gemeente' ] );						
			$statement->bindValue( ":omzet",  		$_POST[ 'omzet' ] );

			$updateSuccessful	=	$statement->execute();

			return $updateSuccessful;
		}

		public function deleteQuery( $deleteQueryString , $tokens = false)
		{
			$deleteStatement = $this->db->prepare( $deleteQueryString );

			$deleteStatement->bindValue( ':brouwernr', $_POST['delete'] );

			$isDeleted 	=	$deleteStatement->execute();

			return $isDeleted;
		}
*/

	}

?>