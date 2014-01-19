		<div class="row">
			<h2>Login Information</h2>
			<br />
<!-- Register Container -->
	<div class="container">
		<div class="row">
			<div class="login-class">
				<div class="invoer-login-class">
					<form class="form-horizontal" role="form">
					  <div class="form-group">
						<div class="col-sm-12">
							<div class="input-group">
							  <span class="input-group-addon">@</span>
							  <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
							</div>
						</div>
					  </div>
					  <div class="form-group">
						<div class="col-sm-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
								<input type="password" class="form-control" id="inputPassword3" placeholder="Password">
							</div>
						</div>
					  </div>
					  <div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						  <div class="checkbox">
							<label>
							 <a href="register.html">Maak een account aan</a>
							</label>
						  </div>
						</div>
					  </div>
					  <div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<a href="javascript:hideLoginMenu()" class="btn btn-danger">Cancel</a>
						  <button type="submit" class="btn btn-default">Sign in</button>
						</div>
					  </div>
					</form>
				</div>
			</div>
		</div>
<!-- einde van head + nav + login bij alles het zelfde-->

		<div class="row">
			<h2>Login Information</h2>
			<br />
			<!-- New style test -->
			<form class="form-horizontal" role="form">
					<div class="form-group">
						<div class="col-sm-12">
							<div class="input-group">
							  <span class="input-group-addon">@</span>
							  <input type="email" class="form-control" id="inputEmail" placeholder="Email">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
								<input type="password" class="form-control" id="inputPassword" placeholder="Password">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-check"></span></span>
								<input type="password" class="form-control" id="inputPassword2" placeholder="Confirm Password">
							</div>
						</div>
					</div>
					  
					<h2>Customer Information</h2>
					<br />
					<div class="form-group">
						<div class="col-sm-13">
							<div class="input-group">
							  <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
							  <input type="text" class="form-control" id="fname" placeholder="First Name">
							  <input type="text" class="form-control" id="lname" placeholder="Last Name">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<div class="input-group">
							  <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
							  <input type="tel" class="form-control" id="number" placeholder="Phone Number">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-14">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
								<input type="text" class="form-control" id="adzip" placeholder="Zip Code">
								<input type="number" class="form-control" id="adnr" placeholder="Street Number">
								<select class="form-control" id="country" placeholder="Country">
									<?php include('country.php'); ?>
								</select>
							</div>
						</div>
					</div>
					
					<h2>Payment Information</h2>
					<br />
					
					</form>
					<br />
		</div>