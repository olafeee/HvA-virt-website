<center>
    
<?php

    // Generate a login API request
    $cmdline = "?command=login&username=admin&password=R_47*Qp12&response=json";
    $cmdline = str_replace(" ", "%20", $cmdline);
    $logonurl = 'http://145.92.14.90:8080/client/api';

    // Generate the URL to the console of the selected VM
    $console_uuid = '163a66dc-1df6-4c75-b16f-2db34d91d026';
    $console_vps_name = 'ConsoleTest';                             
    $vmurl = "http://145.92.14.90:8080/client/console?cmd=access&vm=".$console_uuid."";

?>

<!-- IS THIS WORKING?????? -->
    <script type="text/javascript">

        var logonurl='<?php echo $logonurl; ?>';
        var vmurl='<?php echo $vmurl; ?>';
        
        $( document ).ready(function() {
            //window.open(logonurl, "logon");
            $.ajax({
                type: "POST",
                url: logonurl,
                data: { command: "login", username: "admin", password: "R_47*Qp12", response: "json", domain: "/"}
            }).done(function() {
                $( this ).window.open(vmurl, "window");
            })
            .fail(function() {
                alert( "Error in logon" );
            });
            
        });

    </script>

    <a href="<?php echo $vmurl; ?>" target="window">Click me</a>
    <iframe name="window" frameborder="0" width="640" height="420" ></iframe>
    <iframe name="logon" style="display:none;"></iframe>

</center>