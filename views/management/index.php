<script>
  $(function() {
    $( "#tabs" ).tabs();
  });
</script>


<div class="row">

  <div id="tabs">

    <div class="col-md-3">

      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">Panel title</h3>
        </div>
        <div class="list-group">
          <a href="#tabs-1" class="list-group-item">Machine Pannel</a>
          <a href="#tabs-2" class="list-group-item">Account Settings</a>
          <a href="#tabs-3" class="list-group-item">Invoice Overview</a>
          <a href="#" class="list-group-item">Admin Page</a>
        </div>
      </div>

    </div> <!-- END Col 3 -->

    <div id="tabs-1">

      <div class="col-md-9" role="main">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title">Panel title</h3>
          </div>
          <div class="panel-body">
            <a href="javascript:window.open('/management/console','VM NAME HERE','width=800,height=500')">Open window 1111111111</a>
            <br />
          </div>
        </div>
      </div><!-- END Col 9 -->

    </div>

    <div id="tabs-2">

      <div class="col-md-9" role="main">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title">Panel title</h3>
          </div>
          <div class="panel-body">
            <a href="javascript:window.open('/management/console','VM NAME HERE','width=800,height=500')">Open window 22222222222222 </a>
            <br />
          </div>
        </div>
      </div><!-- END Col 9 -->
      
    </div>

    <div id="tabs-3">

      <div class="col-md-9" role="main">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title">Panel title</h3>
          </div>
          <div class="panel-body">
            <a href="javascript:window.open('/management/console','VM NAME HERE','width=800,height=500')">Open window333333333333333333</a>
            <br />
          </div>
        </div>
      </div><!-- END Col 9 -->
      
    </div>

  </div><!-- End Div tabs -->

</div>