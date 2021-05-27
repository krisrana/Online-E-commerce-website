<?php require_once("../resources/config.php"); ?>

<!-- Header.php file -->
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>
<!-- /Header.php file -->
<h3 class="text-center bg-success"><?php get_msg(); ?></h3>

<?php

  if(isset($_SESSION['username'])){

    $user = $_SESSION['username'];
  }else{
    $user = "Sign In to View Your Orders";
  }

?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
            <h1 class="page-header">
            Welcome, <?php echo $user; ?>. <br> <small>Here are your Orders</small> 

            </h1>
            <h4 class="pull-right"><span class="fa fa-eye" style="color:#5cb85c;">:- View Orders,  <span class="fa fa-remove" style="color:#d9534f;">:- Cancel order</h4>
            </div>

            <div class="row">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Order Amount</th>
                        <th>Transacition ID</th>
                        <th>Order Status</th>
                        <th>Payment Status</th>
                        <th>Order Placed By</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php user_orders();?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<!-- footer file -->
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>
<!-- /footer file -->