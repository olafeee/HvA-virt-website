<?php 

/* ******************************
** Account Tab on Management Page
** ******************************/

$accountType = $_SESSION['logArr']['lastname'];

?>

<label for="fname" class="col-sm-2 control-label">First Name :</label>
<div class="col-sm-10" id="fname">
	<?php echo $_SESSION['logArr']['firstname']; ?>
</div>

<label for="lname" class="col-sm-2 control-label">Last Name :</label>
<div class="col-sm-10" id="lname">
	<?php echo $_SESSION['logArr']['lastname']; ?>
</div>

<label for="email" class="col-sm-2 control-label">Email :</label>
<div class="col-sm-10" id="email">
	<?php echo $_SESSION['logArr']['account']; ?>
</div>

<label for="type" class="col-sm-2 control-label">Account Type :</label>
<div class="col-sm-10" id="type">
	<?php
		if($accountType == '0'){
			echo "User";
		} else if($accountType == '2') {
			echo "Reseller";
		} else if($accountType == '1') {
			echo "PlainTech Employ";
		} else {
			echo "Unknown";
		}
	?>
</div>


<br />

<?php 

	echo "<pre>";
	print_r($_SESSION);

?>

