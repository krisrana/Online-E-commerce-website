<?php require_once("config.php"); ?>

<?php
    //Add item increment count to Cart
    if(isset($_GET['add'])){

        //sql to get product info based on id passed.
        $results = query("SELECT * FROM products where product_id=" . escape_string($_GET['add']) . " ");
        confirm($results);

        //now read out usefull info from sql above
        while($row = fetch_array($results)){
            if($row['product_qty'] != $_SESSION['product_' . $_GET['add']])
            {
                //if product is available in qty at that session increment the count to cart
                $_SESSION['product_' . $_GET['add']]+=1;
                redirect("../public/checkout.php");
            }
            else{
                //if user add more item to cart than qty available.
                set_msg("Damn, you are buying all my inventory.");
                redirect("../public/checkout.php");
            }
        }
    }

    //Remove item from Cart
    if(isset($_GET['remove'])){

        $_SESSION['product_' . $_GET['remove']]--;

        if($_SESSION['product_' . $_GET['remove']] < 1){
            unset($_SESSION['item_total']);
            unset($_SESSION['item_qty']);
            redirect("../public/checkout.php");
        }
        else{  
            redirect("../public/checkout.php");
        }
    }

    //delete item from Cart
    if(isset($_GET['delete'])){

        $_SESSION['product_' . $_GET['delete']] = "0";
        unset($_SESSION['item_total']);
        unset($_SESSION['item_qty']);
        
        redirect("../public/checkout.php");
    }

    //Function to Display Items in cart
    function cart(){

        $total = 0;
        $itemqty = 0;
        $item_name = 1;
        $item_number = 1;
        $amount = 1;
        $qty = 1;
        //Checking session based on ID passed
        foreach ($_SESSION as $name => $value) {
            if($value > 0){
                if(substr($name, 0, 8) == "product_"){
                    //To give us id of product (product_)
                    $len = strlen($name) - 8;
                    $id = substr($name, 8, $len);
                    //Setting up query to fetch results
                    $results = query("SELECT * FROM products WHERE product_id = " . escape_string($id) . " ");
                    confirm($results);
                    
                    //display result
                    while($row = fetch_array($results)){

                        $image = display_image($row['product_image']);
                        //TO get subtotal of product in cart based on quantity in cart
                        $subtotal = $row["product_price"] * $value;
                        //TO get total number of items in cart
                        $itemqty += $value;
                        //using heredoc to implement multiple lines of code
                        $product = <<<DELIMETER
                        <tr>
                            <td>{$row['product_title']}<br>
                                <img width='80' class="img-responsive" src="../resources/$image" alt="">
                            </td>
                            <td>&#36;{$row['product_price']}</td>
                            <td>{$value}</td>
                            <td>&#36;{$subtotal}</td>
                            <td>
                                <a style="text-decoration:none; color:green; font-size: 20px; padding: 10px" href="../resources/cart.php?add={$row['product_id']}"><span class="fa fa-plus-circle"></span></a>
                                <a style="text-decoration:none; color:#E8A317; font-size: 20px; padding: 10px" href="../resources/cart.php?remove={$row['product_id']}"><span class="fa fa-minus-circle"></span></a>
                                <a style="text-decoration:none; color:red; font-size: 20px; padding: 10px" href="../resources/cart.php?delete={$row['product_id']}"><span class="fa fa-remove"></span></a>
                            </td>
                        </tr>
                        <input type="hidden" name="item_name_{$item_name}" value="{$row['product_title']}">
                        <input type="hidden" name="item_number_{$item_number}" value="{$row['product_id']}">
                        <input type="hidden" name="amount_{$amount}" value="{$row['product_price']}">
                        <input type="hidden" name="quantity_{$qty}" value="{$value}">
                        DELIMETER;
                        //display product
                        echo $product;
                        //incrementing value to send to paypal checkout
                        $item_name++;
                        $item_number++;
                        $amount++;
                        $qty++;
                    }
                    //Getting total of items in cart
                    $_SESSION['item_total'] = $total += $subtotal;
                    //Getting qty of items in cart
                    $_SESSION['item_qty'] = $itemqty;
                }
            }
        }
    }

    //function to show buynow only when item in cart are present
    function buynow(){

        if(isset($_SESSION['item_qty']) && $_SESSION['item_qty'] >= 1){

            //using heredoc to implement multiple lines of code
            $buybutton = <<<DELIMETER
                    <input type="image" name="upload" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal">
                    <hr>
            DELIMETER;
            //return buybutton
            return $buybutton;
        }
    }

    //function to show report on admin side of what was purchased
    function report(){

        if(isset($_GET['tx'])){

            $amt = $_GET['amt'];
            $currency = $_GET['cc'];
            $transaction = $_GET['tx'];
            $payment = $_GET['st'];
            $status = "Processing..";
            $placedby = $_SESSION['username'];

            //inserting order details into database
            $order = query("INSERT INTO orders (order_amt, order_tx, order_payment, order_status, order_curr, order_placedby) VALUES('$amt','$transaction','$payment','$status','$currency','$placedby')");
            $last_id = last_id();
            confirm($order);

            $total = 0;
            $itemqty = 0;
            //Checking session based on ID passed
            foreach ($_SESSION as $name => $value) {
                if($value > 0){
                    if(substr($name, 0, 8) == "product_"){
                        //To give us id of product (product_)
                        $len = strlen($name) - 8;
                        $id = substr($name, 8, $len);
                        
                        //Setting up query to fetch results
                        $results = query("SELECT * FROM products WHERE product_id = " . escape_string($id) . " ");
                        confirm($results);
                        //display result
                        while($row = fetch_array($results)){
                            //TO get subtotal of product in cart based on quantity in cart
                            $subtotal = $row["product_price"] * $value;
                            //TO get total number of items in cart
                            $itemqty += $value;
                            //
                            $product_title = $row["product_title"];
                            $product_price = $row["product_price"];

                            //Setting up query to insert data in report table
                            $insert = query("INSERT INTO reports (product_id, order_id, product_title, product_price, product_qty) VALUES('$id', '$last_id', '$product_title', '$product_price','$value')");
                            confirm($insert);
                        }
                        //Getting total of items in cart
                        $total += $subtotal;
                        //Getting qty of items in cart
                        $itemqty;
                        unset($_SESSION[$name]);
                        unset($_SESSION['item_total']);
                        unset($_SESSION['item_qty']);

                    }
                }
            }
            //once payment is complete the session will be destroyed
            //session_destroy(); 
        }
        else{
    
            redirect("index.php");
        }
    }


?>