<div class="row">

  <div class="col-md-3"></div>

    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">Panel title</h3>
      </div>
      <div class="panel-body">
        Panel content
      </div>

      <!-- List group -->
      <ul class="list-group nav nav-pills nav-stacked">
        <li class="list-group-item"><a href="#">Machine Pannel</a></li>
        <li class="list-group-item"><a href="#">Account Settings</a></li>
        <li class="list-group-item"><a href="#">Invoice Overview</a></li>
        <li class=""><a href="#">Admin Page</a></li>
      </ul>

    </div>
  </div>
  <div class="col-md-9" role="main">
    
    <center>
      <?php 
        $console_uuid = '163a66dc-1df6-4c75-b16f-2db34d91d026';
        $console_vps_name = 'ConsoleTest';
        $refresh = $_GET['refreshed'];
        if($refresh == ""){
            echo "<meta HTTP-EQUIV='REFRESH' content='5; url=vps-management.php?page_id=2&refreshed=1&vps_name=".$console_vps_name."&uuid=".$console_uuid."'> ";
        } 
                                            
        $link = "http://145.92.14.90:8080/client/console?cmd=access&vm=".$console_uuid."";
        echo "<iframe frameborder='0' width='640' height='420' src=\"".$link."\"></iframe>";
      ?> 

      <?php
         
        $user = "admin";
        $cmdline = "command=login&username=admin&password=R_47*Qp12&response=json";
        $cmdline = str_replace(" ", "%20", $cmdline);
        $url = "http://145.92.14.90:8080/client/api?".$cmdline;
                
        echo "<iframe  style='display:none;' src='".$url."'></iframe>
        <meta url=vps-management.php?page_id=2&id=".$console_uuid."&account=".$user."\" />";
      ?>

    </div>
    </center> 

  </div>
</div>