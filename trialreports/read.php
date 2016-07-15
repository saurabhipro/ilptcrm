<?php
ini_set('display_errors', 'On');
include_once '../config/database.php';
include_once '../objects/trial_report.php';
$database = new Database();
$db = $database->getConnection();
$trial_report = new Trialreport($db);
$stmt = $trial_report->readAll();
$num = $stmt->rowCount();

if ($num > 0) {

    echo "<table id='example' class='display' cellspacing='0' width='100%'>";
    echo "<thead>";
    echo "<tr>";

    echo "<th>Rpt No</th>";
    echo "<th>Date</th>";
    echo "<th>Customer</th>";
    echo "<th>Place</th>";
    echo "<th>Technology</th>";

    echo "<th>Tech Condition</th>";
    echo "<th>Name</th>";
    echo "<th>Roughness</th>";
    echo "<th>Work Piece</th>";
    echo "<th>Group</th>";
    echo "<th>Strength</th>";

    echo "<th> </th>";
    echo "</tr>";
    echo "<thead>";
    echo "<tbody>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        echo "<tr>";
        echo "<td>{$id}</td>";
        echo "<td>{$date}</td>";
        echo "<td>{$customer}</td>";
        echo "<td>{$place}</td>";
        echo "<td>{$technology}</td>";


        echo "<td>{$techn_conditions}</td>";
        echo "<td>{$name_mp}</td>";
        echo "<td>{$requested_roughness}</td>";
        echo "<td>{$workpiece}</td>";
        echo "<td>{$group_mp}</td>";
        echo "<td>{$strength}</td>";


        echo "<td style='text-align:center;'>";
        echo "<div class='report_id display-none'>{$id}</div>";
        echo "<div class='btn btn-info edit-btn margin-right-1em'>";
        echo "<span class='glyphicon glyphicon-edit'></span> Edit";
        echo "</div>";

        echo "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "<div class='alert alert-info'>No records found.</div>";
}
?>