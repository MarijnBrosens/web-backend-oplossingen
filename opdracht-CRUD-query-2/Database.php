<?php  

	class Database{

		private $db;

		public function __construct( $db )
		{
			$this->db	=	$db;
		}

		public function query( $queryString )
		{
			$statement 	= $this->db->prepare( $queryString );
			$statement->execute();

			while ( $row = $statement->fetch( PDO::FETCH_ASSOC ) ) {
				$brouwers[] 	=	$row;
			}
			var_dump($brouwers[0]);
			var_dump($brouwers[0]['brnaam']);

			$kolommen	=	array();
			//$kolommen[]	=	"#";

			# kolomhead namen
			foreach( $brouwers[0] as $key => $brouwer ) {
				$kolommen[]	=	$key;				
			}
			//var_dump($kolommen);

			$returnArray['kolommen']	=	$kolommen;
			$returnArray['brouwers']	=	$brouwers;

			//var_dump($returnArray['brouwer']);

			return $returnArray;
		}


	}

?>