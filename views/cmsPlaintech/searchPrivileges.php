




<?php require 'inc/header.php'; ?>


<div class="tab-pane">
  <div class="col-md-9" role="main">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Virtual Machine Panel</h3>
      </div>
      <div class="panel-body">
      	      <form class="form-signin" action="/cmsPlaintech/searchPrivileges" method="post">
        <input type="text" class="form-control" placeholder="firstname of lastname" required="" autofocus="" name="name">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Search</button>
      </form>
		<?php

		if(isset($this->nameFound)){
			$nameFound = $this->nameFound;

			$i = 0;
			while ($i < count($nameFound)) {
				echo $nameFound[$i]['username'];
				echo '</br>';
				echo '<a href="/cmsPlaintech/managePrivileges/'.$nameFound[$i]['CSID'].'">Bekijk</a>';
				echo '</br>';
				$i++;
			}
		}

		?>

      </div>
    </div>
  </div><!-- END Col 9 -->
</div>
