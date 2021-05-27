<?php require_once("../resources/config.php"); ?>

<!-- Header.php file -->
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>
<!-- /Header.php file -->

<body>
    <!-- Page Content -->
<div class="container">

    <!-- Side Navigation -->
    <?php include(TEMPLATE_FRONT . DS . "side_nav.php") ?>
    <!-- /Side Navigation -->

    <?php

    //Setting up query to fetch results
    $result = query(" SELECT * FROM products WHERE product_id = " . escape_string($_GET['id']) . " ");
    confirm($result);

    //if result doesnt exit in products table
    if(!$result){
        die("QUERY FAILED, products in Items.php " . mysqli_error($connection));
    }

    //display result
    while($row = fetch_array($result)):

    ?>

    <div class="col-md-9">
        <!--Row For Image and Short Description-->
        <div class="row">
            <div class="col-md-7">
                <img class="img-responsive" src="../resources/<?php echo display_image($row['product_image']); ?>" alt="">
            </div>
            
            <div class="col-md-5">
                <div class="thumbnail">
                    <div class="caption-full">
                        <h4><a href="#"><?php echo $row['product_title']; ?></a></h4>
                        
                        <h4 class=""><?php echo "&#36;".$row['product_price']; ?></h4>

                        <!-- Short Description -->
                        <p style="font-size: 18px;">Short Description<p>
                        <hr>
                        <p>
                            <?php echo $row['product_shortdesc']; ?> 
                        </p>
                        <form action="">
                            <div class="form-group">
                            <a class="btn btn-warning" style="border-radius: 30px;" href="../resources/cart.php?add=<?php echo $row['product_id']; ?>">ADD TO CART</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--Row For Image and Short Description-->
        <hr>

        <!--Row for Tab Panel-->
        <div class="row">
            <div role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><span style="font-size: 18px;">Long Description</span></a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <br>
                        <p>
                            <?php echo $row['product_description']; ?>
                        </p>
                    </div>
                </div>
            </div><!--/Tab Panel-->
        </div><!--Row for Tab Panel-->
    </div><!-- /col-md-9 -->

    <?php endwhile; ?>

</div> <!-- /.container -->

<!-- footer file -->
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>
<!-- /footer file -->
</body>

</html>
