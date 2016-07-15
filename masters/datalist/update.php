<?php
// include database and object files
ini_set('display_errors', 'On');
// include database and object files
include_once '../../config/database.php';
include_once '../../objects/datalist.php';

 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$datalist = new Datalist($db);
 
// set values
$datalist->name=$_POST['name'];
$product->lotion=$_POST['lotion'];
//$product->location=$_POST['location'];
$product->addres=$_POST['addres'];
$product->target=$_POST['target'];
$product->id=$_POST['id'];
     
// update 
$product->update();
?>