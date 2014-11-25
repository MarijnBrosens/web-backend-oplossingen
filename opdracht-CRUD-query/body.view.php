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