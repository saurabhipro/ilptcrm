<?php

ini_set('display_errors', 'On');
// include database and object files
include_once '../../config/database.php';
include_once '../../objects/user.php';
 
// instantiate database and user object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$user = new User($db);
 
// query users
$stmt = $user->readAll();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // start table
    echo "<table id='example' class='display' cellspacing='0' width='100%'>";
     
        // creating our table heading
    echo "<thead>";
        echo "<tr>";
            echo "<th>Username</th>";
            echo "<th>Login Id</th>";
            echo "<th>Password</th>";
            echo "<th>Role</th>";
//            echo "<th>Rights</th>";
                echo "<th style='text-align: center;'>Action</th>";
//            echo "<tr></tr>";
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
                echo "<td>{$username}</td>";
                echo "<td>{$login_id}</td>";
                echo "<td>{$password}</td>";
                echo "<td>{$role}</td>";
//                echo "<td>{$rights}</td>";
                echo "<td style='text-align:center;'>";
                    // add the record id here, it is used for editing and deleting users
                    echo "<div class='product-id display-none'>{$id}</div>";
                     
                    // edit button
                    echo "<div class='btn btn-info edit-btn margin-right-1em'>";
                        echo "<span class='glyphicon glyphicon-edit'></span> Edit";
                    echo "</div>";
                     
                    // delete button
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