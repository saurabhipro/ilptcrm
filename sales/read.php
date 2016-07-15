<?php

ini_set('display_errors', 'On');
// include database and object files
include_once '../config/database.php';
include_once '../objects/sale.php';

// instantiate database and sale object
$database = new Database();
$db = $database->getConnection();

// initialize object
$sale = new Sale($db);

// query clients
$stmt = $sale->readAll();
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){

    echo "<table id='example' class='display' cellspacing='0' width='100%'>";
    echo "<thead>";
        echo "<tr>";
            echo "<th>Client</th>";
            echo "<th>Year</th>";
            echo "<th>Month</th>";
            echo "<th>Value</th>";
//          echo "<th>Rights</th>";
            echo "<th style='text-align: center;'>Action</th>";
        echo "</tr>";
        echo "<thead>";
        echo "<tbody>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            echo "<tr>";
                echo "<td>{$client}</td>";
                echo "<td>{$year}</td>";
                echo "<td>{$month}</td>";
                echo "<td>{$value_s}</td>";
                echo "<td style='text-align:center;'>";
                    echo "<div class='product-id display-none'>{$id}</div>";
                    echo "<div class='btn btn-info edit-btn margin-right-1em'>";
                        echo "<span class='glyphicon glyphicon-edit'></span> Edit";
                    echo "</div>";
                    echo "<div class='btn btn-danger delete-btn'>";
                        echo "<span class='glyphicon glyphicon-remove'></span> Delete";
                    echo "</div>";
                echo "</td>";
            echo "</tr>";

        }
    echo "</tbody>";
    echo "</table>";

}

// tell the client if no records found
else{
    echo "<div class='alert alert-info'>No records found.</div>";
}

?>