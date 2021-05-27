<div class="col-md-3">
    <p class="lead">Shop by category</p>
    <div class="list-group">
        <!-- query to categories table in medicine_db -->
        <?php
            // From function.php, to get categories from DB -->
            get_categories();
        ?>
    </div>
</div>