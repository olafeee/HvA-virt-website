
<div class="row">
	<div class="col-md-2">
		<?php require 'inc/header.php'; ?>
	</div>
	<div class="col-md-7">
<?php

	$text = $this->viewpage;
	print_r($text);
	$i = 0;
	while ($i < count($text)) {
		echo 'number = '.$text[$i]["cwid"];
		echo"<br/>";
		echo $text[$i]["cmstext"];
		echo"<br/>";
		echo '<a href="/cmsPlaintech/editContent/'.$text[$i]["pageid"].'/'.$text[$i]["cwid"].'">X</a>';
		echo"<br/>";
		$i++;
	}

?>
	</div>
</div>
	<div class="col-md-3"></div>


