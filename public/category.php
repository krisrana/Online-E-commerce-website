<?php require_once("../resources/config.php"); ?>

<!-- Header.php file -->
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>
<!-- /Header.php file -->

<body>
    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer" style="background: -webkit-linear-gradient(60deg,#00537E 10%,#3AA17E 110%); background: linear-gradient(60deg,#00537E 10%,#3AA17E 110%); color: white;">
            <!-- From function.php, to get products by Category ID from DB -->
            <h1 class="text-center"><?php display_category(); ?></h1>
        </header>

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Category Products</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row">

            <!-- From function.php, to get products by Category ID from DB -->
            <?php get_products_by_ID(); ?>

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->



<!-- footer file -->
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>
<!-- /footer file -->

</body>

</html>
