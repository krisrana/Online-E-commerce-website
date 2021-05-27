<?php require_once("../../config.php"); 

if(isset($_GET['id'])){

  $update_status = "No";
  
  //update order table with order_status
  $update = query("UPDATE `users` SET `isadmin` = '$update_status' WHERE `users`.`user_id` = ". escape_string($_GET['id']) ."");
  confirm($update);
  
  set_msg("Admin Access Revoked!");

  redirect("../../../public/admin/index.php?users");
  
}
else{

  redirect("../../../public/admin/index.php?users");
}



?>

