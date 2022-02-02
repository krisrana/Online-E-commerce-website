<?php require_once("../resources/config.php"); ?>

<!-- Header.php file -->
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>
<!-- /Header.php file -->

    <!-- Page Content -->
    <div class="container">

        <div class="row">  
        
            <!-- side_nav.php file -->
                <?php include(TEMPLATE_FRONT . DS . "side_nav.php") ?>
            <!-- /side_nav.php file -->

            <div class="col-md-9">
            <h2><?php get_msg(); ?></h2>


                <div class="row carousel-holder">

                    <!-- side_nav.php file -->
                        <?php include(TEMPLATE_FRONT . DS . "slider.php") ?>
                    <!-- /side_nav.php file -->

                </div>
                </div>
                <div>
                <center>
                <h3><b>This is a Dummy E-commerce Website meant to show Skills</b></h3>
                </center>
                </div>
                <div class="row">
                            <div class="col-md-9">
                                <h3>Newest Products</h3>
                            </div>
                        </div>

                <div class="row">
                    <!-- From function.php, to get products from DB -->
                    <?php get_products_limit_6_DESC(); ?>                    
                </div> <!-- /row -->

            </div>

        </div>

    </div>
<!-- /.container -->

<!-- footer file -->
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>
<!-- /footer file -->
