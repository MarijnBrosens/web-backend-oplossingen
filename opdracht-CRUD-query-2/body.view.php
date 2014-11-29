

	<form action="index.php" method="post">
		<select>

			<?php foreach ($bieren as $key => $bier): ?>


					<?php foreach ($bier as $value): ?>

						<option><?= $value ?></option>

					<?php endforeach ?>


			<?php endforeach ?>

		</select>
		<input type="submit" name="voegToe" value="Voeg toe" />
	</form>