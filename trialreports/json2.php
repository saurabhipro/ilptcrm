<?php
ini_set('display_errors', 'On');
header('Content-Type: application/json');
$parameter_name = $_REQUEST['parameter_name'];
include '../config/database.php';

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}else{
    /*echo "connected";*/
}

$query = " select id , parameter_name , parameter_value from ilptcrm_datalists  " ;
$result = mysqli_query($con, $query);
$rows = array();
while ($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
}
echo json_encode($rows);
mysqli_close($con);
?>
