<?php
$value = $this->editContenVar;
print_r($value);
?>
<form name="input" action="/cmsPlaintech/insertContent/" method="post">
	text: <input type="text" name="cmstext" value="<?php echo $value[0]['cmstext']; ?>">
	value <input type="text" name="cwid" value="<?php echo $value[0]['cwid']; ?>">
	<input type="submit" value="Submit">
</form>