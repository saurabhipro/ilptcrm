<?php
// include database and object files
ini_set('display_errors', 'On');
// include database and object files
include_once '../config/database.php';
include_once '../objects/sale.php';

 
// instantiate database and client object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$sale = new Sale($db);
 
// set values
$sale->client =$_POST['client'];
$sale->year =$_POST['year'];
$sale->month =$_POST['month'];
$sale->value_s =$_POST['value_s'];
$sale->id=$_POST['id'];
     
// update 
$sale->update();
?>