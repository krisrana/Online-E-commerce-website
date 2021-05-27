<?php require_once("../resources/config.php"); ?>

<?php

  if(isset($_GET['id'])){
    
    //Setting up query to fetch results
    $result = query("SELECT order_status FROM orders WHERE order_id = " . escape_string($_GET['id']) . " ");
    confirm($result);
    $row = fetch_array($result);

    $order_status = $row['order_status'];
    echo $order_status;

    
    if($order_status == "Processing.."){
      $update_status = "Cancel Requested";

      //update order table with order_status
      $update = query("UPDATE `orders` SET `order_status` = '$update_status' WHERE `orders`.`order_id` = ". escape_string($_GET['id']) ."");
      confirm($update);

      set_msg("Cancelation request is sent!!<br> Please allow us 1 - 2 Business days to process your request");
      redirect("orders.php");

    }else{
      if($order_status == "Cancel Requested"){

        set_msg("We have reecived your request.!!<br> Please allow us 1 - 2 Business days to process your request");
        redirect("orders.php");
      }
      else{
        set_msg("You cannot Cancel order at this point.<br>Please feel free to reach out to Us via Contact Us");
        redirect("orders.php");
      }
      
      

    }
    
    
  }
?>
