<?php

$manageUser = $this->manageUser;
$allRoles = $this->allRoles;
?>
<?php require 'inc/header.php'; ?>


<div class="tab-pane">
  <div class="col-md-9" role="main">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Manage Priviliges of <?php echo $manageUser[0]['firstname'].' '.$manageUser[0]['lastname'] ?></h3>
      </div>
      <div class="panel-body">
 		<table class="table table-striped">
 			<h4>General Information</h4>
			<thead>
				<tr>
					<td>Username</td>
					<td>First Name</td>
					<td>Last Name</td>
					<td>Role</td>
				</tr>
			</thead>
			<tbody>
			<tr>
		    	<?php
		 			echo '<td>'.$manageUser[0]['username'].'</td>';
		 			echo '<td>'.$manageUser[0]['firstname'].'</td>';
		 			echo '<td>'.$manageUser[0]['lastname'].'</td>';
		 			echo '<td>'.$manageUser[0]['rol_naam'].'</td>'
				?>
			</tr>
		
		<table class="table table-striped">
			<h4>Manage Roles</h4>
		<tr>
			<td>Roles</td>
			<td>Action</td>
		</tr>
		<?php
		$i = 0;

		while ($i < count($manageUser)) {
			echo '<tr>';
			echo '<td>'.$manageUser[$i]['rol_naam'].'</td>';
			echo '<td><a href="/cmsPlaintech/deletePrivileges/'.$manageUser[$i]['rol_id'].'/'.$manageUser[$i]['CSID'].'/'.$manageUser[$i]['username'].'"><button type="button" class="btn btn-danger">Delete</button></a></td>';
			echo "</tr>";
			$i++;
		}

		?>
		</table>
			</tbody>
		<table>
		<br/>
		<h4>Add user to the following group</h4>
		<table class="table table-condensed">
		<tr>
		<div class="privilegesForm">
		<form name="input" action="/cmsPlaintech/addPrivileges" onsubmit="return checkInp()" method="post">
			<input type="hidden" name="CSID" value="<?php echo $manageUser[0]['CSID']; ?>">
			<input type="hidden" name="username" value="<?php echo $manageUser[0]['username']; ?>">
			<div align="left">
			<select class="form-control bfh-countries" id="rol_id" name="rol_id">
			<?php
			 	$y=0;
			 	
			 	while ($y < count($allRoles)) {
			 		echo'<option value="'.$allRoles[$y]['rol_id'].'">'.$allRoles[$y]['rol_naam'].'</option>';
			 		$y++;
			 	}

			 	?>
			 </select>
			</div>
	       <!-- <div class="faultMVP"></div> -->
	        	<div align="left"><button class="btn btn-lg btn-primary btn-block btn-soepmit" type="submit">Add</button></div>
	    </form>
		<br><br>
		<div align="left">
		<a href="/cmsPlaintech/searchPrivileges"><button type="button" class="btn btn-info">Back</button></a></td>
      </div>
      <br>
      </div>

    </div>
  </div><!-- END Col 9 -->
</div>




	

