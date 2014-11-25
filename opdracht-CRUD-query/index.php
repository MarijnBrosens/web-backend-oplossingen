<?php

	try {

		$db = new PDO(	"mysql:host=localhost;dbname=bieren",
						"root",
						"" 
					 );

		$queryString	=	"SELECT *
								FROM bieren 
								INNER JOIN brouwers
								ON bieren.brouwernr = brouwers.brouwernr
								WHERE bieren.naam LIKE 'du%'
								AND brouwers.brnaam LIKE '%a%'";

		$statement = $db->prepare( $queryString );
		$statement->execute();

		$bieren	=	array();

		while ( $row = $statement->fetch( PDO::FETCH_ASSOC ) ) {
			$bieren[] 	=	$row;
		}

		$kolommen	=	array();
		$kolommen[]	=	"#";

		foreach( $bieren[0] as $key => $bier ) {
			$kolommen[]	=	$key;
		}

		$message['type']	=	'ok';
		$message['text']	=	'gelukt';

	} catch ( PDOException $e ) {

		$message['type']	=	'error';
		$message['text']	=	$e->getMessage();
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Opdracht-CRUD-query</title>
		<link rel="stylesheet" type="text/css" href="../style.css">
	</head>
<body>

	<?php if ( $message ): ?>
	 	<div class="<?= $message[ 'type' ] ?>">
	 		<?= $message[ 'text' ] ?>
	 	</div>
	<?php endif ?>

	<table>
		
		<thead>
			<tr>
				<?php foreach ($kolommen as $kolomNaam): ?>
					<th><?= $kolomNaam ?></th>
				<?php endforeach ?>
			</tr>
		</thead>

		<tbody>
		
			<?php foreach ($bieren as $key => $bier): ?>

				<tr class="<?= ( ( $key + 1) %2 == 0 ) ? 'even' : '' ?>">
					<td><?= ($key + 1) ?></td>

					<?php foreach ($bier as $value): ?>

						<td><?= $value ?></td>

					<?php endforeach ?>
				</tr>

			<?php endforeach ?>
			
		</tbody>

	</table>

</body>
</html>