<div class="row">
	<div class="col-md-12">
		<?php 
		print_r($this->cmstext);

	        $i = 0;
		    while ($i < count($cmstext)) {
		    	echo $cmstext[$i]["page"];
		    	$i++;
		    }

		?>
	</div>
</div>