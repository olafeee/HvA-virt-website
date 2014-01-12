<?php if (isset($_SESSION['loggedIn'])):?>
<?php include'/views/klantpaneel/klantpaneelHeader.php'; ?>

<a href="/klantPaneel/veranderWachtwoord" class="btn btn-default kp_hm_logoutbtn">verander wachtwoord</a>


<?php else: 
header('location: /login');
 endif; ?>