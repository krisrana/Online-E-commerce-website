<?php require_once("../../resources/config.php"); ?>

<!-- Header.php file -->
<?php include(TEMPLATE_BACK . DS . "admin_header.php") ?>
<!-- /Header.php file -->



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        <i class="fa fa-dashboard"></i> Admin Dashboard
                        </h1>
                        <h2 class="text-center bg-success"><?php get_msg(); ?></h2>
                    </div>
                </div>
                <!-- /.row -->

                <?php
                    
                    if($_SERVER['REQUEST_URI'] == "/public/admin/" || $_SERVER['REQUEST_URI'] == "/public/admin/index.php"){

                        include(TEMPLATE_BACK . DS . "admin.php");
                    }

                    //if isset to orders than show/include orders.php
                    if(isset($_GET['orders'])){

                        include(TEMPLATE_BACK . DS . "orders.php");

                    }

                    //if isset to categories than show/include categories.php
                    if(isset($_GET['categories'])){

                        include(TEMPLATE_BACK . DS . "categories.php");

                    }

                    //if isset to products than show/include products.php
                    if(isset($_GET['products'])){

                        include(TEMPLATE_BACK . DS . "products.php");

                    }

                    //if isset to add_products than show/include add_products.php
                    if(isset($_GET['add_product'])){

                        include(TEMPLATE_BACK . DS . "add_product.php");

                    }

                    //if isset to users than show/include users.php
                    if(isset($_GET['users'])){

                        include(TEMPLATE_BACK . DS . "users.php");

                    }

                    //if isset to edit_product than show/include edit_product.php
                    if(isset($_GET['edit_product'])){

                        include(TEMPLATE_BACK . DS . "edit_product.php");

                    }

                    //if isset to order_details than show/include order_details.php
                    if(isset($_GET['order_details'])){

                        include(TEMPLATE_BACK . DS . "order_details.php");

                    }

                ?>



               

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<!-- footer file -->
<?php include(TEMPLATE_BACK . DS . "admin_footer.php") ?>
<!-- /footer file -->
