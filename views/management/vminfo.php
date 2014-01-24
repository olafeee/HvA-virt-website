<?php 

/* ******************************
** Account Tab on Management Page
** ******************************/

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
        
      	<div class="label label-danger">Stopped</div><br /><br /><br />

        <h4><span class="glyphicon glyphicon-cog"></span>   System Controls</h4><hr />

      	<button type="button" class="btn btn-primary" style="margin-bottom:5px; width:125px;" href="/management/api">Start / Stop VM</button>
        
        <!-- Restart VM -->
        <form action="/management/vmcontrol" methode="POST" role="form" id="restart">
          <input name="command" value="restart" />
          <input name="vmid" value="<?php echo 'be77cacc-1124-4c8b-8017-878e98ba7101' ?>" />
          <input type="submit"> 
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



