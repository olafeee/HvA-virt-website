<?php

$manageUser = $this->manageUser;
$allRoles = $this->allRoles;

$i = 0;
echo $manageUser[0]['username'];
echo $manageUser[0]['firstname'];
echo $manageUser[0]['lastname'];

while ($i < count($manageUser)) {
	echo $manageUser[$i]['rol_naam'];
	echo "<br/>";
	echo '<a href="/cmsPlaintech/deletePrivileges/'.$manageUser[$i]['rol_id'].'/'.$manageUser[$i]['CSID'].'">verijwder</a>';
	echo "<br/>";
	$i++;
}

?>

 <select class="form-control bfh-countries" id="role" name="role">
 	<?php
 	$y=9;
 	print_r($allRoles);
 	while ($y < count($allRoles)) {
 		echo'<option value="">Saab</option>';
 	}

 	print_r($allRoles);
 	?>
 </select>

