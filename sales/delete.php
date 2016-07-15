<?php
ini_set('display_errors', 'On');
// include database and object files
include_once '../config/database.php';
include_once '../objects/sale.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$sale = new Sale($db);
 
$sale->id=$_POST['id'];
$sale->delete();
?>