
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

						<button type="submit" name="delete" value="<?= $selectedId ?>">
							Absoluut zeker!
						</button>

						<button type="submit">
							Ongedaan maken
						</button>

					</form>
				</div>
			<?php endif ?>		

			<?php if ( $brouwersEdit ): ?>
				<div class="confirm-edit">
					<form action="<?= $_SERVER[ 'PHP_SELF' ] ?>" method="POST">
						<ul>
							<?php foreach ($brouwersEdit['brouwers'][0] as $fieldname => $value): ?>
								
								<?php if ( $fieldname != "brouwernr" ): ?>
									<li>
										<label for="<?= $fieldname ?>"><?= $fieldname ?></label>
										<input type="text" id="<?= $fieldname ?>" name="<?= $fieldname ?>" value="<?= $value ?>">
									</li>
								<?php endif ?>
								
							<?php endforeach ?>
						</ul>
						<input type="hidden" value="<?= $brouwersEdit['brouwers'][0]['brouwernr'] ?>" name="brouwernr">
						<input type="submit" name="edit" value="Wijzigen">
					</form>
				</div>
			<?php endif ?>		

			<tbody>
				<?php foreach ($brouwers as $key => $brouwer): ?>
					<tr class="<?= ( $brouwer['brouwernr'] === $selectedId ) ? 'selectedId' : ''  ?>">
						<td><?= ++$key ?></td>
						<?php foreach ($brouwer as $value): ?>
							<td><?= $value ?></td>
						<?php endforeach ?>
						<td>
							<!-- http://stackoverflow.com/questions/7935456/input-type-image-submit-form-value -->
							<button type="submit" name="deleteConfirm" value="<?= $brouwer['brouwernr'] ?>" class="btn">
								<img src="delete-icon-mini.png" alt="Delete button">Delete
							</button>
						</td>
						<td>
							<button type="submit" name="editConfirm" value="<?= $brouwer['brouwernr'] ?>" class="btn">
								<img src="edit-icon-mini.png" alt="Edit button">Edit
							</button>
						</td>
					</tr>
				<?php endforeach ?>
				
			</tbody>

		</table>
	</form>