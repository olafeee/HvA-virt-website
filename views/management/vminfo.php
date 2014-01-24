<?php 

/* ******************************
** Account Tab on Management Page
** ******************************/

$vmResponse = $this->vmResponse;

// Check the state of the vm:
if(strcmp($vmResponse['state'],'running') == 0) {
  $state = '<span class="label label-success">Running</span>';
} else if(strcmp($vmResponse['state'],'stopping') == 0) {
  $state = '<span class="label label-danger">Stopping</span>';
} else if(strcmp($vmResponse['state'],'stopped') == 0) {
  $state = '<span class="label label-danger">Stopped</span>';
} else if(strcmp($vmResponse['state'],'Expunging') == 0) {
  $state = '<span class="label label-default">Deleted</span>';
} else {
  $state = '<span class="label label-default">Unknown</span>';
}

include('template.php');
?>

<div class="tab-pane">
  <div class="col-md-9" role="main">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Virtual Machine Panel</h3>
      </div>
      <div class="panel-body">

        <h4><span class="glyphicon glyphicon-list-alt"></span>   System Information</h4><hr />
        
        <table id="vertical-1">
          <caption>First Way</caption>
          <tr>
            <th>Name: </th>
            <td><?php echo $vmResponse['name']; ?></td>
          </tr>
          <tr>
            <th>Status: </th>
            <td><?php echo $state; ?></td>
          </tr>
          <tr>
            <th></th>
            <td></td>
          </tr>
        </table>





      	<br /><br /><br />


        <!-- VM Controls -->
        <h4><span class="glyphicon glyphicon-cog"></span>   System Controls</h4><hr />


      	<button type="button" class="btn btn-primary" style="margin-bottom:5px; width:125px;" href="/management/api">Start / Stop VM</button>
        
        <!-- Restart VM -->
        <form action="/management/vmcontrol" role="form" method="post">
          <input type="hidden" name="command" value="restart" />
          <input type="hidden" name="vmid" value="<?php echo 'e86a8cce-af66-42a9-9e94-695aa6ece678' ?>" />
          <button type="submit" class="btn btn-primary" style="margin-bottom:5px; width:125px;">Restart VM</button>
        </form>

      	<a type="button" class="btn btn-primary" style="margin-bottom:5px; width:125px;" href="/management/api">VM Console</a>
      	<a type="button" class="btn btn-primary" style="margin-bottom:5px; width:125px;" href="/management/api">Backup VM</a>
      	<a type="button" class="btn btn-danger" style="margin-bottom:5px; width:125px;" href="/management/api"><span class="glyphicon glyphicon-exclamation-sign"></span>  Destroy VM</a>
      	<a type="button" class="btn btn-primary" style="margin-bottom:5px; width:125px;" href="">Upgrade VM</a>

        <br />
      </div>
    </div>
  </div><!-- END Col 9 -->
</div>



