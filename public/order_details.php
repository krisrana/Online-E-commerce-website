<?php require_once("../resources/config.php"); ?>

<!-- Header.php file -->
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>
<!-- /Header.php file -->

<?php

  if(isset($_GET['id'])){
    
    //Setting up query to fetch results
    $results = query("SELECT * FROM `orders` WHERE order_id = ". escape_string($_GET['id']) ."");
    confirm($results);

    $row = fetch_array($results);

    $orderid = $row['order_id'];
    $order_amt = $row['order_amt'];
  }
?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
            <h1 class="page-header">
              Orders Details
            </h1>
            </div>
            <div class="row">
            <table  class="table table-hover">
                <tbody>
                <tr>
                <th>Order ID</th>
                </tr>
                <tr>
                <td><?php echo $orderid ?></td>
                </tr>
                <tr>
                <th>Product ID</th>
                <th>Product Title</th>
                <th>Product Quantity</th>
                <th>Product Price</th>
                </tr>
                <?php order_details_by_id() ?>
                <tr>
                  <th>Total Order Amount</th>
                  <th>&#36;<?php echo $order_amt ?></th>
                </tr>
              
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