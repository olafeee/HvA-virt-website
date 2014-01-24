<?php 
include('template.php'); 

$vmResponce;
?>


<div class="tab-pane" id="tab3">
  <div class="col-md-9" role="main">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">System Overview</h3>
      </div>
      <div class="panel-body">
        
        <!-- Start VM listing here -->
        <table class="table">
        <thead>
          <tr>
            <th>VM</th>
            <th>IP Address</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $i = 0;
            $maxArray = count($vmResponce);
            while ($i < $maxArray) { 
          ?>
              <a href="/management/vminfo/<?php echo $xy; ?>">
                <tr id="<?php echo $vmResponce[$i]['id']; ?>" class="success">
                  <td class"displayname"><?php echo $vmResponce[$i]['displayname'];?></td>
                  <td class="IPAdres"><?php echo $vmResponce[$i]['nic'][0]['ipaddress']." /". prefixSubnet($vmResponce[$xy]["nic"][0]["netmask"]);?></td>
                  <td class="status"><?php echo $vmResponce[$i]['state'];?></td>
                  <td></td>
                </tr>
              </a>
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
