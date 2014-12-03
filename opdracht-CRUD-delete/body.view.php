
	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
		<table>
			
			<thead>
				<tr>
					<th>#</th>
					<?php foreach ($brouwersFieldnames as $fieldname): ?>
						<th><?= $fieldname ?></th>
					<?php endforeach ?>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($brouwers as $key => $brouwer): ?>
					<tr class="<?= ( ($key+1)%2 == 0 ) ? 'even' : ''  ?>">
						<td><?= ++$key ?></td>
						<?php foreach ($brouwer as $value): ?>
							<td><?= $value ?></td>
						<?php endforeach ?>
						<td>
							<!-- http://stackoverflow.com/questions/7935456/input-type-image-submit-form-value -->
							<button type="submit" name="delete" value="<?= $brouwer['brouwernr'] ?>" class="delete-button">
								<img src="icon-delete.png" alt="Delete button">delete
							</button>
						</td>
					</tr>
				<?php endforeach ?>
				
			</tbody>

		</table>
	</form>