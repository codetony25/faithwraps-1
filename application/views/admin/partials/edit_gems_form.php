<form role='form' method='post' id='edit_form' data-scope='gems'>
	<div class='form-group'>
		<label for='name'>Name</label>
		<input class='form-control' type='text' name='name' value='<?= $gem['name'] ?>'>
	</div>
	<div class='form-group'>
		<label for='desc'>Description</label>
		<textarea class='form-control' name='desc'><?= $gem['desc'] ?></textarea>
	</div>
	<div class='form-group'>
		<label for='colors'>Colors</label>
		<input class='form-control' type='text' name='colors' value='<?= $gem['colors'] ?>'>	
	</div>
	<div class='form-group'>
		<label for='energies'>Energies</label>
		<input class='form-control' type='text' name='energies' value='<?= $gem['energies'] ?>'>				
	</div>			
	<div class='form-group'>
		<label for='chakras'>Chakras</label>
		<input class='form-control' type='text' name='chakras' value='<?= $gem['chakras'] ?>'>				
	</div>
	<?php if ($is_new) { ?>
		<div class='form-group'>
			<input type='hidden' name='action' value='create'>
			<button class='btn btn-primary'>Create Gem</button>
		</div>
	<?php } else { ?>
		<input type='hidden' name='id' value='<?= $gem['id'] ?>'>
		<input type='hidden' name='action' value='update'>
		<div class='form-group'>
			<button data-id='<?= $gem['id'] ?>' type='button' data-scope='gems' class='btn btn-danger del-item'>Delete Gem</button>
			<button class='btn btn-primary'>Update Gem</button>
		</div>
	<?php } ?> 
</form>