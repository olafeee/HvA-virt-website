
<div class="row">
	<div class="col-md-2">
		<?php require 'inc/header.php'; ?>
	</div>
	<div class="col-md-7">
		<?php

			$text = $this->viewpage;
			//print_r($text);
			$i = 0;
			while ($i < count($text)) {
				echo '<div class="divTable"><div class="divRow">';
				echo '<div class="divColumn">page id = '.$text[$i]["cwid"].'</div>';
				echo '<div class="divColumn"><a href="/cmsPlaintech/editContent/'.$text[$i]["pageid"].'/'.$text[$i]["cwid"].'"><button type="button" class="btn btn-info">Edit</button></a></div>';
				echo '</div><div <div class="divRow">>';
				echo '<div class="divColumn">'.$text[$i]["cmstext"].'</div>';
				echo '</div></div>';
				$i++;
			}

		?>
	</div>
	<div class="col-md-3"></div>
</div>
	


