	<?php if ( $brouwersEdit ): ?>
		<div>
			<form action="<?= $_SERVER[ 'PHP_SELF' ] ?>" method="POST">
				<ul>
					<?php foreach ($brouwersEdit['data'][0] as $fieldname => $value): ?>
						
						<?php if ( $fieldname != "brouwernr" ): ?>
							<li>
								<label for="<?= $fieldname ?>"><?= $fieldname ?></label>
								<input type="text" id="<?= $fieldname ?>" name="<?= $fieldname ?>" value="<?= $value ?>">
							</li>
						<?php endif ?>
						
					<?php endforeach ?>
				</ul>
				<input type="hidden" value="<?= $brouwersEdit['data'][0]['brouwernr'] ?>" name="brouwernr">
				<input type="submit" name="edit" value="Wijzigen">
			</form>
		</div>
	<?php endif ?>	

	<?php if ( $deleteConfirm ): ?>
		<div>
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
	
	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
		<table>
			
			<thead>
				<tr>
					<?php foreach ($brouwersFieldnames as $fieldname): ?>
						<th><?= $fieldname ?></th>
					<?php endforeach ?>
					<th></th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($brouwers as $key => $brouwer): ?>
					<tr <?= ( $brouwer['brouwernr'] === $deleteId ) ? 'confirm-delete' : ''  ?>>
						<?php foreach ($brouwer as $value): ?>
							<td><?= $value ?></td>
						<?php endforeach ?>
						<td>
							<button type="submit" name="confirm-delete" value="<?= $brouwer['brouwernr'] ?>" class="btn">
								<img src="delete-icon-mini.png" alt="Delete button">
							</button>
						</td>
						<td>
							<!-- http://stackoverflow.com/questions/7935456/input-type-image-submit-form-value -->
							<button type="submit" name="confirm-edit" value="<?= $brouwer['brouwernr'] ?>" class="btn">
								<img src="edit-icon-mini.png" alt="Edit button">
							</button>
						</td>
					</tr>
				<?php endforeach ?>
				
			</tbody>

		</table>
	</form>