<center>

<?php
    $cmdline = "command=login&username=admin&password=R_47*Qp12&response=json";
    $cmdline = str_replace(" ", "%20", $cmdline);
    $url = CS_URL.$cmdline;
    echo "<iframe  style='display:none;' src='".$url."'></iframe>
    <meta url=/console/view />";
?>

</center> 