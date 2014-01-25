<?php 

/* ******************************
** Account Tab on Management Page
** ******************************/

$vmResponse = $this->vmResponse;

function prefixSubnet($input) {
  $subBin = explode( '.', $input );
  $subBinX = 0;
  $subnet = 0;
  while ($subBinX <= 3) {
    $x = decbin($subBin[$subBinX]);
    $var3 = strlen(str_replace('0', '', $x));
    $subnet = $subnet + $var3;
    $subBinX++;
  }
  return $subnet;
}

function getInfo($arrayKey) {
  if(!empty($vmResponse[0][$arrayKey])) {
    return $vmResponse[0][$arrayKey];
  } else {
    return '';
  }
}

$onOff = '';
// Check the state of the vm and make a lable for that state
if(strcmp($vmResponse[0]['state'],'Running') == 0) 
{
    $state = '<span class="label label-success">Running</span>';
    // Stop knop toevoegen
    $onOff .= '<button type="button" class="btn btn-primary sendCmdButton" id="btn_stop" style="margin-bottom:5px; width:125px;">Stop System</button> ';
    // Restart knop toevoegen
    $onOff .= '<button type="button" class="btn btn-primary sendCmdButton" id="btn_restart" style="margin-bottom:5px; width:125px;">Restart System</button> ';
} 
else if(strcmp($vmResponse[0]['state'],'Stopping') == 0) 
{
    $state = '<span class="label label-danger">Stopping</span>';
    // Disabled knop toevoegen
    $onOff .= '<button type="button" class="btn btn-default disabled" style="margin-bottom:5px; width:125px;">Start System</button> ';
    // Restart knop toevoegen
    //$onOff .= '<button type="button" class="btn btn-default disabled" style="margin-bottom:5px; width:125px;">Restart System</button>';
} 
else if(strcmp($vmResponse[0]['state'],'Stopped') == 0) 
{
    $state = '<span class="label label-danger">Stopped</span>';
    // Start knop toevoegen
    $onOff .= '<button type="button" class="btn btn-primary sendCmdButton" id="btn_start" style="margin-bottom:5px; width:125px;">Start System</button> ';
} 
else if(strcmp($vmResponse[0]['state'],'Expunging') == 0) 
{
    $state = '<span class="label label-default">Deleted</span>';
    $onOff .= '';
} 
else 
{
    $state = '<span class="label label-default">Unknown</span>';
    // Force On knop toevoegen
    $onOff .= '<button type="button" class="btn btn-default sendCmdButton" id="btn_start" style="margin-bottom:5px; width:125px;">Force On</button> ';
    // Force Off knop toevoegen
    $onOff .= '<button type="button" class="btn btn-default sendCmdButton" id="btn_stop" style="margin-bottom:5px; width:125px;">Force Off</button> ';
    // Force Restart knop toevoegen
    $onOff .= '<button type="button" class="btn btn-default sendCmdButton" id="btn_restart" style="margin-bottom:5px; width:125px;">Force Restart</button> ';
}

//include('template.php');
?>



<div class="panel-heading">
  <h3 class="panel-title"><?php echo $vmResponse[0]['name']; ?></h3>
</div>
<div class="panel-body">

<div class="row">
  <div class="col-md-12" role="main">
    <h4><span class="glyphicon glyphicon-list-alt"></span>   System Information</h4><hr />
  </div>
</div>
<div class="row">
  <div class="col-md-6" role="main">

    <table>
      <tr>
        <th class="right">Name: </th>
        <td><?php echo $vmResponse[0]['name']; ?></td>
      </tr>
      <tr>
        <th class="right">Status: </th>
        <td><?php echo $state; ?></td>
      </tr>
      <tr>
        <th class="right">Created: </th>
        <td><?php echo $vmResponse[0]['created']; ?></td>
      </tr>
      <tr>
        <th class="right">Template:</th>
        <td><?php echo $vmResponse[0]['templatedisplaytext']; ?></td>
      </tr>
      <tr>
        <th class="right">Iso: </th>
        <td><?php echo getInfo('isodisplaytext') ?></td>
      </tr>
      <tr>
        <th class="right">Address: </th>
        <td><?php echo $vmResponse[0]['nic'][0]['ipaddress']." / ". prefixSubnet($vmResponse[0]["nic"][0]["netmask"]);?></td>
      </tr>
    </table>
  </div>

  <div class="col-md-6" role="main">
    <table>
      <tr>
        <th class="right">Offering: </th>
        <td><?php echo $vmResponse[0]['serviceofferingname']; ?></td>
      </tr>
      <tr>
        <th class="right">CPUs: </th>
        <td><?php echo $vmResponse[0]['cpunumber']; ?></td>
      </tr>
      <tr>
        <th class="right">CPU Speed: </th>
        <td><?php echo $vmResponse[0]['cpuspeed']; ?></td>
      </tr>
      <tr>
        <th class="right">Memory: </th>
        <td><?php echo $vmResponse[0]['memory']; ?></td>
      </tr>
    </table>
  </div>
</div>

<br />

<div class="row">
  <div class="col-md-12" role="main">
  
    <!-- VM Controls -->
    <h4><span class="glyphicon glyphicon-cog"></span>   System Controls</h4><hr />

  	<?php echo $onOff; ?>

  	<button type="button" class="btn btn-primary sendCmdButton" id="btn_console" style="margin-bottom:5px; width:125px;">View Console</button>
  	<button type="button" class="btn btn-primary sendCmdButton disabled" id="btn_backup" style="margin-bottom:5px; width:125px;">Backup System</button>
  	<button type="button" class="btn btn-danger sendCmdButton" id="btn_destroy" style="margin-bottom:5px; width:125px;"><span class="glyphicon glyphicon-exclamation-sign"></span>  Destroy System</button>
  	<button type="button" class="btn btn-primary sendCmdButton disabled" id="btn_upgrade" style="margin-bottom:5px; width:125px;">Upgrade System !!!</button>

    <br />
  </div>

  </div>

</div>


<!-- Start VM form -->
<form id="form_start" action="/management/vmcontrol" role="form" method="post">
  <input type="hidden" name="command" value="start" />
  <input type="hidden" name="vmid" value="<?php echo $this->vmid ?>" />
</form>

<!-- Stop VM form -->
<form id="form_stop" action="/management/vmcontrol" role="form" method="post">
  <input type="hidden" name="command" value="stop" />
  <input type="hidden" name="vmid" value="<?php echo $this->vmid ?>" />
</form>

<!-- Restart VM form -->
<form id="form_restart" action="/management/vmcontrol" role="form" method="post">
  <input type="hidden" name="command" value="restart" />
  <input type="hidden" name="vmid" value="<?php echo $this->vmid ?>" />
</form>

<!--  -->
<form id="form_" action="/management/vmcontrol" role="form" method="post">
  <input type="hidden" name="command" value="" />
  <input type="hidden" name="vmid" value="" />
</form>

<!--  -->
<form id="form_" action="/management/vmcontrol" role="form" method="post">
  <input type="hidden" name="command" value="" />
  <input type="hidden" name="vmid" value="" />
</form>

<!--  -->
<form id="form_" action="/management/vmcontrol" role="form" method="post">
  <input type="hidden" name="command" value="" />
  <input type="hidden" name="vmid" value="" />
</form>

<script type="text/javascript">

  // Alle table headers align naar rechts geven
  $( ".right" ).css( "text-align", "right" );
  $( ".right" ).css( "margin-right", "35px" );
  $( ".right" ).css( "margin-bottum", "25px" );

  // Submit de form die toebehoort tot de button die is ingedrukt
  $('.sendCmdButton').click(function() { 
    var id = $(this).attr('id');
    id = id.replace('btn_', '#form_');
    $(id).submit(); 
  });

</script>

