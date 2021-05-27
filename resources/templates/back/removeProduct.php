<?php require_once("../../config.php"); 

if(isset($_GET['id'])){

  //Delete Category from table
  $delete = query("DELETE FROM `products` WHERE `product_id` = ". escape_string($_GET['id']) ."");
  confirm($delete);
  
  set_msg("Product Deleted.");

  redirect("../../../public/admin/index.php?products");
}
else{

  redirect("../../../public/admin/index.php?products");
}



?>

