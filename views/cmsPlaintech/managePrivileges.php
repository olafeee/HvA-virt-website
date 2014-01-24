<?php

$manageUser = $this->manageUser;
$allRoles = $this->allRoles;
?>

<div class="row">
	<div class="col-md-2">
		<?php require 'inc/header.php'; ?>
	</div>
	<div class="col-md-7">
		<?php
		echo $manageUser[0]['username'].'<br/>';
		echo $manageUser[0]['firstname'].'<br/>';
		echo $manageUser[0]['lastname'].'<br/>';
		?>
		<table class="table">
			<thead>
				<tr>
					<td>GB</td>
					<td>Price</td>
					<td></td>
				</tr>
			</thead>
			<tbody>
		<?php
		$i = 0;

		while ($i < count($manageUser)) {
			echo '<tr>';
			echo '<td>'.$manageUser[$i]['rol_naam'].'</td>';
			echo '<td><a href="/cmsPlaintech/deletePrivileges/'.$manageUser[$i]['rol_id'].'/'.$manageUser[$i]['CSID'].'"><button type="button" class="btn btn-primary">Delete</button></a></td>';
			echo "</tr>";
			$i++;
		}

		?>
			</tbody>
		</table>
		<div class="privilegesForm">
			<select class="form-control bfh-countries" id="role" name="role">
			<?php
			 	$y=0;
			 	
			 	while ($y < count($allRoles)) {
			 		echo'<option value="'.$allRoles[$y]['rol_id'].'">'.$allRoles[$y]['rol_naam'].'</option>';
			 		$y++;
			 	}

			 	?>
			 </select>
		</div>


</div><!--eind col-md-7 -->
<div class="col-md-3"></div>	
</div>




	

