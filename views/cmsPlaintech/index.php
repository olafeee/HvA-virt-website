<div class="row">
	<div class="col-md-12">
		<?php 
		$pages = $this->cmstext;

	        $i = 0;
		    while ($i < count($pages)) {
		    	echo '<a href="/cmsPlaintech/viewPage/'. $pages[$i]["pageid"] .'">'.$pages[$i]["page"].'</a>';
		    	echo"<br/>";
		    	$i++;
		    }

		?>
		<script type="text/javascript">
		$(document).ready(function(){
		    var myArray = <?php print(json_encode($pages)); ?>;
		    console.log(myArray["cwid"])
		    alert(myArray[0][cwid]);
		});
		</script>

	</div>
</div>