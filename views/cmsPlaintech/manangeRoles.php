<?php require 'inc/header.php'; ?>
<?php
			$text = $this->rolesMR;
			$username = $this->username;
?>

<div class="tab-pane">
  <div class="col-md-9" role="main">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Manange Roles of <?php echo $username;?> </h3>
      </div>
      <div class="panel-body">
		<div class="viewPageTable">
		<?php
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
    </div>
  </div><!-- END Col 9 -->
</div>