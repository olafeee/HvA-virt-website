<div class="row">
	<div class="col-md-2">
		<?php require 'inc/header.php'; ?>
	</div>
	<div class="col-md-7">
		<?php 
		$pages = $this->cmstext;

	        $i = 0;
		    while ($i < count($pages)) {
		    	echo '<a href="/cmsPlaintech/viewPage/'. $pages[$i]["pageid"] .'">'.$pages[$i]["page"].'</a>';
		    	echo"<br/>";
		    	$i++;
		    }
		?>
		<a href="/cmsPlaintech/manangeVpsParts/CPU"><button type="button" class="btn btn-info">CPU</button></a>
		<a href="/cmsPlaintech/manangeVpsParts/RAM"><button type="button" class="btn btn-info">RAM</button></a>
		<a href="/cmsPlaintech/manangeVpsParts/Disk"><button type="button" class="btn btn-info">DISK</button></a>
	</div>
</div>
	<div class="col-md-3"></div>
