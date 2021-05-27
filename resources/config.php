<?php

#output buffer to handle mutiple requests
ob_start();

#Session
session_start();
//session_destroy();

#Path for MacOS or Windows to access directory for folder and files
defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);

#Path to front end folder using defined 
defined("TEMPLATE_FRONT") ? null : define("TEMPLATE_FRONT",__DIR__ . DS . "templates/front");

#Path to back end folder using defined 
defined("TEMPLATE_BACK") ? null : define("TEMPLATE_BACK",__DIR__ . DS . "templates/back");

#Path to upload directory for images using defined 
defined("UPLOAD_DIR") ? null : define("UPLOAD_DIR",__DIR__ . DS . "assests/uploads");

#Defining Database Host
defined("DB_HOST") ? null : define("DB_HOST","localhost");

#Defining Database User
defined("DB_USER") ? null : define("DB_USER","project415");

#Defining Database password
defined("DB_PASS") ? null : define("DB_PASS","csit415");

#Defining Database Name
defined("DB_NAME") ? null : define("DB_NAME","medicine_db");

#Connecting to Database using mysqli_connect Api
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if($connection === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

#Control for all other files to have this informations
require_once("functions.php");
require_once("cart.php");

?>
