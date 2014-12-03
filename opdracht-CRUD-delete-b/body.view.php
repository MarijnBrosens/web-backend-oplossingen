
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

			<?php if ( $deleteConfirm ): ?>
				<div class="confirm-delete">
					Bent u zeker dat u deze record wilt verwijderen?
					<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">

						<button type="submit" name="delete" value="<?= $deleteId ?>">
							Absoluut zeker!
						</button>

						<button type="submit">
							Ongedaan maken
						</button>

					</form>
					</div>
			<?php endif ?>			

			<tbody>
				<?php foreach ($brouwers as $key => $brouwer): ?>
					<tr class="<?= ( $brouwer['brouwernr'] === $deleteId ) ? 'confirm-delete' : ''  ?>">
						<td><?= ++$key ?></td>
						<?php foreach ($brouwer as $value): ?>
							<td><?= $value ?></td>
						<?php endforeach ?>
						<td>
							<!-- http://stackoverflow.com/questions/7935456/input-type-image-submit-form-value -->
							<button type="submit" name="confirm" value="<?= $brouwer['brouwernr'] ?>" class="btn">
								<img src="delete-icon-mini.png" alt="Delete button">Delete
							</button>
						</td>
					</tr>
				<?php endforeach ?>
				
			</tbody>

		</table>
	</form>