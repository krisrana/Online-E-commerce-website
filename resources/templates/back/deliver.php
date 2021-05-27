<?php require_once("../../config.php"); 

if(isset($_GET['id'])){

  $update_status = "Delivered";
  
  //update order table with order_status
  $update = query("UPDATE `orders` SET `order_status` = '$update_status' WHERE `orders`.`order_id` = ". escape_string($_GET['id']) ."");
  confirm($update);
  
  set_msg("Order status updated.");

  redirect("../../../public/admin/index.php?orders");
  
}
else{

  redirect("../../../public/admin/index.php?orders");
}



?>

