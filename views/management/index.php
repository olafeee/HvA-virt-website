<?php 
$accountInfo = $this->accountInfo[0];
print_r($accountInfo);
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
  //var queryString = $(this).next().val();
  url='/management/invoiceTab?';
  //$('#vmContentWindow').load(url + queryString);
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