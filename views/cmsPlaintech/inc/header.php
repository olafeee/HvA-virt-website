    <?php $pages = $this->cmstext;?>



 <div class="row">

  <div class="col-md-3">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Management Panel</h3>
      </div>
      <div class="list-group">
      	<?php
      		$i = 0;
		    while ($i < count($pages)) {
		    	echo '<a href="/cmsPlaintech/viewPage/'. $pages[$i]["pageid"] .'" class="list-group-item">'.$pages[$i]["page"].'</a>';
		    	$i++;
		    }
      	?>
      	<a href="/cmsPlaintech/manangeVpsParts/CPU" class="list-group-item">CPU Price</a>
		<a href="/cmsPlaintech/manangeVpsParts/RAM" class="list-group-item">RAM Price</a>
		<a href="/cmsPlaintech/manangeVpsParts/Disk" class="list-group-item">Disk Price</a>
        <a href="/cmsPlaintech/searchPrivileges" class="list-group-item">Search Privileges</a>
      </div>
    </div>

  </div> <!-- END Col 3 -->



