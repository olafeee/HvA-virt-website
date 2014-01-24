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
        
      	<div class="label label-danger">Stopped</div><br /><br />

        <h4><span class="glyphicon glyphicon-cog"></span>   Systems Controls</h4><hr />

      	<button type="button" class="btn btn-primary">Start / Stop VM</button>
      	<button type="button" class="btn btn-primary">Restart VM</button>
      	<button type="button" class="btn btn-primary">VM Console</button>
      	<button type="button" class="btn btn-primary">Backup VM</button>
      	<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-exclamation-sign"></span>  Destroy VM</button>
      	<button type="button" class="btn btn-primary">Upgrade VM</button>

        <br />
      </div>
    </div>
  </div><!-- END Col 9 -->
</div>



