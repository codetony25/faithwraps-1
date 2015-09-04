<div class="container profile">
	<ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#profile">Profile</a></li>
		<li><a data-toggle="tab" href="#payment">Manage Payment Methods</a></li>
	</ul>
	<div class="tab-content">
		<div id="profile" class="tab-pane fade in active">
			<div class="row">
				<div class="col-sm-4">
					<h3 class="text-center">General Information</h3>
					<form action="/" method="post">
						<label for="email">Email Address</label>
						<input type="text" name="email" class="form-control">
						<label for="first_name">First Name</label>
						<input type="text" name="first_name" class="form-control">
						<label for="last_name">Last Name</label>
						<input type="text" name="last_name" class="form-control">
						<button class="btn btn-info form-control">Save</button>
					</form>
				</div>
				<div class="col-sm-4">
					<h3 class="text-center">Shipping Information</h3>
					<form action="/" method="post">
						<label for="email">First Name</label>
						<input type="text" name="email" class="form-control">
						<label for="last_name">Last Name</label>
						<input type="text" name="last_name" class="form-control">
						<label for="address">Address Line 1</label>
						<input type="text" name="address" class="form-control">
						<label for="address2">Address Line 2 (optional)</label>
						<input type="text" name="address2" class="form-control">
						<label for="city">City</label>
						<input type="text" name="city" class="form-control">
	                    <select name="country" id="inputCountry" class="form-control">
	                        <option value="US">United States</option>
	                        <option value="CANADA">Canada</option>
	                        <option value="VIETNAM">Vietnam</option>
	                        <option value="RUSSIA">Russia</option>
	                    </select>
						<label for="zipcode">Zip Code</label>
						<input type="text" name="zipcode" class="form-control">
						<button class="btn btn-info form-control">Save</button>
					</form>
				</div>
				<div class="col-sm-4">
					<h3 class="text-center">Billing Information Information</h3>
					<form action="/" method="post">
						<label for="email">First Name</label>
						<input type="text" name="email" class="form-control">
						<label for="last_name">Last Name</label>
						<input type="text" name="last_name" class="form-control">
						<label for="address">Address Line 1</label>
						<input type="text" name="address" class="form-control">
						<label for="address2">Address Line 2 (optional)</label>
						<input type="text" name="address2" class="form-control">
						<label for="city">City</label>
						<input type="text" name="city" class="form-control">
	                    <select name="country" id="inputCountry" class="form-control">
	                        <option value="US">United States</option>
	                        <option value="CANADA">Canada</option>
	                        <option value="VIETNAM">Vietnam</option>
	                        <option value="RUSSIA">Russia</option>
	                    </select>
						<label for="zipcode">Zip Code</label>
						<input type="text" name="zipcode" class="form-control">
						<button class="btn btn-info form-control">Save</button>
					</form>
				</div>
			</div>
		</div>
		<div id="payment" class="tab-pane fade">
			<h3>Manage Payment Information</h3>
			<button class="btn btn-info">Add a New Card</button>
			<h4>Edit or Delete a Payment Method</h4>
			<table class="table table-striped">
				<tr>
					<th>Shipping Address</th>
					<th>Billing Address</th>
					<th>Credit Card Information</th>
					<th>Options</th>
				</tr>
				<tr>
					<td>490 E Main Street, Norwich CT 00636</td>
					<td>490 E Main Street, Norwich CT 00636</td>
					<td>Type: VISA Card # ****-****-****-4319</td>
					<td><a href="#"><button class="btn btn-danger">Delete</button></a></td>
				</tr>
				<tr>
					<td>490 E Main Street, Norwich CT 00636</td>
					<td>490 E Main Street, Norwich CT 00636</td>
					<td>Type: VISA Card # ****-****-****-4319</td>
					<td><a href="#"><button class="btn btn-danger">Delete</button></a></td>
				</tr>
			</table>
		</div>
	</div>
</div>