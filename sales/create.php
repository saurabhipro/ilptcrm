<?php
ini_set('display_errors', 'On');
// include database and object files

include_once '../config/database.php';
include_once '../objects/sale.php';

 
// instantiate database class
$database = new Database();
$db = $database->getConnection();

// initialize object
$sale = new Sale($db);

// set values
$sale->client =$_POST['client'];
$sale->year =$_POST['year'];
$sale->month =$_POST['month'];
$sale->value_s =$_POST['value_s'];
//$sale->rights =$_POST['rights'];
 
// set your default timezone
//date_default_timezone_set('Asia/Manila');
$sale->created = date('Y-m-d H:i:s');
         
// create sale
$sale->create();


?>