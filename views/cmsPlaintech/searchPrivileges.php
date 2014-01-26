<?php require 'inc/header.php'; ?>


<div class="tab-pane">
  <div class="col-md-9" role="main">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Search for User</h3>
      </div>
      <div class="panel-body">
      	<form class="form-signin" action="/cmsPlaintech/searchPrivileges" method="post">
        <input type="text" class="form-control" placeholder="firstname of lastname" required="" autofocus="" name="name">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Search</button>
      </form>
	<table class="table table-striped">
		<tr>
			<td>First name</td>
			<td>Last name</td>
			<td>Email</td>
			<td>View</td>
		</tr>
		<tr>
		<?php

		if(isset($this->nameFound)){
			$nameFound = $this->nameFound;

			$i = 0;
			while ($i < count($nameFound)) {
				// echo $nameFound[$i]['username'];
				echo '<td>'.$nameFound[$i]['firstname'].'</td>';
				echo '<td>'.$nameFound[$i]['lastname'].'</td>';
				echo '<td>'.$nameFound[$i]['username'].'</td>';
				// echo '<a href="/cmsPlaintech/managePrivileges/'.$nameFound[$i]['CSID'].'/'.$nameFound[$i]['username'].'">Bekijk</a>';
				// echo '</br>';
				$i++;
			}
		}

		?>
	</tr>
	</table>
      </div>
    </div>
  </div><!-- END Col 9 -->
</div>
