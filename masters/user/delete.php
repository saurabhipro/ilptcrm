<?php
ini_set('display_errors', 'On');
// include database and object files
include_once '../../config/database.php';
include_once '../../objects/user.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$user = new User($db);
 
$user->id=$_POST['id'];
$user->delete();
?>