	<table>
		
		<thead>
			<tr>
				<?php foreach ($bierenCleanFieldnames as $key => $cleanFieldname): ?>
					<th class="order <?= ( $order == 'ASC' && $orderColumn == $bierenFieldnames[ $key ] ) ? 'descending' : 'ascending' ?> <?= ( $orderColumn == $bierenFieldnames[ $key ] ) ? 'selected' : '' ?>"><a href="<?= $_SERVER['PHP_SELF'] ?>?orderBy=<?= $bierenFieldnames[ $key ] ?>-<?= $order ?>"><?= $cleanFieldname ?></a></th>
				<?php endforeach ?>
				<th></th>
				<th></th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($bieren as $key => $brouwer): ?>
				<tr class="<?= ( ($key + 1) % 2 == 0 ) ? 'even' : '' ?>">
					<?php foreach ($brouwer as $value): ?>
						<td><?= $value ?></td>
					<?php endforeach ?>
				</tr>
			<?php endforeach ?>
			
		</tbody>

	</table>