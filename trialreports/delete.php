<?php
ini_set('display_errors', 'On');
// include database and object files
include_once '../../config/database.php';
include_once '../../objects/client.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$client = new Client($db);
 
$client->id=$_POST['id'];
$client->delete();
?>