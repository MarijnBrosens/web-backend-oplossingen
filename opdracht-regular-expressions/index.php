<?php 

	$regularExoression 	= '';
	$string 			= '';
	$pregReplace 		= false;

	if ( isset( $_POST[ 'submit' ] )) {	

		$regularExoression	= $_POST[ 'regularExoression' ]; // de letter die vervangen moet worden
		$string 			= $_POST[ 'string' ]; // de zin - woorden waarin de regularExpression moet vervangen worden

		$pattern			= '/' . $regularExoression . '/';
		$replacement		= '<span>#</span>'; //de vervanging zelf

		$pregReplace 		= preg_replace( $pattern, $replacement, $string );

		var_dump( $pregReplace );

	}

 ?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>RegEx</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>

    	<h1>RegEx tester</h1>
    	<hr>
       		
		<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
			
			<ul>
				<li>
					<label for="regularExoression">Regular Expression</label>
					<input type="text" name="regularExoression" value="<?= $regularExoression ?>">
				</li>
				<li>
					<label for="string">String</label>
					<textarea type="text" name="string"><?= $string ?></textarea>
				</li>
			</ul>
			<input type="submit" name="submit">
		</form>

		<div class="regularExpression">
			
			<?php if ( $pregReplace ): ?>
				Resultaat:  <?= $pregReplace ?>
			<?php endif ?>

		</div>		

    </body>
</html>