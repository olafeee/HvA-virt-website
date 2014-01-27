<?php 
$accountInfo = $this->accountInfo[0];
?>

<div class="Warningdiv">
  <div class="panel panel-danger">
    <div class="panel-heading">
      <h3 class="panel-title"><span class="glyphicon glyphicon-exclamation-sign"></span>  Warning!</h3>
    </div>
    <div class="panel-body">
      <p>Are you sure you want to destroy this system?</p>
      <a href="javascript:hideWarning()"><button type="button" class="btn btn-info" style="margin-bottom:5px; width:125px;">Cancel</button></a>
      <a href="javascript:hideWarning()"><button type="button" class="btn btn-danger sendCmdButton" id="destroy" style="margin-bottom:5px; min-width:125px;"><span class="glyphicon glyphicon-exclamation-sign"></span>  Destroy System</button></a>
    </div>
  </div>
</div>

<div class="Editstreetdiv">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">Edit General Information</h3>
    </div>
    <div class="panel-body">
      <form name="input" action="/management/changeGI" method="post">
        <input type="text" class="form-control" id="adstr" name="adstr"  value="<?php echo $accountInfo['adstr']; ?>">
        <input type="text" class="form-control" id="adzip" name="adzip"  value="<?php echo $accountInfo['adzip']; ?>">
        <input type="text" class="form-control" id="adcit" name="adcit" value="<?php echo $accountInfo['adcit']; ?>">
        <a href="javascript:hideEditstreet()"><button type="button" class="btn btn-info">Cancel</button></a>
        <button class="btn btn-success" type="submit" >Save</button>
     </form>

    </div>
  </div>
</div>



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
        <a id="nav-invoiceTab" class="list-group-item" style="cursor: pointer;">Invoice Overview</a>
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

$('#nav-invoiceTab').click(function (){
  var num = $(this).attr('id');
  args={page: num};
  url='/management/invoiceTab';
  $('#vmContentWindow').load(url);
  refresh='false';
});

$(document).ready(function() {
  $.ajaxSetup({ 
    cache: false 
  }); // This part addresses an IE bug.  without it, IE will only load the first number and will never refresh
  $('#vmContentWindow').load(url); // Faster initial load
  if(refresh=='true') {
      setInterval(function() {
        $('#vmContentWindow').load(url, args);
      }, 3000);// the "3000" here refers to the time to refresh the div.  it is in milliseconds. 
  } 
});


</script>