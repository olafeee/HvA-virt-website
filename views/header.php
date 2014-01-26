<!DOCTYPE html>
  <?php Session::init();?>
<html>
  <head>
    <title>Plaintech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <!-- Bootstrap -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <!-- Bootstrap Form Helpers -->
    <link href="/css/bootstrap-form-helpers.min.css" rel="stylesheet" media="screen">
    <!-- Other suff -->
    <link rel="shortcut icon" href="/img/plaintech-tab-logo.png">
    <link href="/css/redmond/jquery-ui-1.10.3.custom.css" rel="stylesheet">
  <script type='text/javascript' > 
  var pets;
  var pets1;
  var pets2;    
  var standardValueDisk = 0; 
  var standardValueCPU = 0;
  var standardValueRAM = 0;
</script>
<?php
if($this->url0=='order'){
?>
    <script type="text/javascript">
      function tarr(x, y){
        pets = <?print(json_encode($this->DISK));?>;
        var rvar = pets[x][y];
        return rvar;
      }
      function CPUarr(x, y){
        pets1 = <?print(json_encode($this->CPU));?>;
        var rvar = pets1[x][y];
        return rvar;
      }
      function RAMarr(x, y){
        pets2 = <?print(json_encode($this->RAM));?>;
        var rvar = pets2[x][y];
        return rvar;
      }
    </script>
  <?php
}
?>
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script type="text/javascript" src="/js/loginmenu.js"></script>
  <script type="text/javascript" src="/js/bootstrap.js"></script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- opacity div for the SLA info menu-->
    <div class="opacitySLAdiv"></div>
      
    <!-- -->
    <div class="container">
      <div class="row">
        <div class="col-md-2">
          <a class="navbar-brand" href="/"><img id="plaintech-logo" src="/img/plaintech-logo-c.png"></a>
        </div>
         <div class="col-md-6"></div>
        <div class="col-md-2"><p class="login-boton-pull-right"> 

          <?php if(Session::get('loggedIn') == true){ echo 'Logged in as '.($_SESSION['logArr']['username']); }?>
        </p>
        </div>
        <div class="col-md-1">
          <div class="login-btn">
            <?php if(Session::get('loggedIn') == true){
              echo' <a href="javascript:showLoginMenu()" class="btn btn-default login-boton-pull-right kp_hm_ms">Account</a>';
              echo' <a href="javascript:hideLoginMenu()" class="btn btn-default login-boton-pull-right kp_hm_mh">Account</a>';
            }else{
              echo'<a href="/account" class="btn btn-default login-boton-pull-right">Login</a>';
            }?>      
          </div>
        </div>
        <div class="col-md-1"><a href="/shoppingbasket">
          <button type="button" class="btn btn-default login-boton-pull-right">
            <span class="glyphicon glyphicon-shopping-cart"></span> 
            <?php 
            
            if (empty($_SESSION['cart'])) {
              echo "0 items";
            }else{
              echo count($_SESSION['cart']);
            }
            
            ?>
          </button></a>
        </div>
      </div>
    </div>

  	<nav class="navbar navbar-inverse" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
   <div class="container">
    <ul class="nav navbar-nav">
      <li><a href="/">Home</a></li>
      <li><a href="/order">Order</a></li>
      <?php if(Session::get('loggedIn') == true){ echo '<li><a href="/management">My Account</a></li>'; }?>
      <?php
      echo(count($_SESSION['userRole']));
      for ($i=0; $i < count($_SESSION['userRole']); $i++) { 
          echo $_SESSION['userRole'][$i];
      }
      ?>


      <?php if(Session::get('userRole') == 7){ echo '<li><a href="/cmsPlaintech"> CMS</a></li>'; }?>
    </ul>
    </div>
  </div><!-- /.navbar-collapse -->
</nav>

<div class="container">
  <!-- users menu -->
  <div class="kp_hm_div">
    <div class="kp_hm_top"></div>
    <div class="kp_hm_border">
      <div class="kp_hm_text">
        <div class="kp_hm_text_left">
          <div class="kp_hm_text_userglyphicon">
            <span class="glyphicon glyphicon-user kp_hm_userglyphicon"></span>
          </div>
        </div>
        <div class="kp_hm_text_right">       
          <b><?php echo ucfirst($_SESSION['logArr']['firstname']). " ". ucfirst($_SESSION['logArr']['lastname']) ; ?></b>
          <p><?php echo $_SESSION['logArr']['username']; ?></p>
        </div>
      </div>
      <div class="kp_hm_logout">
        <a href="/account/logout" class="btn btn-default kp_hm_logoutbtn">Uitloggen</a>
      </div>
    </div>
  </div>