<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);

include_once '../config/database.php';
include_once '../objects/trial_report.php';
include_once '../objects/machine_part_1.php';
include_once '../objects/tool.php';
include_once '../objects/cutting_conditions.php';
include_once '../objects/evaluation.php';
include_once '../objects/tool_spending.php';


$database = new Database();
$db = $database->getConnection();
$trial_report = new Trialreport($db);
$machine_part = new MachinedPart($db);
$tool = new Tool($db);
$cutting_conditions = new CuttingConditions($db);
$evaluation = new Evaluation($db);
$tool_spending = new ToolSpending($db);


$trial_report->customer = $_POST['customer'];
$trial_report->name = $_POST['name'];
$trial_report->date = $_POST['date'];
$trial_report->place = $_POST['place'];
$trial_report->technology = $_POST['technology'];

//// set values for machine_part
$machine_part->type = $_POST['type'];
$machine_part->load_mp = $_POST['load'];
$machine_part->techn_conditions = $_POST['techn_conditions'];
$machine_part->name_mp = $_POST['name_mp'];
$machine_part->requested_roughness = $_POST['requested_roughness'];
$machine_part->workpiece = $_POST['workpiece'];
$machine_part->group_mp = $_POST['group'];
$machine_part->strength = $_POST['strength'];
$machine_part->hardness_hb = $_POST['hardness_hb'];
$machine_part->hardness_hrc = $_POST['hardness_hrc'];
// $machine_part->application_description =$_POST['application_description'];

//set values for tool
$tool->c = $_POST['c'];
$tool->mn = $_POST['mn'];
$tool->si = $_POST['si'];
$tool->cr = $_POST['cr'];
$tool->ni = $_POST['ni'];
$tool->v = $_POST['v'];
$tool->mo = $_POST['mo'];
$tool->w = $_POST['w'];
$tool->co = $_POST['co'];
$tool->ti = $_POST['ti'];
$tool->fe = $_POST['fe'];
$tool->al = $_POST['al'];
$tool->producer1 = $_POST['producer1'];
$tool->producer2 = $_POST['producer2'];
$tool->description1 = $_POST['description1'];
$tool->description2 = $_POST['description2'];
$tool->cutting_index_insert1 = $_POST['cutting_index_insert1'];
$tool->cutting_index_insert2 = $_POST['cutting_index_insert2'];
$tool->chip_breaker1 = $_POST['chip_breaker1'];
$tool->chip_breaker2 = $_POST['chip_breaker2'];
$tool->grade1 = $_POST['grade1'];
$tool->grade2 = $_POST['grade2'];
$tool->cutting_speed1 = $_POST['cutting_speed1'];
$tool->cutting_speed2 = $_POST['cutting_speed2'];
$tool->revolution_rpm1 = $_POST['revolution_rpm1'];
$tool->revolution_rpm2 = $_POST['revolution_rpm2'];
$tool->feed_rev1 = $_POST['feed_rev1'];
$tool->feed_rev2 = $_POST['feed_rev2'];
$tool->feed_tooth1 = $_POST['feed_tooth1'];
$tool->feed_tooth2 = $_POST['feed_tooth2'];
$tool->feed_min1 = $_POST['feed_min1'];
$tool->feed_min2 = $_POST['feed_min2'];


$cutting_conditions->cutting_depth1 = $_POST['cutting_depth1'];
$cutting_conditions->cutting_depth2 = $_POST['cutting_depth2'];
$cutting_conditions->machine_surface_width1 = $_POST['machine_surface_width1'];
$cutting_conditions->machine_surface_width2 = $_POST['machine_surface_width2'];
$cutting_conditions->thread_pitch1 = $_POST['thread_pitch1'];
$cutting_conditions->thread_pitch2 = $_POST['thread_pitch2'];
$cutting_conditions->number_of_infeed1 = $_POST['number_of_infeed1'];
$cutting_conditions->number_of_infeed2 = $_POST['number_of_infeed2'];
$cutting_conditions->cutting_length1 = $_POST['cutting_length1'];
$cutting_conditions->cutting_length2 = $_POST['cutting_length2'];
$cutting_conditions->depth_of_grooving1 = $_POST['depth_of_grooving1'];
$cutting_conditions->depth_of_grooving2 = $_POST['depth_of_grooving2'];
$cutting_conditions->surface_skin1 = $_POST['surface_skin1'];
$cutting_conditions->surface_skin2 = $_POST['surface_skin2'];
$cutting_conditions->interrupted_cut1 = $_POST['interrupted_cut1'];
$cutting_conditions->interrupted_cut2 = $_POST['interrupted_cut2'];
$cutting_conditions->coolant1 = $_POST['coolant1'];
$cutting_conditions->coolant2 = $_POST['coolant2'];
$cutting_conditions->surface_quality1 = $_POST['surface_quality1'];
$cutting_conditions->surface_quality2 = $_POST['surface_quality2'];


////Section  5 , Evaluation
$evaluation->durability_of_edge1 = $_POST['durability_of_edge1'];
$evaluation->durability_of_edge2 = $_POST['durability_of_edge2'];
$evaluation->durability_pcs1 = $_POST['durability_pcs1'];
$evaluation->durability_pcs2 = $_POST['durability_pcs2'];
$evaluation->flank_wear1 = $_POST['flank_wear1'];
$evaluation->flank_wear2 = $_POST['flank_wear2'];
$evaluation->insert_fracture_fragile1 = $_POST['insert_fracture_fragile1'];
$evaluation->insert_fracture_fragile2 = $_POST['insert_fracture_fragile2'];
$evaluation->built_up_edge1 = $_POST['built_up_edge1'];
$evaluation->built_up_edge2 = $_POST['built_up_edge2'];
$evaluation->nose_tip_plastic_deformation1 = $_POST['nose_tip_plastic_deformation1'];
$evaluation->nose_tip_plastic_deformation2 = $_POST['nose_tip_plastic_deformation2'];
$evaluation->kind_of_chip1 = $_POST['kind_of_chip1'];
$evaluation->kind_of_chip2 = $_POST['kind_of_chip2'];
$evaluation->rigidity_of_system1 = $_POST['rigidity_of_system1'];
$evaluation->rigidity_of_system2 = $_POST['rigidity_of_system2'];
$evaluation->successful_stories = $_POST['successful_stories'];
$evaluation->technical_evaluation = $_POST['technical_evaluation'];
$evaluation->included_test_to_the_general_evaluation = $_POST['included_test_to_the_general_evaluation'];
$evaluation->notes = $_POST['notes'];
$evaluation->attachment = $_FILES['attachment'];


$d90_1 = $_POST['durability_of_edge1'];
$d106_1 = $_POST['no_of_cutting_edges1'];
$d104_1 = $_POST['insert_of_cost1'];
$d96_1 = $_POST['tool_cost1'];
$d98_1 = $_POST['no_of_inserts1'];
$d90_1 = $_POST['durability_pcs1'];
$d86_1 = $_POST['cost_per_hour1'];
$d92_1 = $_POST['machine_time1'];
$d90_2 = $_POST['durability_of_edge2'];
$d106_2 = $_POST['no_of_cutting_edges2'];
$d104_2 = $_POST['insert_of_cost2'];
$d96_2 = $_POST['tool_cost2'];
$d98_2 = $_POST['no_of_inserts2'];
$d90_2 = $_POST['durability_pcs2'];
$d86_2 = $_POST['cost_per_hour2'];
$d92_2 = $_POST['machine_time2'];
// This is for Q 1 , Q2
$d64_1 = $_POST['feed_rev1'];
$d62_1 = $_POST['cutting_speed1'];
$d66_1 = $_POST['feed_min1'];
$d67_1 = $_POST['cutting_depth1'];
$d68_1 = $_POST['machine_surface_width1'];
$d69_1 = $_POST['thread_pitch1'];
$d64_2 = $_POST['feed_rev2'];
$d62_2 = $_POST['cutting_speed2'];
$d66_2 = $_POST['feed_min2'];
$d67_2 = $_POST['cutting_depth2'];
$d68_2 = $_POST['machine_surface_width2'];
$d69_2 = $_POST['thread_pitch2'];

if ($d90_1 = 0 or $d90_2 = 0 or $d106_1 = 0 or $d106_2 = 0) {
    $tool_cost_cn1 = 0;
    $tool_exchange_cn1 = 0;

    $tool_cost_cn2 = 0;
    $tool_exchange_cn2 = 0;


} else {
    $tool_cost_cn1 = ((($d104_1 / $d106_1) * $d98_1) + ($d96_1 / 500) / $d90_1);
    $tool_exchange_cn1 = ((($d86_1 / 60) * $d98_1) / $d90_1);

    $tool_cost_cn2 = ((($d104_2 / $d106_2) * $d98_2) + ($d96_2 / 500) / $d90_2);
    $tool_exchange_cn2 = ((($d86_2 / 60) * $d98_2) / $d90_2);


}

$machining_cost1 = ($d86_1 / 60) * $d92_1;
$machining_cost2 = ($d86_2 / 60) * $d92_2;

$total_cost1 = $tool_cost_cn1 + $tool_exchange_cn1 + $machining_cost1;
$total_cost2 = $tool_cost_cn2 + $tool_exchange_cn2 + $machining_cost2;


$m9 = $_POST['technology'];
if ($m9 = "S" or $m9 = "U" or $m9 = "Z") {
    $q1 = $d64_1 * $d62_1 * $d67_1;
    $q1 = $d64_2 * $d62_2 * $d67_2;
}

if ($m9 = "F") {
    $q1 = ($d66_1 * $d67_1 * $d68_1) / 1000;
    $q2 = ($d66_2 * $d67_2 * $d68_2) / 1000;
}

if ($d69_1 = 0 or $d69_2 = 0) {
    $q1 = 0;
    $q2 = 0;
} else {
    if ($m9 = "V") {
        $q1 = (($d62_1 * 1000 / $d69_1 / pi()) * $d64_1) * ((pi() * pow($d69_1, 2)) / 4 / 1000);
        $q2 = (($d62_2 * 1000 / $d69_2 / pi()) * $d64_2) * ((pi() * pow($d69_2, 2)) / 4 / 1000);
    } else {
        $q1 = (($d62_1 * 1000 / $d69_1 / pi()) * $d64_1) * ((pi() * (pow($d69_1, 2) - pow($d69_1 - $d67_1 * 2, 2)) / 4 / 1000));
        $q2 = (($d62_2 * 1000 / $d69_2 / pi()) * $d64_2) * ((pi() * (pow($d69_2, 2) - pow($d69_2 - $d67_2 * 2, 2)) / 4 / 1000));
    }

}


$cutting_conditions->q1 = $q1;
$cutting_conditions->q2 = $q2;

$tool_spending->cost_per_hour1 = $_POST['cost_per_hour1'];
$tool_spending->cost_per_hour2 = $_POST['cost_per_hour2'];
$tool_spending->durability_of_edge1 = $_POST['durability_of_edge1'];
$tool_spending->durability_of_edge2 = $_POST['durability_of_edge2'];
$tool_spending->machine_time1 = $_POST['machine_time1'];
$tool_spending->machine_time2 = $_POST['machine_time2'];
$tool_spending->tool1 = $_POST['tool1'];
$tool_spending->tool2 = $_POST['tool2'];
$tool_spending->tool_cost1 = $_POST['tool_cost1'];
$tool_spending->tool_cost2 = $_POST['tool_cost2'];
$tool_spending->no_of_inserts1 = $_POST['no_of_inserts1'];
$tool_spending->no_of_inserts2 = $_POST['no_of_inserts2'];
$tool_spending->cutting_index_insert1 = $_POST['cutting_index_insert1'];
$tool_spending->cutting_index_insert2 = $_POST['cutting_index_insert2'];
$tool_spending->grade1 = $_POST['grade1'];
$tool_spending->grade2 = $_POST['grade2'];
$tool_spending->insert_of_cost1 = $_POST['insert_of_cost1'];
$tool_spending->insert_of_cost2 = $_POST['insert_of_cost2'];
$tool_spending->no_of_cutting_edges1 = $_POST['no_of_cutting_edges1'];
$tool_spending->no_of_cutting_edges2 = $_POST['no_of_cutting_edges2'];
$tool_spending->tool_cost_cn1 = round($tool_cost_cn1);
$tool_spending->tool_cost_cn2 = round($tool_cost_cn2);
$tool_spending->tool_exchange_cost1 = round($tool_exchange_cn1);
$tool_spending->tool_exchange_cost2 = round($tool_exchange_cn2);
$tool_spending->machining_cost1 = round($machining_cost1);
$tool_spending->machining_cost2 = round($machining_cost2);
$tool_spending->total_cost1 = round($total_cost1);
$tool_spending->total_cost2 = round($total_cost2);

$trial_report->create();
$machine_part->create();
$tool->create();
$cutting_conditions->create();
$evaluation->create();
$tool_spending->create();
header('Location: list_trial_report.php');
?>