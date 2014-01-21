    <ul class="nav nav-pills navCM">
    	<li><a href="/cmsPlaintech/">Index</a></li>
    <?php 
		$pages = $this->cmstext;

	        $i = 0;
		    while ($i < count($pages)) {
		    	echo '<li><a href="/cmsPlaintech/viewPage/'. $pages[$i]["pageid"] .'">'.$pages[$i]["page"].'</a></li>';
		    	$i++;
		    }
		?>
	<li><a href="/cmsPlaintech/manangeVpsParts/CPU">CPU Price</a></li>
	<li><a href="/cmsPlaintech/manangeVpsParts/RAM">RAM Price</a></li>
	<li><a href="/cmsPlaintech/manangeVpsParts/Disk">Disk Price</a></li>
</ul>
