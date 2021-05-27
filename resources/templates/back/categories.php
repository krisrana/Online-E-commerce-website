<h3 class="text-center bg-success"><?php get_msg(); ?></h3>
<h1 class="page-header">
  Product Categories
</h1>

<div class="col-md-4">
    <form action="" method="post">
    <?php add_category(); ?>
        <div class="form-group">
            <label for="category-title">Title</label>
            <input name="cat_title" type="text" class="form-control" placeholder="Category">
        </div>
        <div class="form-group">
            <input name="add_category" type="submit" class="btn btn-primary" value="Add Category">
        </div> 
    </form>
</div>

<div class="col-md-8">
<h4 class="pull-right"><span class="fa fa-remove" style="color:#990000;">:- Remove Category</h4>
    <table class="table">
            <thead>

        <tr>
            <th>Category Id</th>
            <th>Category Title</th>
            <th></th>
        </tr>
            </thead>


    <tbody>
        <?php display_category_inAdmin(); ?>
    </tbody>

        </table>

</div>
