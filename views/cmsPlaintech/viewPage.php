<?php require 'inc/header.php'; ?>


<div class="tab-pane">
  <div class="col-md-9" role="main">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Virtual Machine Panel</h3>
      </div>
      <div class="panel-body">
		<div class="viewPageTable">
		<div class="viewPageTable">
		<?php

			$text = $this->viewpage;
			//print_r($text);
			$i = 0;
			while ($i < count($text)) {
				echo '<div class="divTable"><div class="divRow">';
				echo '<div class="divColumn-ID">page id = '.$text[$i]["cwid"].'</div>';
				echo '<div class="divColumn-Button"><a href="/cmsPlaintech/editContent/'.$text[$i]["pageid"].'/'.$text[$i]["cwid"].'"><button type="button" class="btn btn-info">Edit</button></a></div>';
				echo '</div><div <div class="divRow divRow-Text">';
				echo '<div class="divColumn-Text">'.$text[$i]["cmstext"].'</div>';
				echo '</div></div>';
				$i++;
			}

		?>
	</div>
	</div>
      </div>
    </div>
  </div><!-- END Col 9 -->
</div>


