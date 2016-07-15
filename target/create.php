<?php
ini_set('display_errors', 'On');
// include database and object files

include_once '../config/database.php';
include_once '../objects/target.php';


// instantiate database class
$database = new Database();
$db = $database->getConnection();

// initialize object
$target = new Target($db);

// set values
$target->client = $_POST['client'];
$target->year = $_POST['year'];
$target->month = $_POST['month'];
$target->target = $_POST['target'];
//$target->rights =$_POST['rights'];

// set your default timezone
//date_default_timezone_set('Asia/Manila');
$target->created = date('Y-m-d H:i:s');

// create sale
$target->create();


?>