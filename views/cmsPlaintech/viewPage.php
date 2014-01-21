
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
				echo '<table><tr>';
				echo '<td>page id = '.$text[$i]["cwid"].'</td>';
				echo '<td><a href="/cmsPlaintech/editContent/'.$text[$i]["pageid"].'/'.$text[$i]["cwid"].'"><button type="button" class="btn btn-info">Edit</button></a></td>';
				echo '</tr><tr>';
				echo '<td>'.$text[$i]["cmstext"].'</td>';
				echo '</tr></table>';
				$i++;
			}

		?>
	</div>
</div>
	<div class="col-md-3"></div>


