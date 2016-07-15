<?php
// include database and object files
ini_set('display_errors', 'On');
// include database and object files
include_once '../config/database.php';
include_once '../objects/target.php';

 
// instantiate database and client object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$target = new Target($db);
 
// set values
$target->client =$_POST['client'];
$target->year =$_POST['year'];
$target->month =$_POST['month'];
$target->target =$_POST['target'];
$target->id=$_POST['id'];
     
// update 
$target->update();
?>