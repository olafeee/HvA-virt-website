
<div class="row">

	<form class="form-horizontal" role="form" action="./runRegister" method="post">

	  <h3>Login Information</h3>
	  <br />

	  <div class="form-group">
	    <label for="email" class="col-sm-2 control-label">Email :</label>
	    <div class="col-sm-10">
	      <input type="email" class="form-control" id="email" name="email" placeholder="Email"  data-validation-url="./registerValidate/email">
	    </div>
	  </div>

	  <div class="form-group">
	    <label for="password" class="col-sm-2 control-label">Password :</label>
	    <div class="col-sm-10">
	      <input type="password" class="form-control" id="password" name="password_confirmation" placeholder="Password" data-validation="strength" data-validation-strength="2">
	    </div>
	  </div>

	  <div class="form-group">
	    <label for="passwordConfirm" class="col-sm-2 control-label">Confirm :</label>
	    <div class="col-sm-10">
	      <input type="password" class="form-control" id="passwordConfirm" name="password" placeholder="Confirm Password" data-validation="confirmation">
	    </div>
	  </div>

	  <h3>Customer Information</h3>
	  <br />

	  <div class="form-group">
	    <label for="fname" class="col-sm-2 control-label">First Name :</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" data-validation="alphanumeric">
	    </div>
	  </div>

	  <div class="form-group">
	    <label for="lname" class="col-sm-2 control-label">Last Name :</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" data-validation="alphanumeric">
	    </div>
	  </div>

	  <div class="form-group">
	    <label for="adzip" class="col-sm-2 control-label">Zip Code :</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="adzip" name="adzip" placeholder="Zip Code" data-validation="required">
	    </div>
	  </div>

	  <div class="form-group">
	    <label for="adnr" class="col-sm-2 control-label">Street Number :</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="adnr" name="adnr" placeholder="Street Number" data-validation="number" data-validation-allowing="float">
	    </div>
	  </div>

	  <div class="form-group">
	    <label for="country" class="col-sm-2 control-label">Country :</label>
	    <div class="col-sm-10">
	      <select class="form-control bfh-countries" id="country" name="country" data-country="NL" data-validation="country"></select>
	    </div>
	  </div>

	  <div class="form-group">
	    <label for="country" class="col-sm-2 control-label">Phone :</label>
	    <div class="col-sm-10">
	      <input type="tel" class="form-control bfh-phone" id="phone" name="phone" data-country="country" data-validation="length" data-validation-length="min9">
	    </div>
	  </div>

	  <br />

	  <div class="form-group">
	    <label for="reseller" class="col-sm-2 control-label">Reseller :</label>
	    <div class="col-sm-10">
	      <div class="checkbox" id="resellerCheckbox" >
	        <label>
	          <input type="checkbox" id="reseller" name="reseller" title="Select this if your a reseller.">I would like a reseller's account.</label>
	      </div>
	    </div>
	  </div>

	  <br />

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
			modules : 'security',
			onModulesLoaded : function() {
			    var optionalConfig = {
			      fontSize: '8pt',
			      padding: '4px',
			      bad : ' Very bad ',
			      weak : ' Weak ',
			      good : ' Good ',
			      strong : ' Strong '
			    };

			    $('input[id="password"]').displayPasswordStrength(optionalConfig);
			}
		    
		});

		$( document ).ready(function() {
			// Show tooltip
			$('#reseller').tooltip(); 
		});
		
	</script>
	<br />
</div>
