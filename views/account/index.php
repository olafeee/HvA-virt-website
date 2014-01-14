<?php if (isset($_SESSION['loggedIn'])):?>
<?php require'klantpaneelHeader.php'; ?>
<div class="acountTable">

<table class="table">
  <tr>
    <td>Name:</td>
    <td>Sjon De boer</td>
  </tr>
  <tr>
    <td>Email:</td>
    <td>s.de.boer@plaintech.nl</td>
  </tr>
  <tr>
    <td>Address:</td>
    <td>H.J.E. Wenckebachweg 100</td>
  </tr>
  <tr>
    <td>Postal Code:</td>
    <td>1096DL</td>
  </tr>
  <tr>
    <td>Country:</td>
    <td>Nederland</td>
  </tr>
</table>

<a href="/account/veranderWachtwoord" class="btn btn-default">Change Password</a>
<a href="/account/veranderWachtwoord" class="btn btn-default">Change Information</a>
</div>
<?php else: 
header('location: /login');
 endif; ?>