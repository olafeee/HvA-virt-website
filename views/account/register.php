<div class="row">
	<div class="row">
		<h2>Login Information</h2>
		<br />
		<!-- New style test -->
		<form class="form-horizontal" role="form" action="../account/runRegister" method="POST" autocomplete="on">
			<div class="form-group">
				<div class="col-sm-12">
					<div class="input-group">
					  <span class="input-group-addon">@</span>
					  <input type="email" class="form-control" id="inputEmail" placeholder="Email" data-validation="required">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-12">
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
						<p><input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password" data-validation="strength" data-validation-strength="2" autocomplete="off" ></p>
						<p><input type="password" class="form-control" id="inputPassword2" name="inputPassword2" placeholder="Confirm Password" data-validation="confirmation" autocomplete="off" ></p>
					</div>
				</div>
			</div>
			  
			<h2>Customer Information</h2>
			<br />
			<div class="form-group">
				<div class="col-sm-12">
					<div class="input-group">
					  <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
					  <input type="text" class="form-control" id="fname" placeholder="First Name" >
					  <input type="text" class="form-control" id="lname" placeholder="Last Name" >
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-xs-12">
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
						<input type="text" class="form-control" id="adzip" placeholder="Zip Code">
						<input type="number" class="form-control bfh-number" data-min="1" id="adnr" placeholder="Street Number" >
						<select id="country" class="form-control bfh-countries" data-country="NL"></select>
						
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-12">
					<div class="input-group">
					  <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
					  <input type="tel" id="number" class="form-control bfh-phone" data-country="country" placeholder="Phone Number">
					</div>
				</div>
			</div>
			
			
				
			<h2>Payment Information</h2>
			<br />
			
			<input type='hidden' name='submit' />
			<button class="btn btn-lg btn-primary btn-block" type="submit">Create Account</button>
		</form>

		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.1.38/jquery.form-validator.min.js"></script>
		<script> $.validate({
			modules : 'security',
			onModulesLoaded : function() {
			    var optionalConfig = {
			      fontSize: '12pt',
			      padding: '4px',
			      bad : 'Very bad',
			      weak : 'Weak',
			      good : 'Good',
			      strong : 'Strong'
			    };

			    $('input[name="inputPassword"]').displayPasswordStrength();
			  }
		    
		}); </script>
		<br />
	</div>
</div>