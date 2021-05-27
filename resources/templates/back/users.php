

<div class="col-lg-12">
    <h1 class="page-header">
        Users Details
    </h1>
        <p class="bg-success text-center">
        <?php get_msg(); ?>
    </p>
    <div class="col-md-12">
    <h4 class="pull-right"><span class="fa fa-graduation-cap" style="color:#003600;">:- Set Admin Access,  <span class="fa fa-sign-out" style="color:#990000;">:- Revoke Admin Access</h4>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>User Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Admin Privilage</th>
                </tr>
            </thead>
            <tbody>
                <?php display_users(); ?>
            </tbody>
        </table> <!--End of Table-->
    </div>    
</div>
