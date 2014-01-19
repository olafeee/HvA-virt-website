<?php
$value = $this->editContenVar;
print_r($value);
?>
<form name="input" action="/cmsPlaintech/insertContent/" method="post">
	text: <input type="text" name="cmstext">
	<input type="text" name="cwid">
	<input type="submit" value="Submit">
</form>