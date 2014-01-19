<div class="row">
	<div class="col-md-12">
		<?php 
		$pages = $this->cmstext;

	        $i = 0;
		    while ($i < count($pages)) {
		    	echo $pages[$i]["page"];
		    	$i++;
		    }

		?>
	</div>
</div>