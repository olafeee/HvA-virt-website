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

      	<a type="button" class="btn btn-primary" style="padding-bottom:15px; width:125px;">Start / Stop VM</a>
      	<a type="button" class="btn btn-primary" style="width:125px; padding-bottom:5px;">Restart VM</a>
      	<a type="button" class="btn btn-primary" style="width:125px; padding-bottom:5px;">VM Console</a>
      	<a type="button" class="btn btn-primary" style="width:125px; padding-bottom:5px;">Backup VM</a>
      	<a type="button" class="btn btn-danger" style="width:125px; padding-bottom:5px;"><span class="glyphicon glyphicon-exclamation-sign"></span>  Destroy VM</a>
      	<a type="button" class="btn btn-primary" style="width:125px; padding-bottom:5px;">Upgrade VM</a>

        <br />
      </div>
    </div>
  </div><!-- END Col 9 -->
</div>



