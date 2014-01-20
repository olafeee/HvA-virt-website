
	<div class="row">
		<h2>Login Information</h2>
		<br />


		<form role="form">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Email address</label>
		    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Password</label>
		    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputFile">File input</label>
		    <input type="file" id="exampleInputFile">
		    <p class="help-block">Example block-level help text here.</p>
		  </div>
		  <div class="checkbox">
		    <label>
		      <input type="checkbox"> Check me out
		    </label>
		  </div>
		  <button type="submit" class="btn btn-default">Submit</button>
		</form>
















		
		<!-- New style test -->
		<form class="form-horizontal" role="form" action="../account/runRegister" method="POST" autocomplete="on">
			<div class="form-group">
				<div class="col-sm-12">
					<div class="input-group">
					  <span class="input-group-addon">@</span>
					  <input type="email" class="form-control" id="inputEmail" placeholder="Email" data-validation="email">
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-12">
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
						<input type="password" class="form-control" id="inputPassword" name="pass_confirmation" placeholder="Password" data-validation="strength" data-validation-strength="1" >
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-12">
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
						<input type="password" class="form-control" name="pass" id="inputPassword2" placeholder="Confirm Password" data-validation="confirmation">
					</div>
				</div>
			</div>
			  
			<h2>Customer Information</h2>
			<br />
			<div class="form-group">
				<div class="col-sm-12">
					<div class="input-group">
					  <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
					  <input type="text" class="form-control" id="fname" placeholder="First Name" data-validation="required" >
					  <input type="text" class="form-control" id="lname" placeholder="Last Name" data-validation="required" >
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-xs-12">
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
						<input type="text" class="form-control" id="adzip" placeholder="Zip Code" data-validation="required">
						<input type="number" class="form-control bfh-number" data-min="1" id="adnr" placeholder="Street Number" data-validation="required">
						<select id="country" class="form-control bfh-countries" data-country="NL" data-validation="country"></select>
						
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

		<!-- Bootstrap Form Helpers -->
		<script type="text/javascript" src="/js/bootstrap-formhelpers.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.1.38/jquery.form-validator.min.js"></script>
		<script> 
			$.validate({
				errorMessagePosition : 'element',
				modules : 'security',
				onModulesLoaded : function() {
				    var optionalConfig = {
				      fontSize: '8pt',
				      padding: '4px',
				      bad : 'Very bad',
				      weak : 'Weak',
				      good : 'Good',
				      strong : 'Strong'
				    };

				    $('input[name="pass_confirmation"]').displayPasswordStrength(optionalConfig);
				  }
			    
			}); 
		</script>
		<br />
	</div>
