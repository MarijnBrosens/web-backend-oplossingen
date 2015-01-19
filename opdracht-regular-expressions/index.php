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
					<textarea type="text" name="string" rows="5" cols="100"><?= $string ?></textarea>
				</li>
			</ul>
			<input type="submit" name="submit">
		</form>

		<div class="regularExpression">
			
			<?php if ( $pregReplace ): ?>
				Resultaat:  <?= $pregReplace ?>
			<?php endif ?>

		</div>	

		<h1>Deel2</h1>
		<hr>
		<h2>Match alle letters tussen a en d, en u en z (hoofdletters inclusief)</h2>
		<p>String: Memory can change the shape of a room; it can change the color of a car. And memories can be distorted. They're just an interpretation, they're not a record, and they're irrelevant if you have the facts.</p>
		<h4>[a-d|A-D|u|U|z|Z]</h4>
		<p>Resultaat: Memory ##n #h#nge the sh#pe of # room; it ##n #h#nge the #olor of # ##r. #n# memories ##n #e #istorte#. They're j#st #n interpret#tion, they're not # re#or#, #n# they're irrelev#nt if yo# h#ve the f##ts.</p>	

		<hr>

		<h2>Match zowel colour als color</h2>
		<p>String: Zowel colour als color zijn correct Engels.</p>
		<h4>colour|color</h4>
		<p>Resultaat: Zowel # als # zijn correct Engels.<p>

		<hr>

		<h2>Match enkel de getallen die een 1 als duizendtal hebben.</h2>
		<p>Match enkel de getallen die een 1 als duizendtal hebben.</p>
		<h4>1[\w]+</h4>
		<p>Resultaat: # # 9784 # 0231 # 8745</p>

		<hr>

		<h2>Match alle data zodat er enkel een reeks "en" overblijft.</h2>
		<p>String: 24/07/1978 en 24-07-1978 en 24.07.1978</p>
		<h4>[^en]</h4>
		<p>Resultaat: ###########en############en###########</p>

    </body>
</html>