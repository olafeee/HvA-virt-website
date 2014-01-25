<?php 

/* ******************************
** Account Tab on Management Page
** ******************************/

$accountInfo = $this->accountInfo[0];
print_r($accountInfo);
//include('template.php');
?>



      <div class="panel-heading">
        <h3 class="panel-title">Account Panel</h3>
      </div>
      <div class="panel-body">
        
      	<h4><span class="glyphicon glyphicon-user"></span>   Account Information</h4><hr />

		<label for="fname" class="col-sm-2 control-label">First Name :</label>
		<div class="col-sm-10">
			<p id="fname" name="fname"><?php echo $accountInfo['firstname']; ?></p>
		</div>

		<label for="lname" class="col-sm-2 control-label">Last Name :</label>
		<div class="col-sm-10">
			<p id="lname"><?php echo $accountInfo['lastname']; ?></p>
		</div>

		<label for="email" class="col-sm-2 control-label">Email :</label>
		<div class="col-sm-10">
			<p id="email"><?php echo $accountInfo['account']; ?></p>
		</div>

		<h4><span class="glyphicon glyphicon-euro"></span>   General Information</h4><hr />

		<label for="adstr" class="col-sm-2 control-label">Street :</label>
		<div class="col-sm-10">
			<p id="email"><?php echo $accountInfo['adstr']; ?></p>
		</div>
		<label for="adzip" class="col-sm-2 control-label">Street :</label>
		<div class="col-sm-10">
			<p id="email"><?php echo $accountInfo['adzip']; ?></p>
		</div>



		<br /><br /><br /><br /><br /><br /><br />

		<h4><span class="glyphicon glyphicon-euro"></span>   Payment Information</h4><hr />


		Filler here<br />

        <br />
     </div>


