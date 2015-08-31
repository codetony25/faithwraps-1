<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<form action="/users/register" method="post" class="center-block">
				<div class="form-group">
					<input type="email" class="form-control" name="email" placeholder="Email Address" value="<?php set_value('email'); ?>" />
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="password" placeholder="Password" />
				</div>
				<div class="form-group">
					<input type="confirm_password" class="form-control" name="confirm_password" placeholder="Re-enter password" />
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Register</button>
				</div>
			</form>
		</div>
	</div><!-- /.row -->
</div><!-- /.container -->