<?php

ini_set('display_errors', 'On');
// include database and object files
include_once '../../config/database.php';
include_once '../../objects/datalist.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$dataList = new Datalist($db);
 
// query products
$stmt = $dataList->readAll();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // start table
    echo "<table id='example' class='display' cellspacing='0' width='100%'>";
     
        // creating our table heading
    echo "<thead>";
        echo "<tr>";
            echo "<th>Parameter Name</th>";
            echo "<th>Parameter Value</th>";
            echo "<th>Parameter Unit</th>";
            echo "<th></th>";
        echo "</tr>";
        echo "<thead>";
         
        // retrieve our table contents
        // fetch() is faster than fetchAll()
        // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
        echo "<tbody>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            // extract row
            // this will make $row['name'] to
            // just $name only
            extract($row);
             
            // creating new table row per record
            
            echo "<tr>";
                echo "<td>{$parameter_name}</td>";
                echo "<td>{$parameter_value}</td>";
                echo "<td>{$parameter_unit}</td>";
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
 
// tell the user if no records found
else{
    echo "<div class='alert alert-info'>No records found.</div>";
}
 
?>