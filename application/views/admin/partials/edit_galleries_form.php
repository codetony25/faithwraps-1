<form role='form' method='post' id='edit_form' data-scope='galleries'>
	<div class='form-group'>
		<label for='name'>Name</label>
		<input class='form-control' type='text' name='name' value='<?= $gallery['name'] ?>'>
	</div>
	<div class='form-group'>
		<label for='desc'>Description</label>
		<textarea class='form-control' name='desc'><?= $gallery['desc'] ?></textarea>
	</div>
	<?php if ($is_new) { ?>
		<div class='form-group'>
			<input type='hidden' name='action' value='create'>
			<button class='btn btn-primary'>Create Gallery</button>
		</div>
	<?php } else { ?>
		<input type='hidden' name='id' value='<?= $gallery['id'] ?>'>
		<input type='hidden' name='action' value='update'>
		<div class='form-group'>
			<button data-id='<?= $gallery['id'] ?>' type='button' data-scope='galleries' class='btn btn-danger del-item'>Delete gallery</button>
			<button class='btn btn-primary'>Update Gallery</button>
		</div>
	<?php } ?> 
</form>