
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
	      <input type="password" class="form-control" id="password" placeholder="Password" data-validation="strength" data-validation-strength="1" data-validation-help="Please pick a strong password!">
	    </div>
	  </div>

	  <div class="form-group">
	    <label for="passwordConfirm" class="col-sm-2 control-label">Confirm</label>
	    <div class="col-sm-10">
	      <input type="password" class="form-control" id="passwordConfirm" placeholder="Password" data-validation="confirmation">
	    </div>
	  </div>

	  <h3>Customer Information</h3>
	  <br />

	  <div class="form-group">
	    <label for="fName" class="col-sm-2 control-label">First Name</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="fName" placeholder="First Name" data-validation="alphanumeric">
	    </div>
	  </div>

	  <div class="form-group">
	    <label for="lName" class="col-sm-2 control-label">Last Name</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="lName" placeholder="Last Name" data-validation="alphanumeric">
	    </div>
	  </div>

	  <div class="form-group">
	    <label for="adzip" class="col-sm-2 control-label">Zip Code</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="adzip" placeholder="Zip Code" data-validation="required">
	    </div>
	  </div>

	  <div class="form-group">
	    <label for="adnr" class="col-sm-2 control-label">Street Number</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="adnr" placeholder="Street Number" data-validation="number" data-validation-allowing="float">
	    </div>
	  </div>

	  <div class="form-group">
	    <label for="country" class="col-sm-2 control-label">Country</label>
	    <div class="col-sm-10">
	      <select id="country" class="form-control bfh-countries" data-country="NL" data-validation="country"></select>
	    </div>
	  </div>

	  <div class="form-group">
	    <label for="country" class="col-sm-2 control-label">Country</label>
	    <div class="col-sm-10">
	      <input type="tel" class="form-control bfh-phone" id="number" data-country="country" placeholder="Phone Number">
	    </div>
	  </div>

	  <div class="form-group">
	    <label for="submit" class="col-sm-2 control-label"></label>
	    <div class="col-sm-10">
	      <input type='hidden' name='submit' />
	      <button class="btn btn-lg btn-primary btn-block" type="submit" id="submit">Create Account</button>
	    </div>
	  </div>


	  

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
