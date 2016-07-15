<?php
// include database and object files
ini_set('display_errors', 'On');
// include database and object files
include_once '../../config/database.php';
include_once '../../objects/user.php';

 
// instantiate database and user object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$user = new User($db);
 
// set values
$user->username=$_POST['username'];
$user->login_id=$_POST['login_id'];
$user->password=$_POST['password'];
$user->role=$_POST['role'];
$user->rights=$_POST['rights'];
$user->id=$_POST['id'];
     
// update 
$user->update();
?>