<?php 

/* ******************************
** Account Tab on Management Page
** ******************************/

?>

<label for="fname" class="col-sm-2 control-label">First Name :</label>
<div class="col-sm-10">
	<p id="fname"><?php echo $_SESSION['logArr']['firstname']; ?></p>
</div>

<label for="lname" class="col-sm-2 control-label">Last Name :</label>
<div class="col-sm-10" id="lname">
	<?php echo $_SESSION['logArr']['lastname']; ?><br />
</div>

<label for="email" class="col-sm-2 control-label">Email :</label>
<div class="col-sm-10" id="email">
	<?php echo $_SESSION['logArr']['account']; ?><br />
</div>

<label for="type" class="col-sm-2 control-label">Account Type :</label>
<div class="col-sm-10" id="type">
	<?php
		$accountType = $_SESSION['logArr']['lastname'];

		if($accountType == '0'){
			echo "User";
		} else if($accountType == '2') {
			echo "Reseller";
		} else if($accountType == '1') {
			echo "PlainTech Employ";
		} else {
			echo "Unknown";
		}
	?><br />
</div>

<br />