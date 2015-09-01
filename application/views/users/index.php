<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<?php if ($registration_feedback = $this->session->flashdata('registration_feedback')): ?>
				<div class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <?php echo $registration_feedback; ?>
				</div>
			<?php endif; ?>
			<form action="/users/register" method="post" class="center-block">
				<div class="form-group">
					<input type="email" class="form-control" name="email" placeholder="Email Address" value="<?php set_value('email'); ?>" />
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="password" placeholder="Password" />
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="confirm_password" placeholder="Re-enter password" />
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Register</button>
				</div>
			</form>

			<form action="users/google_login" method="post">
				<input type="submit" value="Login with Google">
			</form>
		</div>
	</div><!-- /.row -->
</div><!-- /.container -->