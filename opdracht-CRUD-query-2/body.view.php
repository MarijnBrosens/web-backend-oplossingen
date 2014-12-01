
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

	<table>	

		<thead>
			<tr>
				<?php foreach ($kolommen as $kolomNaam): ?>
					<th><?= $kolomNaam ?></th>
				<?php endforeach ?>
			</tr>
		</thead>

		<tbody>
		
			<?php foreach ($bieren as $key => $biernaam): ?>
				<tr class="<?= ( ( $key + 1) %2 == 0 ) ? 'even' : '' ?>">
					<td><?= ( $key + 1 ) ?></td>
					<td><?= $biernaam ?></td>
				</tr>
			<?php endforeach ?>

		</tbody>

	</table>