<?php  

	class Database{

		private $db;

		public function __construct( $db )
		{
			$this->db	=	$db;
		}

		public function deleteQuery( $queryString )
		{
			$deleteStatement 	= $this->db->prepare( $queryString );

			$deleteStatement->bindParam( ':brouwernr', $_POST['delete'] );

			$isDeleted 	=	$deleteStatement->execute();

		}

		public function selectQuery($queryString)
		{
			$brouwersStatement = $this->db->prepare( $queryString );
		
			$brouwersStatement->execute();

			/*  Veldnamen ophalen*/
			$brouwersFieldnames	=	array();

			for ( $fieldNumber = 0; $fieldNumber < $brouwersStatement->columnCount(); ++$fieldNumber )
			{
				$brouwersFieldnames[]	=	$brouwersStatement->getColumnMeta( $fieldNumber )['name'];
			}

			/*De brouwer-data ophalen*/
			$brouwers	=	array();

			while( $row = $brouwersStatement->fetch( PDO::FETCH_ASSOC ) )
			{
				$brouwers[]	=	$row;
			}

			$returnArray['brouwersFieldnames']	=	$brouwersFieldnames;
			$returnArray['brouwers']		=	$brouwers;

			return $returnArray;			
		}

		public function updateQuery($queryString)
		{
			$brouwersStatement = $this->db->prepare( $queryString );
		
			$brouwersStatement->execute();

			/*  Veldnamen ophalen*/
			$brouwersFieldnames	=	array();

			for ( $fieldNumber = 0; $fieldNumber < $brouwersStatement->columnCount(); ++$fieldNumber )
			{
				$brouwersFieldnames[]	=	$brouwersStatement->getColumnMeta( $fieldNumber )['name'];
			}

			/*De brouwer-data ophalen*/
			$brouwers	=	array();

			while( $row = $brouwersStatement->fetch( PDO::FETCH_ASSOC ) )
			{
				$brouwers[]	=	$row;
			}

			$returnArray['brouwersFieldnames']	=	$brouwersFieldnames;
			$returnArray['brouwers']		=	$brouwers;

			return $returnArray;			
		}

	}

?>