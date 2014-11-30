
	<form action="index.php" method="post">
		<select>

			<?php foreach ($brouwers as $brouwer): ?>

				<option value="<?php echo $brouwer['brouwernr'] ?>">
					<?php echo $brouwer['brnaam'] ?>
				</option>

			<?php endforeach ?>

		</select>
		<input type="submit" name="voegToe" value="Voeg toe" />
	</form>