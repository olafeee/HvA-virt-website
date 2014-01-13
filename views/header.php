<!DOCTYPE html>
  <?php Session::init();?>
<html>
  <head>
    <title>Plaintech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="/img/plaintech-tab-logo.png">
    <link href="/css/redmond/jquery-ui-1.10.3.custom.css" rel="stylesheet">
  
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script type="text/javascript" src="/js/loginmenu.js"></script>
  <script type="text/javascript" src="/js/bootstrap.js"></script>
   <script type="text/javascript" src="/js/bestellen.js"></script>

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

          <?php if(Session::get('loggedIn') == true){ echo 'Logged in as '. ucfirst($_SESSION['username']); }?>
        </p>
        </div>
        <div class="col-md-1">
          <div class="login-btn">
            <?php if(Session::get('loggedIn') == true){
              echo' <a href="javascript:showLoginMenu()" class="btn btn-default login-boton-pull-right kp_hm_ms">Account</a>';
              echo' <a href="javascript:hideLoginMenu()" class="btn btn-default login-boton-pull-right kp_hm_mh">Account</a>';
            }else{
              echo'<a href="/login" class="btn btn-default login-boton-pull-right">Login</a>';
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
      <li><a href="/order">Blade VPS</a></li>
      <?php if(Session::get('loggedIn') == true){ echo '<li><a href="../klantPaneel">Klanten Paneel</a></li>'; echo '<li><a href="../account">Mijn Account</a></li>'; }?>
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
          <b><?php echo ucfirst($_SESSION['firstname']). " " . ucfirst($_SESSION['lastname']) ; ?></b>
          <p><?php echo ucfirst($_SESSION['username']); ?></p>

      </div>
 
      </div>
      <div class="kp_hm_logout">
        <a href="../account/logout" class="btn btn-default kp_hm_logoutbtn">Uitloggen</a>
      </div>
    </div>

</div>