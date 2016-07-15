<?php
ini_set('display_errors', 'On');
// include database and object files
include_once '../../config/database.php';
include_once '../../objects/datalist.php';


// instantiate database class
$database = new Database();
$db = $database->getConnection();

// initialize object
$datalist = new Datalist($db);

// set values
$datalist->parameter_name = $_POST['parameter_name'];
$datalist->parameter_value = $_POST['parameter_value'];
$datalist->parameter_unit = $_POST['parameter_unit'];


//date_default_timezone_set('Asia/Manila');
//$product->created = date('Y-m-d H:i:s');


$datalist->create();
?>