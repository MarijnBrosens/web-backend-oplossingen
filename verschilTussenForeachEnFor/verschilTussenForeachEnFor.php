<?php 

	$beesten	=	array( 1 => 'hond ', 0 => 'kat ');

	// for loopt volgens  de key => is het nummer 0 en  1 
	// ++beesten is beter dan beesten++ omdat eerst wordt bijgeteld
	for ($beestNummer=0; $beestNummer < count($beesten); ++$beestNummer) { 
		echo $beesten[$beestNummer];
	}


	// foreach doorloopt van links naar rechts
	// value is de waarde in de aray 
	// key is het nummer 0 en  1 in de array
	foreach ($beesten as $value) {
		echo $value;
	}

 ?>