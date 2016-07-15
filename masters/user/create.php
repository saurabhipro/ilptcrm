<?php
//ini_set('display_errors', 'On');
// include database and object files
include_once '../../config/database.php';
include_once '../../objects/user.php';
// instantiate database class
$database = new Database();
$db = $database->getConnection();
// initialize object
$user = new User($db);
// set values
$user->username =$_POST['username'];
$user->login_id =$_POST['login_id'];
$user->password =$_POST['password'];
$user->role =$_POST['role'];
$user->rights =$_POST['rights'];
 
// set your default timezone
date_default_timezone_set('Asia/Manila');
$user->created = date('Y-m-d H:i:s');
         
// create user
$user->create();
//header( "Location: list_users.php" );


?>