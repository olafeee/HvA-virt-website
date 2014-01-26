<?php

$manageUser = $this->manageUser;
$allRoles = $this->allRoles;
$accountInfo = $this->accountInfo[0];
?>
<?php require 'inc/header.php'; ?>


<div class="tab-pane">
  <div class="col-md-9" role="main">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Manange Roles of <?php echo $manageUser[0]['firstname'].' '.$manageUser[0]['lastname'] ?></h3>
      </div>
      <div class="panel-body">
 		<table class="table table-striped">
			<thead>
				<!--
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
				-->
		<h4><span class="glyphicon glyphicon-user"></span>   Account Information</h4><hr />

		<label for="fname" class="col-sm-2 control-label">First Name :</label>
		<div class="col-sm-10">
			<p id="fname" name="fname"><?php echo $accountInfo['firstname']; ?></p>
		</div>

		<label for="lname" class="col-sm-2 control-label">Last Name :</label>
		<div class="col-sm-10">
			<p id="lname"><?php echo $accountInfo['lastname']; ?></p>
		</div>

		<label for="email" class="col-sm-2 control-label">Email :</label>
		<div class="col-sm-10">
			<p id="email"><?php echo $accountInfo['username']; ?></p>
		</div>
		<label for="phone" class="col-sm-2 control-label">Phone :</label>
		<div class="col-sm-10">
			<p id="email"><?php echo $accountInfo['phone']; ?></p>
		</div>
		<?php if($accountInfo['reseller'] == "TRUE"){?>
		<label for="reseller" class="col-sm-2 control-label">Reseller :</label>
		<div class="col-sm-10">
			<p id="email"><span class="glyphicon glyphicon-check"></p>
		</div>

		<?php }
		?>

		<h4><span class="glyphicon glyphicon-home"></span>   General Information</h4><hr />

		<label for="adstr" class="col-sm-2 control-label">Street :</label>
		<div class="col-sm-10">
			<p id="email"><?php echo $accountInfo['adstr']; ?></p>
		</div>
		<label for="adzip-adcit" class="col-sm-2 control-label">Place :</label>
		<div class="col-sm-10">
			<p id="email"><?php echo $accountInfo['adzip'].' '.$accountInfo['adcit']; ?></p>
		</div>
		<label for="country" class="col-sm-2 control-label">Country :</label>
		<div class="col-sm-10">
			<p id="email"><?php echo $accountInfo['country']; ?></p>
		</div>
		<?php
		$i = 0;

		while ($i < count($manageUser)) {
			echo '<tr>';
			// echo '<td>'.$manageUser[$i]['rol_naam'].'</td>';
			echo '<td><a href="/cmsPlaintech/deletePrivileges/'.$manageUser[$i]['rol_id'].'/'.$manageUser[$i]['CSID'].'"><button type="button" class="btn btn-danger">Delete User</button></a></td>';
			echo "</tr>";
			$i++;
		}

		?>
			</tbody>
		</table>
		<br/>
		<h4>Add user to the following group:</h4>
		<div class="privilegesForm">
		<form name="input" action="/cmsPlaintech/addPrivileges" onsubmit="return checkInp()" method="post">
			<input type="hidden" name="CSID" value="<?php echo $manageUser[0]['CSID']; ?>">
			<select class="form-control bfh-countries" id="rol_id" name="rol_id">
			<?php
			 	$y=0;
			 	
			 	while ($y < count($allRoles)) {
			 		echo'<option value="'.$allRoles[$y]['rol_id'].'">'.$allRoles[$y]['rol_naam'].'</option>';
			 		$y++;
			 	}

			 	?>
			 </select>
	       <!-- <div class="faultMVP"></div> * -->
	        <button class="btn btn-lg btn-primary btn-block btn-soepmit" type="submit">Add</button>
	    </form>

		</div>
<br><br>
<a href="/cmsPlaintech/searchPrivileges"><button type="button" class="btn btn-info">Back</button></a></td>

      </div>
    </div>
  </div><!-- END Col 9 -->
</div>




	

