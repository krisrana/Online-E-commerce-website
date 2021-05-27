<?php

  if(isset($_SESSION['username'])){

    $user = $_SESSION['username'];
  }else{
    $user = "Sign In";
  }

?>

<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php"><img style="max-width:100px; margin-top: -7px;" src="../resources/assests/cc_withhex222bgCrop.png" alt="CC"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="shop.php">Shop</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="checkout.php"><span class="fa fa-opencart"></span> Cart</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?php echo $user; ?> <b class="caret"></b></a>
          <ul class="dropdown-menu">
              <li class="divider"></li>
              <li>
                  <a href="login.php"><i class="glyphicon glyphicon-log-in"></i> Login</a>
                  <a href="orders.php"><i class="fa fa-first-order"></i> View Orders</a>
                  <a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a>
              </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
    <!-- /.navbar-collapse -->
</div>