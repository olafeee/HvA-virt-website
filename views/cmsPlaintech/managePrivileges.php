<?php

$manageUser = $this->manageUser;

$i = 0;
echo $manageUser[0]['username'];
echo $manageUser[0]['firstname'];
echo $manageUser[0]['lastname'];

while ($i < count($manageUser)) {
	echo $manageUser[$i]['rol_naam'];
	echo "<br/>";
	echo '<a href="/cmsPlaintech/deletePrivileges/'.$manageUser[$i]['rol_id'];.'/'.$manageUser[$i]['CSID'].'"></a>';
	echo "<br/>";
	$i++;
}

?>

