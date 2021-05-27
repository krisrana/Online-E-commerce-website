<?php require_once("../resources/config.php"); ?>
<!-- Header.php file -->
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>
<!-- /Header.php file -->

<body>
    <!-- Page Content -->
    <div class="container">
        <!-- /.row --> 
        <div class="row">
            <h3 class="text-center bg-danger"><?php get_msg(); ?></h3>
            <h1>Checkout</h1>
            <hr>
                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                    <input type="hidden" name="cmd" value="_cart">
                    <input type="hidden" name="business" value="admin@project415.com">
                    <input type="hidden" name="currency_code" value="USD">
                    <input type="hidden" name="upload" value="1">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Sub-total</th>
                            <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                <!-- function call cart() from cart.php -->
                                <?php cart(); ?>
                            </tbody>
                        </table>
                        <!-- function call cart() from cart.php -->
                        <?php echo buynow(); ?>
                </form>
        <!--  ***********Redirect to shop.php (Continue Shopping) *************-->
        <a href="shop.php" style="text-decoration:none;"><button class="btn btn-primary fa fa-shopping-bag" style="font-size: 18px; border-radius: 30px;"> Continue Shopping</button></a>
        <!--  ***********CART TOTALS*************-->
        <hr>   
        <div class="col-xs-4 pull-right ">
            <h2>Cart Totals</h2>
                <table class="table table-bordered" cellspacing="0">
                    <tr class="cart-subtotal">
                    <th>Items:</th>
                    <td><span class="amount"><?php 
                        echo isset($_SESSION['item_qty']) ? $_SESSION['item_qty'] : $_SESSION['item_qty'] = "0";?>
                    </span></td>
                    </tr>
                    <tr class="order-total">
                    <th>Order Total</th>
                    <td><strong><span class="amount">&#36;<?php 
                        echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0";?>
                    </span></strong> </td>
                    </tr>
                    </tbody>
                </table>
        </div><!-- CART TOTALS-->
    </div><!--Main Content-->

    <!-- footer file -->
    <?php include(TEMPLATE_FRONT . DS . "footer.php") ?>
    <!-- /footer file -->
</body>
</html>
