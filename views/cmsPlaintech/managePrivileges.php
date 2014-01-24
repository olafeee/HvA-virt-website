<?php

$manageUser = $this->manageUser;
$allRoles = $this->allRoles;
?>

<div class="row">
	<div class="col-md-2">
		<?php require 'inc/header.php'; ?>
	</div>
	<div class="col-md-7">
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
		echo $manageUser[0]['username'];
		echo $manageUser[0]['firstname'];
		echo $manageUser[0]['lastname'];

		while ($i < count($manageUser)) {
			echo $manageUser[$i]['rol_naam'];
			echo "<br/>";
			echo '<a href="/cmsPlaintech/deletePrivileges/'.$manageUser[$i]['rol_id'].'/'.$manageUser[$i]['CSID'].'">verijwder</a>';
			echo "<br/>";
			$i++;
		}

		?>
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




	

