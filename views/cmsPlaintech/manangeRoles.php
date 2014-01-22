<div class="row">
	<div class="col-md-2">
		<?php require 'inc/header.php'; ?>
	</div>
	<div class="col-md-7">
		<div class="viewPageTable">
		<?php

			$text = $this->rolesMR;
			//print_r($text);
			$i = 0;
			while ($i < count($text)) {
				echo '<div class="divTable"><div class="divRow">';
				//echo '<div class="divColumn-Button"><a href="/cmsPlaintech/editContent/'.$text[$i]["pageid"].'/'.$text[$i]["cwid"].'"><button type="button" class="btn btn-info">Edit</button></a></div>';
				echo '<div class="divColumn-Text">'.$text[$i]["pageid"].'</div>';
				echo '<div class="divColumn-Text">'.$text[$i]["rol_id"].'</div>';
				echo '</div></div>';
				$i++;
			}

		?>
	</div>
	</div>
	<div class="col-md-3"></div>
</div>
	