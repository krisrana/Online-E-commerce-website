<?php require_once("../resources/config.php"); ?>

<!-- Header.php file -->
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>
<!-- /Header.php file -->

<body>
    <!-- Page Content -->
    <div class="container">

    <div class="wrapper">
        <h2>Login</h2>
        <h2><?php get_msg(); ?></h2>
        <p>Please fill in your credentials to login.</p>

        <form class="" action="" method="post" enctype="multipart/form-data">
            <?php login_user(); ?>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
                <span class="invalid-feedback"></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
                <span class="invalid-feedback"></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="submit" value="Login">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
    </div>

    </div>
    <!-- /.container -->

<!-- footer file -->
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>
<!-- /footer file -->

</body>

</html>
