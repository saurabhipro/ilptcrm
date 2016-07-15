<?php
// include database and object files
ini_set('display_errors', 'On');
// include database and object files
include_once '../../config/database.php';
include_once '../../objects/client.php';

 
// instantiate database and client object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$client = new Client($db);
 
// set values
$client->client_name =$_POST['client_name'];
$client->location =$_POST['location'];
$client->address =$_POST['address'];
$client->phone_no =$_POST['phone_no'];
$client->id=$_POST['id'];
     
// update 
$client->update();
?>