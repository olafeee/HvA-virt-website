<?php
$value = $this->editContenVar;
print_r($value);
$test = $value[0];
?>
<script type="text/javascript">
$(document).ready(function(){
    var myArray = <?php print(json_encode($value)); ?>;
    console.log(myArray)
    alert(myArray);
});
</script>
<form name="input" action="/cmsPlaintech/insertContent/" method="post">
	<input type="text" name="cmstext" value="<?php echo $value[0]['cmstext']; ?>">
	<input type="text" name="pageid" value="<?php echo $value[0]['pageid']; ?>">
	<input type="hidden" name="cwid" value="<?php echo $value[0]['cwid']; ?>">
	<input type="submit" value="Submit">
</form>