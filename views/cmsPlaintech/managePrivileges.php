<?php

$manageUser = $this->manageUser;
$allRoles = $this->allRoles;
?>
<?php require 'inc/header.php'; ?>


<div class="tab-pane">
  <div class="col-md-9" role="main">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Manange Roles of <?php echo $manageUser[0]['firstname'].' '.$manageUser[0]['lastname'] ?></h3>
      </div>
      <div class="panel-body">
      	<?php
		echo $manageUser[0]['username'].'<br/>';
		echo $manageUser[0]['firstname'].'<br/>';
		echo $manageUser[0]['lastname'].'<br/>';
		?>
 		<table class="table">
			<thead>
				<tr>
					<td>Role</td>
					<td></td>
				</tr>
			</thead>
			<tbody>
		<?php
		$i = 0;

		while ($i < count($manageUser)) {
			echo '<tr>';
			echo '<td>'.$manageUser[$i]['rol_naam'].'</td>';
			echo '<td><a href="/cmsPlaintech/deletePrivileges/'.$manageUser[$i]['rol_id'].'/'.$manageUser[$i]['CSID'].'"><button type="button" class="btn btn-danger">Delete</button></a></td>';
			echo "</tr>";
			$i++;
		}

		?>
			</tbody>
		</table>
		<br/>
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
	        <div class="faultMVP"></div>
	        <button class="btn btn-lg btn-primary btn-block btn-soepmit" type="submit">Add</button>
	    </form>

		</div>


      </div>
    </div>
  </div><!-- END Col 9 -->
</div>




	

