<body>
<div class="col-md-12">
<div class="row">
<h1 class="page-header">
   Edit Product
</h1>
</div>

<form action="" method="post" enctype="multipart/form-data">
<?php

    if(isset($_GET['id'])){

        $result = query("SELECT * FROM products WHERE product_id = " . escape_string($_GET['id']) . "");
        confirm($result);

        while($row = fetch_array($result)){

            $product_title = escape_string($row['product_title']);
            $product_shortdesc = escape_string($row['product_shortdesc']);
            $product_description = escape_string($row['product_description']);
            $product_price = escape_string($row['product_price']);
            $product_qty = escape_string($row['product_qty']);
            $product_category_id = escape_string($row['product_category_id']);
            $product_image = $row['product_image'];
        }
    }
    $image = display_image($product_image);
    edit_product(); 

?>
<div class="col-md-8">
  <div class="form-group">
      <label for="product_title">Product Title </label>
          <input type="text" name="product_title" class="form-control" placeholder="Title Here" value="<?php echo $product_title; ?>">
  </div>
  <div class="form-group">
          <label for="product_shortdesc">Product Short Description</label>
    <textarea name="product_shortdesc" id="" cols="30" rows="3" class="form-control" placeholder="Short descripion Here"><?php echo $product_shortdesc; ?></textarea>
  </div>
  <div class="form-group">
          <label for="product_description">Product Long Description</label>
    <textarea name="product_description" id="" cols="30" rows="8" class="form-control" placeholder="Long description Here"><?php echo $product_description; ?></textarea>
  </div>
</div><!--Main Content-->

<!-- SIDEBAR-->
<aside id="admin_sidebar" class="col-md-4">
    <!-- Product Categories-->
    <div class="form-group">
        <label for="product_category_id">Product Category</label>
        <select name="product_category_id" id="" class="form-control">
            <option value="<?php echo $product_category_id; ?>"><?php echo show_product_category($product_category_id);?></option>
            <?php set_categories(); ?>
        </select>
    </div>
    <div class="form-group">
        <label for="product_price">Product Price</label>
        <input type="number" name="product_price" class="form-control" step="0.01" min="0" placeholder="19.99" value="<?php echo $product_price; ?>"></input>
    </div>
    <div class="form-group">
        <label for="product_qty">Product Quantity</label>
        <input type="number" name="product_qty" class="form-control" step="1" min="0" placeholder="50"  value="<?php echo $product_qty; ?>"></input>
    </div>
    <hr>
    <!-- Product Image -->
    <div class="form-group">
        <label for="product-title">Product Image</label>
        <input type="file" name="file"> <br>
        <img width="200" src="../../resources/<?php echo $image; ?>" alt="">
    </div>
    <hr>
    <div class="form-group">
      <input type="submit" name="update" class="btn btn-primary btn-lg" value="Update">
    </div>
</aside><!--SIDEBAR-->
</form>