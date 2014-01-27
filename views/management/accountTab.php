<?php 

/* ******************************
** Account Tab on Management Page
** ******************************/

$accountInfo = $this->accountInfo[0];
//include('template.php');
?>


      <div class="panel-heading">
        <h3 class="panel-title">Account Panel</h3>
      </div>
      <div class="panel-body">
        
      	<h4><span class="glyphicon glyphicon-user"></span>   Account Information</h4><hr />

      	<table>
	      <tr>
	        <th class="right-table">First Name : </th>
	        <td class="left-table"><?php echo $accountInfo['firstname']; ?></td>
	      </tr>
	      <tr>
	        <th class="right-table">Last Name : </th>
	        <td class="left-table"><?php echo $accountInfo['lastname']; ?></td>
	      </tr>
	      <tr>
	        <th class="right-table">Username : </th>
	        <td class="left-table"><?php echo $accountInfo['username']; ?></td>
	      </tr>
	      <tr>
	        <th class="right-table">Phone : </th>
	        <td class="left-table"><?php echo $accountInfo['phone']; ?></td>
	      </tr>
	      <?php if($accountInfo['reseller'] == "TRUE"){?>
		    <tr>
		    	<th class="right-table">Reseller : </th>
		        <td class="left-table"><span class="glyphicon glyphicon-check"></td>
		    </tr>
		<?php }
		?>
	    </table>

	    <br />

	    <h4><span class="glyphicon glyphicon-home"></span>   General Information</h4> 
		<div class="editGI"><a href="javascript:showEditstreet()"><button type="button" class="btn btn-info">Edit</button></a></div><hr />

	    <table>
	      <tr>
	        <th class="right-table">Street : </th>
	        <td class="left-table"><?php echo $accountInfo['adstr']; ?></td>
	      </tr>
	      <tr>
	        <th class="right-table">Place : </th>
	        <td class="left-table"><?php echo $accountInfo['adzip'].' '.$accountInfo['adcit']; ?></td>
	      </tr>
	      <tr>
	        <th class="right-table">Country : </th>
	        <td class="left-table"><?php echo $accountInfo['country']; ?></td>
	      </tr>
	    </table>

	    <br />

		<h4><span class="glyphicon glyphicon-euro"></span>   Payment Information</h4><hr />

		Filler here<br />

        <br />
     </div>


