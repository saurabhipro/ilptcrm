<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$hostdb = "localhost";  // MySQl host
$userdb = "root";  // MySQL username
$passdb = "1234";  // MySQL password
$namedb = "ilptcrm";  // MySQL database name
$dbhandle = new mysqli($hostdb, $userdb, $passdb, $namedb);

if ($dbhandle->connect_error) {
    exit("There was an error with your connection: " . $dbhandle->connect_error);
}

$report_id = isset($_GET['report_id']) ? $_GET['report_id'] : die('ERROR: Trial Report ID not found.');

$strQuery = " select id , tool_cost_cn1 , tool_cost_cn2, tool_exchange_cost1 , tool_exchange_cost2, machining_cost1,machining_cost2 ,total_cost1 ,total_cost2 
 from ilptcrm_spending where id = " . $report_id;
$result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
if ($result) {
    // The `$arrData` array holds the chart attributes and data
    $arrData = array(
        "chart" => array(
            "caption" => "Spending Cost Comparision",
            "xAxisname" => "Cost",
            "pYAxisName" => "INR",
            "sYAxisName" => "INR",
            "numberPrefix" => "INR",
            "sNumberSuffix" => "INR",
            "paletteColors" => "#0075c2,#1aaf5d,#f2c500",
            "bgColor" => "#f2dede",
            "showBorder" => "1",
            "showCanvasBorder" => "1",
            "usePlotGradientColor" => "1",
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
        array_push($cat["category"], array("label" => "Tool Cost"));
        array_push($data1["data"], array("value" => $row["tool_cost_cn1"]));
        array_push($data2["data"], array("value" => $row["tool_cost_cn2"]));

        array_push($cat["category"], array("label" => "Tool Exchange Cost"));
        array_push($data1["data"], array("value" => $row["tool_exchange_cost1"]));
        array_push($data2["data"], array("value" => $row["tool_exchange_cost2"]));

        array_push($cat["category"], array("label" => "Machining Cost"));
        array_push($data1["data"], array("value" => $row["machining_cost1"]));
        array_push($data2["data"], array("value" => $row["machining_cost2"]));

        array_push($cat["category"], array("label" => "Total Cost"));
        array_push($data1["data"], array("value" => $row["total_cost1"]));
        array_push($data2["data"], array("value" => $row["total_cost2"]));

    }


    array_push($arrData["categories"], array("category" => array_values($cat["category"])));
    array_push($arrData["dataset"], array("seriesname" => "TOOL1", "data" => array_values($data1["data"])));
    array_push($arrData["dataset"], array("seriesname" => "TOOL2", "data" => array_values($data2["data"])));

    $jsonEncodedData = json_encode($arrData);
    $columnChart = new FusionCharts("mscolumn3dlinedy", "MySQLChart1", 1100, 500, "chartContainer1", "json", $jsonEncodedData);
    $columnChart->render();
    $dbhandle->close();
}
?>

