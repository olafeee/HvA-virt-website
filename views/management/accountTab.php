<?php 

/* ******************************
** Account Tab on Management Page
** ******************************/

//include('template.php');
?>



      <div class="panel-heading">
        <h3 class="panel-title">Account Panel</h3>
      </div>
      <div class="panel-body">
        
      	<h4><span class="glyphicon glyphicon-user"></span>   Account Information</h4><hr />

		<label for="fname" class="col-sm-2 control-label">First Name :</label>
		<div class="col-sm-10">
			<p id="fname" name="fname"><?php echo $_SESSION['logArr']['firstname']; ?></p>
		</div>

		<label for="lname" class="col-sm-2 control-label">Last Name :</label>
		<div class="col-sm-10">
			<p id="lname"><?php echo $_SESSION['logArr']['lastname']; ?></p>
		</div>

		<label for="email" class="col-sm-2 control-label">Email :</label>
		<div class="col-sm-10">
			<p id="email"><?php echo $_SESSION['logArr']['account']; ?></p>
		</div>

		<label for="type" class="col-sm-2 control-label">Account Type :</label>
		<div class="col-sm-10">
			<p id="type"><?php
				$accountType = $_SESSION['logArr']['type'];

				if($accountType == '0'){
					echo 'User';
				} else if($accountType == '2') {
					echo 'Reseller';
				} else if($accountType == '1') {
					echo 'PlainTech Employ';
				} else {
					echo 'Unknown';
				}
			?></p>
		</div>

		<br /><br /><br /><br /><br /><br /><br />

		<h4><span class="glyphicon glyphicon-euro"></span>   Payment Information</h4><hr />


		Filler here<br />

        <br />
     </div>


