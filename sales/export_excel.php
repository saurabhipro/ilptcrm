<?php
ini_set('display_errors', 1);
// The function header by sending raw excel
header("Content-type: application/vnd-ms-excel");

// Defines the name of the export file "qwerty-export.xls"
header("Content-Disposition: attachment; filename=Trial-Report-export.xls");

// Add data table

include 'excel.php';