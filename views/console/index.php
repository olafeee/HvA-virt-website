 <?php

 $refresh = $this->refresh;

 ?>

    <center>
      <?php 
        $console_uuid = '163a66dc-1df6-4c75-b16f-2db34d91d026';
        $console_vps_name = 'ConsoleTest';
        if($refresh == ""){
            echo "<meta HTTP-EQUIV='REFRESH' content='5; url=/console/refresh'> ";
        } 
                                            
        $link = "http://145.92.14.90:8080/client/console?cmd=access&vm=".$console_uuid."";
        echo "<iframe frameborder='0' width='640' height='420' src=\"".$link."\"></iframe>";
      
    // http://145.92.14.90:8080/client/console?cmd=access&vm=163a66dc-1df6-4c75-b16f-2db34d91d026
    // 
         
        //$user = "admin";
        $cmdline = "command=login&username=admin&password=R_47*Qp12&response=json";
        $cmdline = str_replace(" ", "%20", $cmdline);
        $url = "http://145.92.14.90:8080/client/api?".$cmdline;
        echo "<iframe  style='display:none;' src='".$url."'></iframe>
        <meta url=/console />";
      ?>

    </center> 