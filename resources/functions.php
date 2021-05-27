<?php
//Bunch of custom/helpers function to run the website 
$UPLOAD_DIR = "assests/uploads";

//Function to help with redirects
function redirect($location){
    header("Location: $location");

}

//Funtion for mysqli_query, to run queries
function query($sql){
    //refering to $connection in config.php
    global $connection;
    return mysqli_query($connection, $sql);
}

//Function to fetch array from results
function fetch_array($result){
    return mysqli_fetch_array($result);
}

//To get last Id
function last_id(){
    //refering to $connection in config.php
    global $connection;
    return mysqli_insert_id($connection);
}

//Function to check connection to Database
function confirm($result){
    //refering to $connection in config.php
    global $connection;
    //if result (send_query) doesnt exit in table or can't connect to DB
    if(!$result){
        die("Query Failed " . mysqli_error($connection));
    }
}

//Function to set message (setter function)
function set_msg($msg){
    //To set message according to condition
    if(!empty($msg)){
        $_SESSION['message'] = $msg;
    }
    else {
        $msg = "";
    }
}

//Function to get message (getter function) / display message
function get_msg(){
    //To display message according to condition
    if(isset($_SESSION['message'])){
        //if the session is active, display said message
        echo $_SESSION['message'];
        //unset the msg, so no warning when refresh page
        unset($_SESSION['message']);
    }
}

//Function to prevent SQL injection.
function escape_string($string){
    //refering to $connection in config.php
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}

//Function to display images
function display_image($image){

    global $UPLOAD_DIR;
    return $UPLOAD_DIR . DS . $image;
}

//Function to Get products from products table in DB
function get_products(){

    //Setting up query to fetch results
    $result = query("SELECT * FROM products");
    confirm($result);

    //display result
    while($row = fetch_array($result)){

        $image = display_image($row['product_image']);

        //using heredoc to implement multiple lines of code   
        $product = <<<DELIMETER
        <div class="col-sm-4 col-lg-4 col-md-4">
            <div class="row">
                <div class="card" style="padding: 30px;">
                    <a href="item.php?id={$row['product_id']}"><img class="card-img-top" style="width: 250px; height: 250px;"; src="../resources/{$image}" alt=""></a>
                    <div class="card-body" style="height:180px">
                        <h4 class="pull-right" style="padding: 10px; font-weight: bold;">&#36;{$row['product_price']}</h4>
                        <p class="card-title" style=" font-size: 18px;"><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a></p>
                        <p class="card-title" style="">{$row['product_shortdesc']}</p>
                        <a class="btn btn-warning" style="border-radius: 30px; " href="../resources/cart.php?add={$row['product_id']}">Add to Cart</a>
                    </div>
                </div>
            </div>          
        </div>
        DELIMETER;
        //display product
        echo $product;
    }
}

//Function to Get products from newest 6 products table in DB
function get_products_limit_6_DESC(){

    //Setting up query to fetch results
    $result = query("SELECT * FROM `products` ORDER BY `products`.`product_id` DESC LIMIT 6");
    confirm($result);

    //display result
    while($row = fetch_array($result)){
        $image = display_image($row['product_image']);
        //using heredoc to implement multiple lines of code   
        $product = <<<DELIMETER
        <div class="col-sm-4 col-lg-4 col-md-4">
            <div class="row">
                <div class="card" style="padding: 30px;">
                    <a href="item.php?id={$row['product_id']}"><img class="card-img-top" style="width: 250px; height: 250px;" src="../resources/{$image}" alt=""></a>
                    <div class="card-body" style="height:180px">
                        <h4 class="pull-right" style="padding: 10px; font-weight: bold;">&#36;{$row['product_price']}</h4>
                        <p class="card-title" style=" font-size: 18px;"><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a></p>
                        <p class="card-title" style="">{$row['product_shortdesc']}</p>
                        <a class="btn btn-warning" style="border-radius: 30px; " href="../resources/cart.php?add={$row['product_id']}">Add to Cart</a>
                    </div>
                </div>
            </div>          
        </div>
        DELIMETER;
        //display product
        echo $product;
    }
}

//Function to Get category from categories table in DB
function get_categories(){
   
    //Setting up query to fetch results    
    $result = query("SELECT * FROM categories");
    confirm($result);

    //Displaying results
    while($row = fetch_array($result)){
        
        //using heredoc to implement multiple lines of code                     
        $category = <<<DELIMETER
        <h4><a href='category.php?id={$row['cat_id']}' class='list-group-item'>{$row['cat_title']}</a></h4>
        DELIMETER;
        //display category
        echo $category;
    }
}

//Function to Display Category Name once on category landing page
function display_category(){
    
    //Setting up query to fetch results
    $result = query("SELECT * FROM categories WHERE cat_id = " . escape_string($_GET['id']) . " ");
    confirm($result);

    //display result
    $row = fetch_array($result);

    echo "{$row['cat_title']}";

}

//Funtion to get products based on category ID
function get_products_by_ID(){
    
    //Setting up query to fetch results
    $result = query("SELECT * FROM products WHERE product_category_id = " . escape_string($_GET['id']) . " ");
    confirm($result);

    //display result
    while($row = fetch_array($result)){
        $image = display_image($row['product_image']);
        //using heredoc to implement multiple lines of code                    
        $productbyid = <<<DELIMETER
        <div class="col-md-4 col-sm-4 hero-feature">
            <div class="card" style="padding: 30px;">
                <img class="card-img-top" style="width: 250px; height: 250px;"src="../resources/{$image}" alt="">
                <div class="card-body" style="height:180px">
                    <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a><span class="pull-right" style="padding: 10px; font-weight: bold;">&#36;{$row['product_price']}</span></h4>
                    <p>{$row['product_shortdesc']}</p>
                    <p>
                        <a style="border-radius: 30px;" href="../resources/cart.php?add={$row['product_id']}" class="btn btn-primary">Buy Now!</a> <a style="border-radius: 30px;" href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
                    </p>
                </div>
            </div>
        </div>
        
        DELIMETER;
        //display product based on category ID
        echo $productbyid;
    }
}

//function to login user
function login_user(){
    
    if(isset($_POST['submit'])){
        //checking username & password in database, additionally using escape_string function to prevent sql injection
        $username = escape_string($_POST['username']);
        $password = escape_string($_POST['password']);

        //Setting up query to fetch results
        $result = query("SELECT * FROM users WHERE username = '{$username}' LIMIT 1");
        confirm($result);

        $row = fetch_array($result);
        $hash = $row['password'];//getting hashed password from DB to checked against Unhashed password entered by user

        //checking login success
        if(mysqli_num_rows($result) == 0){
            set_msg("Your credentials are incorrect.<br>Please try again.");
            redirect(("login.php"));
        }
        else{
            //comparing hashed password in DB to password entered for validation
            if(password_verify($password, $hash)){
                if(($row['isAdmin']) == 'Yes') //This is check if the user is admim
                {
                    session_start();
                    //creating session for Admin user
                    $_SESSION['username'] = $username;
                    //welcome message
                    set_msg("Welcome to Capsule Corp Admin Dashboard {$username}");
                    //Admin user is redirected to Admin page.
                    redirect("admin");
                }
                else{
                    session_start();
                    //creating session for passed user
                    $_SESSION['username'] = $username;
                    //welcome message
                    set_msg("Welcome to Capsule Corp {$username}");
                    //user is redirected to index / home page.
                    redirect("index.php?$username");
                }     
            }else{
                set_msg("Your credentials are incorrect.<br>Please try again.");
                redirect(("login.php"));
            }   
        }
    }
}

//function to register user
function add_user(){

    if(isset($_POST['submit'])){
        $fname = escape_string($_POST['fname']);
        $lname = escape_string($_POST['lname']);
        $username = escape_string($_POST['username']);
        $password = password_hash(escape_string($_POST['password']), PASSWORD_DEFAULT);
        $email = escape_string($_POST['email']);

        $result = query("INSERT INTO users(fname, lname, username, password, email) VALUES('{$fname}','{$lname}','{$username}','{$password}','{$email}')");
        confirm($result);

        set_msg("Account Created");

        redirect("login.php");
    }
}

//Function to Contact Us page
function contact_us(){

    if(isset($_POST['submit'])){
        //to email
        $email_to = "rana_krishna@yahoo.com";
        $name = $_POST['name'];
        $subject = $_POST['subject'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $headers = "From: {$name} {$email}";
        
        //mails function used to deliver message
        $result = mail($email_to, $subject, $message, $headers);

        //if we dont connect and have results
        if(!$result){
            set_msg("ERROR, Couldn't send message.");
            redirect("contact.php");
        }
        else{
            set_msg("Message Sent<br>Our Customer Service team will reach out to you!<br>Thank you!");
            redirect("contact.php");
        } 
    }
}

//Funtion to display order in Admin
function display_orders(){
    
    //Setting up query to fetch results
    $results = query("SELECT * FROM `orders` ORDER BY `orders`.`order_id`  DESC");
    confirm($results);
    
    //display result
    while($row = fetch_array($results)){

        //using heredoc to implement multiple lines of code                
        $showorders = <<<DELIMETER
            <tr>
                <td>{$row['order_id']}</td>
                <td>{$row['order_amt']}</td>
                <td>{$row['order_tx']}</td>
                <td>{$row['order_payment']}</td>
                <td>{$row['order_placedby']}</td>
                <td>{$row['order_status']}</td>
                <td>
                    <a style="color:#838b8b; text-decoration:none; font-size: 20px;"  href="index.php?order_details&id={$row['order_id']}"><span class="fa fa-eye"></span></a>
                    <a style="text-decoration:none; color:#eead0e; font-size: 20px;"  href="../../resources/templates/back/ready.php?id={$row['order_id']}"><span class="fa fa-check-square-o"></span></a>
                    <a style="text-decoration:none; color:#2793e8; font-size: 20px;"  href="../../resources/templates/back/ship.php?id={$row['order_id']}"><span class="fa fa-paper-plane-o"></span></a>
                    <a style="text-decoration:none; color:#5cb85c; font-size: 20px;"  href="../../resources/templates/back/deliver.php?id={$row['order_id']}"><span class="fa fa-envelope-o"></span></a>
                    <a style="text-decoration:none; color:#d9534f; font-size: 20px; padding: 5px" href="../../resources/templates/back/cancel_orders.php?id={$row['order_id']}"><span class="fa fa-remove"></span></a>
                </td>
            </tr>
        DELIMETER;
        //display orders
        echo $showorders;
    }
}

//Function to order count
function order_count(){

    //Setting up query to fetch results
    $results = query("SELECT count(*) FROM ORDERS");
    confirm($results);

    //display result
    $row = fetch_array($results);

    echo "{$row['count(*)']}";

}

//Function to category count
function category_count(){

    //Setting up query to fetch results
    $results = query("SELECT count(*) FROM categories");
    confirm($results);

    //display result
    $row = fetch_array($results);

    echo "{$row['count(*)']}";

}

//Function to products count
function product_count(){

    //Setting up query to fetch results
    $results = query("SELECT count(*) FROM products");
    confirm($results);

    //display result
    $row = fetch_array($results);

    echo "{$row['count(*)']}";

}

//Function to user count
function users_count(){

    //Setting up query to fetch results
    $results = query("SELECT count(*) FROM users");
    confirm($results);

    //display result
    $row = fetch_array($results);

    echo "{$row['count(*)']}";

}
//Function to to view orders and cancel orders
function user_orders(){
    
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        //Setting up query to fetch results
        $results = query("SELECT * FROM `orders` WHERE order_placedby = \"$username\"");
        confirm($results);
        
        //display result
        while($row = fetch_array($results)){

            //using heredoc to implement multiple lines of code                
            $showorders = <<<DELIMETER
                    <tr>
                        <td>{$row['order_id']}</td>
                        <td>{$row['order_amt']}</td>
                        <td>{$row['order_tx']}</td>
                        <td>{$row['order_status']}</td>
                        <td>{$row['order_payment']}</td>
                        <td>{$row['order_placedby']}</td>
                        <td>
                            <a style="text-decoration:none; color:#5cb85c; font-size: 20px; padding: 10px" href="order_details.php?id={$row['order_id']}"><span class="fa fa-eye"></span></a>
                            <a style="text-decoration:none; color:#d9534f; font-size: 20px; padding: 10px" href="cancel_request.php?id={$row['order_id']}"><span class="fa fa-remove"></span></a>
                        </td>
                        
                    </tr>
            DELIMETER;
            //display orders
            echo $showorders;
        }
    }
    else{
        set_msg("Please Sign In to view your Orders");
    }
}

//Funtion to get order detail based on order ID
function order_details_by_id(){
    
    //Setting up query to fetch results
    $result = query("SELECT * FROM reports WHERE order_id = " . escape_string($_GET['id']) . " ");
    confirm($result);

    //display result
    while($row = fetch_array($result)){

        //using heredoc to implement multiple lines of code                    
        $orderbyid = <<<DELIMETER
        <tr>
        <td>{$row['product_id']}</td>
        <td>{$row['product_title']}</td>
        <td>{$row['product_qty']}</td>
        <td>&#36;{$row['product_price']}</td>
        </tr>
        DELIMETER;
        //display product based on category ID
        echo $orderbyid;
    }
}

//Funtion to display users in Admin
function display_users(){
    
    //Setting up query to fetch results
    $results = query("SELECT * FROM `users`");
    confirm($results);
    
    //display result
    while($row = fetch_array($results)){

        //using heredoc to implement multiple lines of code                
        $showusers = <<<DELIMETER
            <tr>
                <td>{$row['user_id']}</td>
                <td>{$row['fname']}</td>
                <td>{$row['lname']}</td>
                <td>{$row['username']}</td>
                <td>{$row['email']}</td>
                <td>{$row['isAdmin']}</td>
                <td>
                    <a style="color:#003600; text-decoration:none; font-size: 20px; padding: 10px"  href="../../resources/templates/back/isadmin.php?id={$row['user_id']}"><span class="fa fa-graduation-cap"></span></a>
                    <a style="color:#990000; text-decoration:none; font-size: 20px; padding: 10px"  href="../../resources/templates/back/revokeadmin.php?id={$row['user_id']}"><span class="fa fa-sign-out"></span></a>
                </td>
            </tr>
        DELIMETER;
        //display users
        echo $showusers;
    }
}

//Function to Display Category in admin
function display_category_inAdmin(){
    
    //Setting up query to fetch results
    $result = query("SELECT * FROM categories");
    confirm($result);

    //display result
    while($row = fetch_array($result)){

        //using heredoc to implement multiple lines of code                
        $showcategories = <<<DELIMETER
        <tr>
            <td>{$row['cat_id']}</td>
            <td>{$row['cat_title']}</td>
            <td>
                <a style="color:#990000; text-decoration:none; font-size: 20px; padding: 10px"  href="../../resources/templates/back/removeCategory.php?id={$row['cat_id']}"><span class="fa fa-remove"></span></a>
            </td>
        </tr>
        DELIMETER;
        //display categoryies
        echo $showcategories;
    }
}

//Function to add Category
function add_category(){
    
    if(isset($_POST['add_category'])){
        $cat_title = escape_string(($_POST['cat_title']));

        $insert = query("INSERT INTO categories(cat_title) VALUES ('{$cat_title}')");
        confirm($insert);
        set_msg("Category Added.");
        redirect("index.php?categories");
    }
}

//Function to Display product in admin
function display_product_inAdmin(){
    
    //Setting up query to fetch results
    $result = query("SELECT * FROM `products` ORDER BY `products`.`product_id`  DESC");
    confirm($result);

    //display result
    while($row = fetch_array($result)){
        
        $image = display_image($row['product_image']);
        $cat_title = show_product_category($row['product_category_id']);
        //using heredoc to implement multiple lines of code                
        $showproducts = <<<DELIMETER
        <tr>
            <td>{$row['product_id']}</td>
            <td>{$row['product_title']} <br>
            <img style="width: 62px; height: 62px;" src="../../resources/{$image}" alt="">
            </td>
            <td>{$row['product_shortdesc']}</td>
            <td>{$row['product_description']}</td>
            <td>$cat_title</td>
            <td>{$row['product_qty']}</td>
            <td>&#36;{$row['product_price']}</td>
            <td>
                <a style="color:#2793e8; text-decoration:none; font-size: 20px; padding: 10px"  href="index.php?edit_product&id={$row['product_id']}"><span class="fa fa-edit"></span></a>
                <a style="color:#990000; text-decoration:none; font-size: 20px; padding: 10px"  href="../../resources/templates/back/removeProduct.php?id={$row['product_id']}"><span class="fa fa-remove"></span></a>
            </td>
        </tr>
        DELIMETER;
        //display product
        echo $showproducts;
    }
}

//Function to add Product
function add_product(){
    
    if(isset($_POST["publish"])){

        $product_title = escape_string($_POST['product_title']);
        $product_shortdesc = escape_string($_POST['product_sdesc']);
        $product_description = escape_string($_POST['product_ldesc']);
        $product_price = escape_string($_POST['product_price']);
        $product_qty = escape_string($_POST['product_qty']);
        $product_category_id = escape_string($_POST['product_category_id']);
        $product_image = $_FILES['file']['name'];
        $temp_image = $_FILES['file']['tmp_name'];

        move_uploaded_file($temp_image, UPLOAD_DIR . DS . $product_image);

        $insert = query("INSERT INTO products(product_title,product_shortdesc,product_description,product_price,product_qty,product_category_id,product_image)
                        VALUES ('$product_title','$product_shortdesc','$product_description','$product_price','$product_qty','$product_category_id','$product_image')");
        confirm($insert);

        set_msg("New Product added to database");
        redirect("index.php?products");

    }
}

//Function to set category from categories table in DB in add products page
function set_categories(){
   
    //Setting up query to fetch results    
    $result = query("SELECT * FROM categories");
    confirm($result);

    //Displaying results
    while($row = fetch_array($result)){
        
        //using heredoc to implement multiple lines of code                 
        $category = <<<DELIMETER
        <option value="{$row['cat_id']}">{$row['cat_title']}</option>
        DELIMETER;
        //display category
        echo $category;
    }
}
//display catgeory based on product_category_id
function show_product_category($product_category_id){
    $result = query("SELECT * FROM categories WHERE cat_id = '{$product_category_id}' ");
    confirm($result);

    while($row = fetch_array($result)){
        return $row['cat_title'];
    }
}

//Function to edit Product
function edit_product(){
    
    if(isset($_POST["update"])){

        $product_title = escape_string($_POST['product_title']);
        $product_shortdesc = escape_string($_POST['product_shortdesc']);
        $product_description = escape_string($_POST['product_description']);
        $product_price = escape_string($_POST['product_price']);
        $product_qty = escape_string($_POST['product_qty']);
        $product_category_id = escape_string($_POST['product_category_id']);
        $product_image = $_FILES['file']['name'];
        $temp_image = $_FILES['file']['tmp_name'];

        if(empty($product_image)){
               
            $image = query("SELECT product_image FROM products WHERE product_id = " . escape_string($_GET['id']) ." ");
            confirm($image);

            $pic = fetch_array($image);

            $product_image = $pic['product_image'];

        }

        move_uploaded_file($temp_image, UPLOAD_DIR . DS . $product_image);

        $update = "UPDATE products SET ";
        $update .= "product_title       = '{$product_title}'        , ";
        $update .= "product_shortdesc   = '{$product_shortdesc}'    , ";
        $update .= "product_description = '{$product_description}'  , ";
        $update .= "product_price       = '{$product_price}'        , ";
        $update .= "product_qty         = '{$product_qty}'          , ";
        $update .= "product_category_id = '{$product_category_id}'  , ";
        $update .= "product_image       = '{$product_image}'          ";
        $update .= "WHERE product_id= " . escape_string($_GET['id']);
        $sendUpdate = query($update);
        confirm($sendUpdate);

        set_msg("Product information updated to database");
        redirect("index.php?products");

    }
}

?>