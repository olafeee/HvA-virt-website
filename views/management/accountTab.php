<?php 

/* ******************************
** Account Tab on Management Page
** ******************************/

?>

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
		$accountType = $_SESSION['logArr']['lastname'];

		if($accountType == 0){
			echo 'User';
		} else if($accountType == 2) {
			echo 'Reseller';
		} else if($accountType == 1) {
			echo 'PlainTech Employ';
		} else {
			echo 'Unknown';
		}
	?></p>
</div>

<br />