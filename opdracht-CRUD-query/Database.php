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

			$bieren		=	array();

			# alle bieren + kolomhead
			while ( $row = $statement->fetch( PDO::FETCH_ASSOC ) ) {
				$bieren[] 	=	$row;
			}
			var_dump($bieren[0]);

			$kolommen	=	array();
			$kolommen[]	=	"#";

			# kolomhead namen
			foreach( $bieren[0] as $key => $bier ) {
				$kolommen[]	=	$key;				
			}
			//var_dump($kolommen);

			$returnArray['kolommen']	=	$kolommen;
			$returnArray['bieren']		=	$bieren;

			return $returnArray;
		}


	}

?>