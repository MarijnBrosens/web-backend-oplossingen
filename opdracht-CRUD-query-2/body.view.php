	<table>
		
		<thead>
			<tr>
				<?php foreach ($kolommen as $kolomNaam): ?>
					<th><?= $kolomNaam ?></th>
				<?php endforeach ?>
			</tr>
		</thead>


		<form action="index.php" method="POST">

			<ul>
				<li>
					<label for="description">Beschrijving: </label>
					<input type="text" id="description" name="description">

					<select>

						<option value="<?php echo $key ?>">
							<?php echo $key ?>
						</option>

						<?php foreach ($bieren as $key => $bier): ?>

							<tr class="<?= ( ( $key + 1) %2 == 0 ) ? 'even' : '' ?>">
								<td><?= ($key + 1) ?></td>

								<?php foreach ($bier as $value): ?>

									<td><?= $value ?></td>

								<?php endforeach ?>
							</tr>

						<?php endforeach ?>






					</select>
				</li>
			</ul>

			<input type="submit" name="addTodo" value="Toevoegen">

		</form>


		

			

	</table>