<?php

$manageUser = $this->manageUser;

$i = 0;
echo $manageUser[0]['username'];
echo $manageUser[0]['firstname'];
echo $manageUser[0]['lastname'];

while ($i < count($manageUser)) {
	echo $manageUser[$i]['rol_naam'];
	$i++;
}

?>

