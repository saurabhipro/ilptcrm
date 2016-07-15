<?php


$d90_1 = "111";
$d106_1 = "2";
$d104_1 = "3";
$d96_1 = "4";
$d98_1 = "60";
$d90_1 = "600";
$d86_1 = "700000";
$d92_1 = "700";
$d64_1 ="123";
$d62_1 ="123";
$d66_1 ="123";
$d67_1 ="123";
$d68_1 = "234";
$d69_1 = "234";



$d90_1 = "111";
$d106_1 = "2";
$d104_1 = "3";
$d96_1 = "4";
$d98_1 = "60";
$d90_1 = "600";
$d86_1 = "700000";
$d92_1 = "700";

$d64_1 =$_POST['feed_rev1'];;
$d62_1 =$_POST['cutting_speed1'];
$d66_1 =$_POST['feed_min1'];
$d67_1 =$_POST['cutting_depth1'];
$d68_1 = $_POST['machine_surface_width1'];
$d69_1 = $_POST['thread_pitch1'];

$d90_1 = $_POST['durability_of_edge_sp1'];
$d106_1 = $_POST['no_of_cutting_edges1'];
$d104_1 = $_POST['insert_of_cost1'];
$d96_1 = $_POST['tool_cost1'];
$d98_1 =  $_POST['no_of_inserts1'];
$d90_1 =  $_POST['durability_pcs1'];
$d86_1 =  $_POST['cost_per_hour1'];
$d92_1 =  $_POST['machine_time1'];


$m9;

if($m9 = "S" or $m9 = "U"  or $m9 = "Z" )
{
    $q1 = $d64_1*$d62_1*$d67_1;
    $q1 = $d64_2*$d62_2*$d67_2;

}

if($m9 = "F" )
{
    $q1 = ($d66_1*$d67_1*$d68_1)/1000;
    $q2 = ($d66_2*$d67_2*$d68_2)/1000;
}

if($m9 = "V" )
{
    $q1 = (($d62_1*1000/$d69_1/pi())*$d64_1)*((pi()*pow($d69_1,2))/4/1000);
    $q2 = (($d62_2*1000/$d69_2/pi())*$d64_2)*((pi()*pow($d69_2,2))/4/1000);

}
else
{
    $q1= (($d62_1*1000/$d69_1/pi())*$d64_1)*((pi()*(pow($d69_1,2)-pow($d69_1-$d67_1*2,2))/4/1000));
    $q2= (($d62_2*1000/$d69_2/pi())*$d64_2)*((pi()*(pow($d69_2,2)-pow($d69_2-$d67_2*2,2))/4/1000));
}

$tool_cost_cn1 = ((($d104_1 / $d106_1) * $d98_1) + ($d96_1 / 500) / $d90_1);
$tool_exchange_cn1 = ((($d86_1 / 60) * $d98_1) / $d90_1);
$machining_cost = ($d86_1 / 60) * $d92_1;
$total_cost_1 = $tool_cost_cn1 + $tool_exchange_cn1 + $machining_cost;   



?>
