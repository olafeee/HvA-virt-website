<?php 

?>


<!-- Navigation bar to the left -->
<div class="row">

  <div class="col-md-3">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Management Panel</h3>
      </div>
      <div class="list-group">
        <a id="nav-vmlist" class="list-group-item" style="cursor: pointer;">Systems Panel</a>
        <a id="nav-accountTab" class="list-group-item" style="cursor: pointer;">Account Info</a>
        <a href="/management/invoiceTab" class="list-group-item" style="cursor: pointer;">Invoice Overview</a>
      </div>
    </div>
  </div> <!-- END Col 3 -->

<!-- Content Window -->
<div class="col-md-9" role="main">
    <div class="panel panel-default" id="vmContentWindow">
      Loading...
    </div>
  </div>
</div>



<script type="text/javascript">
// Ajax Auto reload!
var url;
var refresh;
var args = {};

$( document ).ready(function() {
  url = '/management/vmlist';
  refresh='true';
});

$('#nav-vmlist').click(function (){
  url='/management/vmlist';
  $('#vmContentWindow').load(url);
});

$('.nav-vminfo').click(function (){
  var id = $(this).attr('id');
  args={vmid: id};
  url='/management/vminfo';
  $('#vmContentWindow').load(url, args);
});

$('#nav-accountTab').click(function (){
  url='/management/accountTab';
  $('#vmContentWindow').load(url);
});

$(document).ready(function() {
  $.ajaxSetup({ 
    cache: false 
  }); // This part addresses an IE bug.  without it, IE will only load the first number and will never refresh
  $('#vmContentWindow').load(url); // Faster initial load
  if(refresh=='true') {
      setInterval(function() {
        $('#vmContentWindow').load(url, args);
      }, 6000);// the "3000" here refers to the time to refresh the div.  it is in milliseconds. 
  } 
});

// Popups!
$(document).ready(function() {
  // $('head').append('<script type="text/javascript" src="script.js"><%2Fscript>');
  // $('head').append('<link href="style/style.css" rel="popupStyle.css" type="text/css" media="all" />');
});

</script>












<?php /*
<div class="tab-pane" id="tab3">
  <div class="col-md-9" role="main">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">System Overview</h3>
      </div>
      <div class="panel-body">
        
        <?php
          // Check if user has any Vms

        ?>


        <!-- Start VM listing here -->
        <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Address</th>
            <th>CPU</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $i = 0;
            //print_r($vmResponse);
            $maxArray = count($vmResponse['virtualmachine']);
            while ($i < $maxArray) { 
              if($vmResponse['virtualmachine'][$i]['state'] == 'Running' ) {
                $stateColor = 'alert-success';
              } else if($vmResponse['virtualmachine'][$i]['state'] == 'Stopped' ) {
                $stateColor = 'alert-danger';
              } else {
                $stateColor = '';
              }
          ?>
              
              <tr id="<?php echo $vmResponse[$i]['id']; ?>" class="success <?php echo $stateColor;?>" onclick="document.location= '/management/vminfo/<?php echo $vmResponse['virtualmachine'][$i]['id']; ?>';">
                <td class"displayname"><?php echo $vmResponse['virtualmachine'][$i]['displayname'];?></td>
                <td class="CPU"><?php echo $vmResponse['virtualmachine'][$i]["cpunumber"];?></td>
                <td class="CPUSPEED"><?php echo $vmResponse['virtualmachine'][$i]["cpuspeed"];?> Mhz</td>
                <td class="memory"><?php echo $vmResponse['virtualmachine'][$i]["memory"];?> MB</td>
                <td class="HHD">20GB</td>
                <td class="IPAdres"><?php echo $vmResponse['virtualmachine'][$i]['nic'][0]['ipaddress']." / ". prefixSubnet($vmResponse['virtualmachine'][$i]["nic"][0]["netmask"]);?></td>
                <td class="status"><?php echo $vmResponse['virtualmachine'][$i]['state'];?></td>
              </tr>
          <?php
              $i++;
            } // End While loop
          ?>
        </tbody>
        </table>
        
        <br />
      </div>
    </div>
  </div><!-- END Col 9 -->
</div>

<script type="text/javascript">
  // Zorg er voor dat de pagina om de paar seconde een refresh doet
  setTimeout(function () { location.reload(1); }, 6000);
</script>

*/ ?>
