<?php if (isset($_SESSION['loggedIn'])):?>
<?php include'/views/account/klantpaneelHeader.php'; ?>
<div class="acountTable">

<table class="table">
  <tr>
    <td>Naam:</td>
    <td>Sjon De boer</td>
  </tr>
  <tr>
    <td>Email:</td>
    <td>s.de.boer@plaintech.nl</td>
  </tr>
  <tr>
    <td>Adres:</td>
    <td>H.J.E. Wenckebachweg 100</td>
  </tr>
  <tr>
    <td>Postode:</td>
    <td>1096DL</td>
  </tr>
  <tr>
    <td>Land:</td>
    <td>Nederland</td>
  </tr>
</table>

<a href="/account/veranderWachtwoord" class="btn btn-default">verander wachtwoord</a>
<a href="/account/veranderWachtwoord" class="btn btn-default">wijzig gegevens</a>
</div>
<?php else: 
header('location: /login');
 endif; ?>