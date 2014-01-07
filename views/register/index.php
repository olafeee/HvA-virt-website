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
					<hr />
					
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
						<div class="col-sm-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
								<input type="text" class="form-control" id="adzip" placeholder="Zip Code">
								<input type="number" class="form-control" id="adnr" placeholder="Street Number">
								<select class="form-control" id="country" placeholder="Country">
									<?php require '/views/register/country.php'; ?> <!-- Importing the country list -->
								</select>
							</div>
						</div>
					</div>
					<hr />
					
					<h2>Payment Information</h2>
					<br />
					<!--
					<div class="col-sm-12">
						<img width="164" height="64" src="/img/payment_ideal.png"><br />
						<img width="164" height="64" src="/img/payment_paypal.png"><br />
						<img width="164" height="64" src="/img/payment_Google_Wallet.png"><br />
						<img width="164" height="64" src="/img/payment_google_checkout.png"><br />
						<img width="228" height="50" src="/img/payment_creditcard.png"><br />
					</div>
					-->
					<input type="radio">
					<img width="164" height="64" src="/img/payment_ideal.png">
					<br />
					<input type="radio">
					<img width="164" height="64" src="/img/payment_paypal.png">
					<br />
					<input type="radio">
					<img width="164" height="64" src="/img/payment_Google_Wallet.png">
					<br />
					<input type="radio">
					<img width="164" height="64" src="/img/payment_google_checkout.png">
					<br />
					<input type="radio">
					<img width="228" height="50" src="/img/payment_creditcard.png">
					
					<br />
					<hr />
					<p>By clicking on "Create an account" below, you are agreeing to the <a href="algemenevoorwaarden">Terms of Service</a> and the <a href="privacypolicy">Privacy Policy</a>.</p>
					<hr />
					<button class="btn btn-lg btn-primary btn-block" type="submit">Create an account</button>
				</form>
				<br />
				<br />
		</div>