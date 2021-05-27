<?php require_once("../resources/config.php"); ?>

<!-- Header.php file -->
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>
<!-- /Header.php file -->

<body>
    <!-- Page Content -->
    <div class="container">

        <div class="wrapper">
            <h2>Sign Up</h2>
            <h2><?php get_msg(); ?></h2>
            <p>Please fill this form to create an account.</p>
            <form action="" method="post" enctype="multipart/form-data">
                <?php add_user(); ?>
                <div class="form-group">
                    <label>Frist Name</label>
                    <input type="text" name="fname" class="form-control" required placeholder="John">
                    <span class="invalid-feedback"></span>
                </div> 
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="lname" class="form-control" required placeholder="Doe">
                    <span class="invalid-feedback"></span>
                </div> 
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required>
                    <span class="invalid-feedback"></span>
                </div>     
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="email" class="form-control" required placeholder="Your Email Address">
                    <span class="invalid-feedback"></span>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                    <span class="invalid-feedback"></span>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="password" class="form-control" required>
                    <span class="invalid-feedback"></span>
                </div> 
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="submit" value="Create Account">
                    <input type="reset" class="btn btn-secondary ml-2" value="Reset">
                </div>
                <p>Already have an account? <a href="login.php">Login here</a>.</p>
            </form>
        </div>    


    </div>
    <!-- /.container -->

<!-- footer file -->
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>
<!-- /footer file -->

</body>

</html>
