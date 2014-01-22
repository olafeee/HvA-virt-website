<!--<script>
  $('#tabs a').click(function (e) {
    e.preventDefault()
    $(this).tab('show')
  })
</script>-->


<div class="row">

  <div class="col-md-3">

    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">Panel title</h3>
      </div>
      <div class="list-group">
        <a href="#tab1" class="list-group-item" data-toggle="tab">Machine Pannel</a>
        <a href="#tab2" class="list-group-item" data-toggle="tab">Account Settings</a>
        <a href="#tab3" class="list-group-item" data-toggle="tab">Invoice Overview</a>
        <a href="#" class="list-group-item" data-toggle="tab">Admin Page</a>
      </div>
    </div>

  </div> <!-- END Col 3 -->

  <div class="tab-content">

    <div class="tab-pane active" id="tab1">
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

    <div class="tab-pane" id="tab2">
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

    <div class="tab-pane" id="tab3">
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

<script>
  $(function () {
    $('#myTab a:last').tab('show')
  })
</script>