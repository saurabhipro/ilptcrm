<?php
include("../fusioncharts.php");
$hostdb = "localhost";  // MySQl host
$userdb = "root";  // MySQL username
$passdb = "1234";  // MySQL password
$namedb = "ilptcrm";  // MySQL database name
$dbhandle = new mysqli($hostdb, $userdb, $passdb, $namedb);

if ($dbhandle->connect_error) {
    exit("There was an error with your connection: " . $dbhandle->connect_error);
}

$report_id = isset($_GET['report_id']) ? $_GET['report_id'] : die('ERROR: Trial Report ID not found.');
$strQuery = " select id , q1, q2 from ilptcrm_cutting_conditions where id = ". $report_id ;
$result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
if ($result) {
    // The `$arrData` array holds the chart attributes and data
    $arrData = array(
        "chart" => array(
            "caption" => "Quantity Of material Cut in 1 Min  : Q",
            "xAxisname" => "Q / min",
            "pYAxisName" => "$",
            "sYAxisName" => "$",
            "numberPrefix" => "$",
            "sNumberSuffix" => "$",
            "paletteColors" => "#0075c2,#1aaf5d,#f2c500",
            "bgColor" => "#ffffff",
            "showBorder" => "0",
            "showCanvasBorder" => "0",
            "usePlotGradientColor" => "0",
            "plotBorderAlpha" => "10",
            "legendBorderAlpha" => "0",
            "legendBgAlpha" => "0",
            "legendShadow" => "0",
            "showHoverEffect" => "1",
            "valueFontColor" => "#ffffff",
            "rotateValues" => "1",
            "placeValuesInside" => "1",
            "divlineColor" => "#999999",
            "divLineDashed" => "1",
            "divLineDashLen" => "1",
            "divLineGapLen" => "1",
            "canvasBgColor" => "#ffffff",
            "captionFontSize" => "14",
            "subcaptionFontSize" => "14",
            "subcaptionFontBold" => "0"
        )
    );

    $arrData["categories"] = array();
    $cat["category"] = array();
    $arrData["dataset"] = array();
    $data1["data"] = array();
    $data2["data"] = array();
    $data3["data"] = array();

    while ($row = mysqli_fetch_array($result)) {
        array_push($cat["category"], array("label" => "Quantity of Material Cut l=per Min :  Q"));
        array_push($data1["data"], array("value" => $row["q1"]));
        array_push($data2["data"], array("value" => $row["q2"]));
    }
    array_push($arrData["categories"], array("category" => array_values($cat["category"])));
    array_push($arrData["dataset"], array("seriesname" => "TOOL1", "data" => array_values($data1["data"])));
    array_push($arrData["dataset"], array("seriesname" => "TOOL2", "data" => array_values($data2["data"])));

    $jsonEncodedData = json_encode($arrData);
    $columnChart = new FusionCharts("mscolumn3dlinedy", "MySQLChart", 500, 500, "chartContainer", "json", $jsonEncodedData);
    $columnChart->render();
    $dbhandle->close();
    
}
?>
