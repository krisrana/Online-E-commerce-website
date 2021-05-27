
<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="../admin/index.php"><img style="max-width:100px; margin-top: -7px;" src="../../resources/assests/cc_admin.png" alt="Capsule Corp"></a>
    <a class="navbar-brand" href="../index.php"><img style="max-width:100px; margin-top: -7px;" src="../../resources/assests/cc_shop.png" alt="Capsule Corp"></a>
</div>
<!-- Top Menu Items -->
<ul class="nav navbar-right top-nav">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['username']; ?><b class="caret"></b></a>
        <ul class="dropdown-menu">
            
            <li class="divider"></li>
            <li>
                <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
            </li>
        </ul>
    </li>
</ul>