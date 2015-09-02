<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<form action="/users/reset_password" method="post">
				<input type="hidden" name="token" value="<?php echo $token; ?>">
				<div class="form-group">
					<input type="password" name="password" class="form-control" placeholder="Enter new password">
				</div>
				<div class="form-group">
					<input type="password" name="confirm_password" class="form-control" placeholder="Re-enter password">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Send Password Reset</button>
				</div>
			</form>
		</div>
	</div><!-- /.row -->
</div><!-- /.container -->