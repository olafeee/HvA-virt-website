<div class="row">
	<div class="row">
		<h2>Login Information</h2>
		<br />
		<!-- New style test -->
		<form class="form-horizontal" role="form" action="../account/runRegister" method="post">
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
						<input type="password" class="form-control" id="inputPassword2" placeholder="Confirm Password">
					</div>
				</div>
			</div>
			  
			<h2>Customer Information</h2>
			<br />
			<div class="form-group">
				<div class="col-sm-12">
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
				<div class="col-xs-12">
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
						<input type="text" class="form-control" id="adzip" placeholder="Zip Code">
						<input type="number" class="form-control" id="adnr" placeholder="Street Number">
						<select class="form-control" id="country" placeholder="Country">
							<?php include('register_countries.php'); ?>
						</select>

						<div class="bfh-selectbox" data-name="selectbox3" data-value="12" data-filter="true">
						<select class="form-control bfh-countries" data-country="NL"></select>
						</div>

						<div class="bfh-selectbox bfh-countries" data-country="NL" data-flags="true">
						</div>
					</div>
				</div>
			</div>
				
			<h2>Payment Information</h2>
			<br />
			
			<input type='hidden' name='submit' />
			<button class="btn btn-lg btn-primary btn-block" type="submit">Create Account</button>
		</form>
		<br />
	</div>
</div>