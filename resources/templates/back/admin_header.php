<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Capsule Corp Admin Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <!-- admin_top_nav file -->
            <?php include(TEMPLATE_BACK . DS . "admin_top_nav.php") ?>
            <!-- /admin_top_nav file -->
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <!-- admin_side_nav file -->
            <?php include(TEMPLATE_BACK . DS . "admin_side_nav.php") ?>
            <!-- /admin_side_nav file -->
            
            <!-- /.navbar-collapse -->
        </nav>