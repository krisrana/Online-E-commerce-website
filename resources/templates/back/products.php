

<h1 class="page-header">
   All Products
   <h3 class="text-center bg-success"><?php get_msg(); ?></h3>
</h1>
<table class="table table-hover">
<h4 class="pull-right"><span class="fa fa-edit" style="color:#2793e8;">:- Edit Products, <span class="fa fa-remove" style="color:#990000;">:- Remove Products</h4>
    <thead>
      <tr>
           <th>Id</th>
           <th>Title</th>
           <th>Short Description</th>
           <th>long Description</th>
           <th>Category</th>
           <th>Quantity</th>
           <th>Price</th>
      </tr>
    </thead>
    <tbody>
    <?php display_product_inAdmin(); ?>
    </tbody>
</table>
