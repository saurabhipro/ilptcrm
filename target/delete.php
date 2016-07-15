<?php
ini_set('display_errors', 'On');
// include database and object files
include_once '../config/database.php';
include_once '../objects/target.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$target = new Target($db);
 
$target->id=$_POST['id'];
$target->delete();
?>