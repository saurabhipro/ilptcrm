<?php
ini_set('display_errors', 'On');
header('Content-Type: application/json');
$parameter_name = $_REQUEST['parameter_name'];
include '../config/database.php';

$mysqli = new mysqli('localhost', 'root', '1234','ilptcrm');
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$query = " select id , parameter_name , parameter_value from ilptcrm_datalists  where parameter_name ='".$parameter_name."'" ;
$result = $mysqli->query($query);
$rows = array();
while ($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
}
echo json_encode($rows);
mysqli_close($con);
?>
