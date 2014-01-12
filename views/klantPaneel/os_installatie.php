<?php if (isset($_SESSION['loggedIn'])):?>

<div class="row">
  <div class="col-md-2">
<?php include'/views/klantpaneel/klantpaneelHeader.php'; ?>
</div>
<div class="col-md-8">
  <table class="table">
        <thead>
          <tr>
            <th>OS</th>
            <th>Versie</th>
            <th>Prijs per maand</th>
            <th>Instaleer op VM</th>
            <th>Actie</th>
          </tr>
        </thead>
        <tbody>
          <tr class="active">
            <td><img src="/img/centos-logo.gif" class="kp_img"></td>
            <td>6.4</td>
            <td>&euro;0,00</td>
            <td><?php include'views/klantpaneel/vmselectlist.php';?></td>
            <td><button type="button" class="btn btn-info"> Start installatie </button></td>
          </tr>
          <tr class="success">
            <td><img src="/img/centos-logo.gif"class="kp_img"></td>
            <td>5.5</td>
            <td>&euro;0,00</td>
            <td><?php include'views/klantpaneel/vmselectlist.php';?></td>
            <td><button type="button" class="btn btn-info"> Start installatie </button></td>
          </tr>
          <tr class="active">
            <td><img src="/img/ubuntulogo.png"class="kp_img"></td>
            <td>12.04.1 LTS</td>
            <td>&euro;0,00</td>
            <td><?php include'views/klantpaneel/vmselectlist.php';?></td>
            <td><button type="button" class="btn btn-info"> Start installatie </button></td>
          </tr>

        </tbody>
      </table>
    </div>
<?php else: 
header('location: ../login');
 endif; ?>