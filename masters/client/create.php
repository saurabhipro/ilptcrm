

<?php
//ini_set('display_errors', 'On');
// include database and object files

include_once '../../config/database.php';
include_once '../../objects/client.php';

 
// instantiate database class
$database = new Database();
$db = $database->getConnection();

// initialize object
$client = new Client($db);

// set values
$client->client_name =$_POST['client_name'];
$client->location =$_POST['location'];
$client->address =$_POST['address'];
$client->phone_no =$_POST['phone_no'];
//$client->rights =$_POST['rights'];
 
// set your default timezone
date_default_timezone_set('Asia/Manila');
$client->created = date('Y-m-d H:i:s');
         
// create user
$client->create();


?>