<?php 

/* ******************************
** Account Tab on Management Page
** ******************************/

$accountDetials = 


echo "<pre>";
print_r($_SESSION);



?>

<label for="lname" class="col-sm-2 control-label">Last Name :</label>
<div class="col-sm-10" id="lname">
	<?php echo $_SESSION['logArr']['lastname']; ?>
</div>

