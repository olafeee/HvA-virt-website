<center>
    
<?php

    // Generate a login API request
    $cmdline = "?command=login&username=admin&password=R_47*Qp12&response=json";
    $cmdline = str_replace(" ", "%20", $cmdline);
    $logonurl = 'http://145.92.14.90:8080/client/api'.$cmdline;

    // Generate the URL to the console of the selected VM
    $console_uuid = 'e86a8cce-af66-42a9-9e94-695aa6ece678';
    $console_vps_name = 'ConsoleTest';                             
    $vmurl = "http://145.92.14.90:8080/client/console?cmd=access&vm=".$console_uuid."";

?>

<!-- IS THIS WORKING?????? -->
    <script type="text/javascript">

        var logonurl='<?php echo $logonurl; ?>';
        var vmurl='<?php echo $vmurl; ?>';
        
        $( document ).ready(function() {
            window.open(logonurl, "logon");
            //location.reload();
            // hackishly force iframe to reload
            var iframe = document.getElementById('window');
            iframe.src = vmurl;
            /*$.ajax({
                type: "POST",
                url: logonurl,
                crossDomain: true,
                data: { command: "login", username: "admin", password: "R_47*Qp12", response: "json", domain: "/"},
                headers: { 'Access-Control-Allow-Origin': '*' },
            }).done(function() {
                $( this ).window.open(vmurl, "window");
            })
            .fail(function() {
                alert( "Error in logon" );
            });*/
            
        });

    </script>

    <a href="<?php echo $vmurl; ?>" target="window">Click me</a>
    <iframe name="window" id="window" frameborder="0" width="640" height="420" ></iframe>
    <iframe name="logon" id="logon" style="display:none;"></iframe>

</center>