<?php 
include('template.php'); 

$vmResponse = $this->vmResponse;
?>


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
            <th>VM</th>
            <th>IP Address</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $i = 0;
            $maxArray = count($vmResponse['virtualmachine']);
            while ($i < $maxArray) { 
          ?>
              <a href="/management/vminfo/<?php echo $xy; ?>">
                <tr id="<?php echo $vmResponse[$i]['id']; ?>" class="success">
                  <td class"displayname"><?php echo $vmResponse[$i]['displayname'];?></td>
                  <td class="IPAdres"><?php echo $vmResponse[$i]['nic'][0]['ipaddress']." /". prefixSubnet($vmResponse[$xy]["nic"][0]["netmask"]);?></td>
                  <td class="status"><?php echo $vmResponse[$i]['state'];?></td>
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
