
<div class="col-md-12">
    <div class="row">
    <h1 class="page-header">All Orders</h1>
    <h3 class="text-center bg-success"><?php get_msg(); ?></h3>
</div>

<div class="row">
<h4 class="pull-right"><span class="fa fa-eye" style="color:#838b8b;">:- View Orders,  <span class="fa fa-check-square-o" style="color:#eead0e;">:- Ready, 
    <span class="fa fa-paper-plane-o" style="color:#2793e8;">:- Shipped,  <span class="fa fa-envelope-o" style="color:#5cb85c;">:- Delivered,   
    <span class="fa fa-remove" style="color:#d9534f;">:- Cancel Order</h4>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Order ID</th>
            <th>Order Amount</th>
            <th>Transacition ID</th>
            <th>Payment Status</th>
            <th>Placed By</th>
            <th>Order Status</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            <?php display_orders();?>
        </tbody>
    </table>
</div>


