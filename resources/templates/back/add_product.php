
<div class="col-md-12">

<div class="row">
<h1 class="page-header">
   Add Product
</h1>
</div>

<form action="" method="post" enctype="multipart/form-data">
<?php add_product(); ?>
<div class="col-md-8">
  <div class="form-group">
      <label for="product_title">Product Title </label>
          <input type="text" name="product_title" class="form-control" placeholder="Title Here">
  </div>
  <div class="form-group">
          <label for="product_sdesc">Product Short Description</label>
    <textarea name="product_sdesc" id="" cols="30" rows="3" class="form-control" placeholder="Short descripion Here"></textarea>
  </div>
  <div class="form-group">
          <label for="product_ldesc">Product Long Description</label>
    <textarea name="product_ldesc" id="" cols="30" rows="8" class="form-control" placeholder="Long description Here"></textarea>
  </div>
</div><!--Main Content-->

<!-- SIDEBAR-->
<aside id="admin_sidebar" class="col-md-4">
    <!-- Product Categories-->
    <div class="form-group">
        <label for="product_category_id">Product Category</label>
        <select name="product_category_id" id="" class="form-control">
            <option value="">Select Category</option>
            <?php set_categories(); ?>
        </select>
    </div>
    <div class="form-group">
        <label for="product_price">Product Price</label>
        <input type="number" name="product_price" class="form-control" step="0.01" min="0" placeholder="19.99"></input>
    </div>
    <div class="form-group">
        <label for="product_qty">Product Quantity</label>
        <input type="number" name="product_qty" class="form-control" step="1" min="0" placeholder="50"></input>
    </div>
    <hr>
    <!-- Product Image -->
    <div class="form-group">
        <label for="product-title">Product Image</label>
        <input type="file" name="file">
    </div>
    <hr>
    <div class="form-group">
      <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Publish">
    </div>
</aside><!--SIDEBAR-->
</form>
