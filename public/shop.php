<?php require_once("../resources/config.php"); ?>

<!-- Header.php file -->
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>
<!-- /Header.php file -->

<body>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
        <!-- side_nav.php file -->
        <?php include(TEMPLATE_FRONT . DS . "side_nav.php") ?>
        <!-- /side_nav.php file -->
            <div class="col-md-9">

                        <!-- Jumbotron Header -->
                        <header class="jumbotron" style="background: -webkit-linear-gradient(60deg,#00537E 10%,#3AA17E 110%); background: linear-gradient(60deg,#00537E 10%,#3AA17E 110%); color: white;">
                            <h1 class="text-center">Capsule Corp Shop</h1>
                        </header>
                        </div>
                        <hr>
                        <div class="row">        
                        <!-- Title -->
                        <div class="row">
                            <div class="col-md-9">
                                <h3>Browse Products</h3>
                            </div>
                        </div>
                        <!-- /.row -->

                        <!-- Page Features -->
                        <div class="row">

                            <!-- From function.php, to get products from DB -->
                            <?php get_products(); ?>

                        </div>
                        <!-- /.row -->
                        </div>     
                        </div> 
    </div>
    <!-- /.container -->



<!-- footer file -->
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>
<!-- /footer file -->

</body>

</html>
