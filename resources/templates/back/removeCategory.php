<?php require_once("../../config.php"); 

if(isset($_GET['id'])){

  //Delete Category from table
  $delete = query("DELETE FROM `categories` WHERE `cat_id` = ". escape_string($_GET['id']) ."");
  confirm($delete);
  
  set_msg("Category Deleted.");

  redirect("../../../public/admin/index.php?categories");
}
else{

  redirect("../../../public/admin/index.php?categories");
}

?>

