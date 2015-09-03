<div class="container forgot_password">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">

			<?php if ($feedback = $this->session->userdata('reset_feedback')): ?>
			    <div class="alert alert-warning alert-dismissible" role="alert">
			      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			    <?php echo $feedback; ?>
			    </div>
			<?php endif; ?>

			<form action="/users/request_reset" method="post">
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon glyphicon glyphicon-envelope"></span>
						<input type="email" name="email" class="form-control" placeholder="Email Address">
					</div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Send Password Reset</button>
				</div>
			</form>
		</div>
	</div><!-- /.row -->
</div><!-- /.container -->