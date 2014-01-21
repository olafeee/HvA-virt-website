    <ul class="nav nav-pills navCM">
    <?php 
		$pages = $this->cmstext;

	        $i = 0;
		    while ($i < count($pages)) {
		    	echo '<li><a href="/cmsPlaintech/viewPage/'. $pages[$i]["pageid"] .'">'.$pages[$i]["page"].'</a></li>';
		    	echo"<br/>";
		    	$i++;
		    }
		?>
	<li><a href="/cmsPlaintech/">Index</a></li>
	<li><a href="/cmsPlaintech/index">Index</a></li>
	<li><a href="/cmsPlaintech/manangeVpsParts/Disk">Disk Price</a></li>
</ul>
