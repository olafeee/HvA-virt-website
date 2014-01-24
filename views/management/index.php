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
            print_r($vmResponse);
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
              
              <tr id="<?php echo $vmResponse[$i]['id']; ?>" class="success ">
                <a href="/management/vminfo/<?php echo $i; ?>">
                  <td class"displayname"><?php echo $vmResponse['virtualmachine'][$i]['displayname'];?></td>
                  <td class="IPAdres"><?php echo $vmResponse['virtualmachine'][$i]['nic'][0]['ipaddress']." / ". ($vmResponse['virtualmachine'][$i]["nic"][0]["netmask"]);?></td>
                  <td class="status"><?php echo $vmResponse['virtualmachine'][$i]['state'];?></td>
                </a>
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
