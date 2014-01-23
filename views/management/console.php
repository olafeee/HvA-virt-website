
    
<?php

    // Generate a login API request
    $cmdline = "?command=login&username=admin&password=R_47*Qp12&response=json";
    $cmdline = str_replace(" ", "%20", $cmdline);
    $logonurl = 'http://145.92.14.90:8080/client/api'.$cmdline;

    // Generate the URL to the console of the selected VM
    $console_uuid = 'e86a8cce-af66-42a9-9e94-695aa6ece678';
    $console_vps_name = 'ConsoleTest';                             
    $vmurl = "http://145.92.14.90:8080/client/console?cmd=access&vm=".$console_uuid."";

include('template.php');

?>

    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">Panel title</h3>
      </div>
      <div class="panel-body">
        <a href="<?php echo $vmurl; ?>" target="window" type="button">Refresh Console</a><br />
      </div>
      <div class="panel-body">
        <center>
            <iframe name="window" id="window" style="display:none;" src="#" frameborder="0" width="720" height="440" ></iframe>
            <iframe name="logon" id="logon" style="display:none;" src="<?php echo $logonurl; ?>"></iframe>
        </center>
      </div>
    </div>


    <script type="text/javascript">

        // URLs for the Login and Console API request
        var logonurl='<?php echo $logonurl; ?>';
        var vmurl='<?php echo $vmurl; ?>';

        // Use Iframes to send the API request to prevent Cross-Domain request.
        $( document ).ready(function() {
            // On page open send a login request
            window.open(logonurl, "logon");
            // Hackishly force iframe to reload
            //var iframe = document.getElementById('window');
            //iframe.src = vmurl;
            window.open(vmurl, "window");
            $('#window').css('display', 'inline-block');
        });

    </script>

