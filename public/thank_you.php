<?php require_once("../resources/config.php"); ?>

<!-- Header.php file -->
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>
<!-- /Header.php file -->

<?php
        report();
?>


<body>
    <!-- Page Content -->
    <div class="container">
        <!-- /.row --> 
        <div class="row">
            <h1 class="text-center">THANK YOU FOR YOUR ORDER</h1>
            <p class="text-center">We're processing it now. You will receive an confirmation shortly</p>
            <p class="text-center">
                <a href="index.php"><button class="btn btn-primary fa fa-home" style="font-size: 20px; border-radius: 30px;"> Home</button></a>
                <a href="shop.php"><button class="btn btn-warning fa fa-shopping-bag" style="font-size: 20px; border-radius: 30px;"> Continue Shopping</button></a>
            </p>
            

        </div>
    </div><!--Main Content-->

    <!-- footer file -->
    <?php include(TEMPLATE_FRONT . DS . "footer.php") ?>
    <!-- /footer file -->
</body>

</html>
