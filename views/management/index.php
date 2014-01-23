
            <?php include('systemsTab.php'); ?>
            <br />
          </div>
        </div>
      </div><!-- END Col 9 -->
    </div>

    <div class="tab-pane" id="tab2">
      <div class="col-md-9" role="main">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Account Panel</h3>
          </div>
          <div class="panel-body">
            <?php include('accountTab.php'); ?>
            <br />
          </div>
        </div>
      </div><!-- END Col 9 -->
    </div>

    <div class="tab-pane" id="tab3">
      <div class="col-md-9" role="main">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Invoice Overview</h3>
          </div>
          <div class="panel-body">
            <?php include(''); ?>
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