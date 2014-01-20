
<div class="row">



	<form class="form-horizontal" role="form">

	  <h3>Login Information</h3>
	  <br />

	  <div class="form-group">
	    <label for="email" class="col-sm-2 control-label">Email</label>
	    <div class="col-sm-10">
	      <input type="email" class="form-control" id="email" placeholder="Email" data-validation="email">
	    </div>
	  </div>

	  <div class="form-group">
	    <label for="password" class="col-sm-2 control-label">Password</label>
	    <div class="col-sm-10">
	      <input type="password" class="form-control" id="password" placeholder="Password" data-validation="strength" data-validation-strength="1">
	    </div>
	  </div>

	  <div class="form-group">
	    <label for="passwordConfirm" class="col-sm-2 control-label">Confirm Password</label>
	    <div class="col-sm-10">
	      <input type="password" class="form-control" id="passwordConfirm" placeholder="Password" data-validation="confirmation">
	    </div>
	  </div>

	  <h3>Customer Information</h3>
	  <br />

	  <div class="form-group">
	    <label for="fName" class="col-sm-2 control-label">First Name</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="fName" placeholder="First Name" data-validation="required">
	    </div>
	  </div>

	  <div class="form-group">
	    <label for="lName" class="col-sm-2 control-label">Last Name</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="lName" placeholder="Last Name" data-validation="required">
	    </div>
	  </div>



	</form>
		
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

			    $('input[id="password"]').displayPasswordStrength(optionalConfig);
			  }
		    
		}); 
	</script>
	<br />
</div>
