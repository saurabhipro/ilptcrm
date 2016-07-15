<?php
ini_set('display_errors', 'On');
$report_id = isset($_GET['report_id']) ? $_GET['report_id'] : die('ERROR: Trial Report ID not found.');
include_once '../config/database.php';
include_once '../objects/trial_report.php';
include_once '../objects/machine_part.php';
include_once '../objects/tool.php';
include_once '../objects/cutting_conditions.php';
include_once '../objects/evaluation.php';
include_once 'chart_q.php';
include_once 'chart_spending.php';
$database = new Database();
$db = $database->getConnection();
// initialize object
$trial_report = new Trialreport($db);
$machine_part = new MachinedPart($db);
$tool = new Tool($db);
$cutting_conditions = new CuttingConditions($db);
$evaluation = new Evaluation($db);
// set client id property
$trial_report->id = $report_id;

// read single client
$trial_report->readOne();

?>

<!DOCTYPE html>

<style type="text/css">

    table {
        font-weight: bold;
        text-align: left;
    }

    #update_trial_report_form label.error {
        color: #FB3A3A;
        font-weight: bold;
    }


</style>

<meta charset="UTF-8">
<title>ILPT</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="../fusioncharts/js/fusioncharts.js"></script>
<script type="text/javascript" src="../fusioncharts/js/themes/fusioncharts.theme.fint.js"></script>
<script src="./jquery-1.9.1.js"></script>
<script src="./jquery.validate.min.js"></script>


<script type="text/javascript">
    $(function () {
        $("#update_trial_report_form").validate({
            rules: {
                customer: "required",
                name: "required",
                place: "required",
                date: "required",
                technology: "required",
                load_mp: "required",
                hardness_hrc: "required",
                type: "required",
                cost_per_hour1: "required",
                cost_per_hour2: "required",
                grade1: "required",
                grade2: "required",
                durability_of_edge1: "required",
                durability_of_edge2: "required",
                load: "required",
                techn_conditions: "required",
                name_mp: "required",
                requested_roughness: "required",
                workpiece: "required",
                group_mp: "required",
                producer1: "required",
                strength: "required",
                producer2: "required",
                hardness_hb: "required",
                description1: "required",
                description2: "required",
                cutting_index_insert1: "required",
                cutting_index_insert2: "required",
                chip_breaker1: "required",
                chip_breaker2: "required",
                cutting_speed1: "required",
                cutting_speed2: "required",
                revolution_rpm1: "required",
                revolution_rpm2: "required",
                feed_rev1: "required",
                feed_rev2: "required",
                feed_tooth1: "required",
                feed_tooth2: "required",
                feed_min1: "required",
                feed_min2: "required",
                cutting_depth1: "required",
                cutting_depth2: "required",
                machine_surface_width1: "required",
                machine_surface_width2: "required",
                thread_pitch1: "required",
                thread_pitch2: "required",
                number_of_infeed1: "required",
                number_of_infeed2: "required",
                cutting_length1: "required",
                cutting_length2: "required",
                depth_of_grooving1: "required",
                depth_of_grooving2: "required",
                durability_of_edge1: "required",
                durability_of_edge2: "required",
                durability_pcs1: "required",
                durability_pcs2: "required",
                flank_wear1: "required",
                flank_wear2: "required",
                surface_skin1: "required",
                surface_skin2: "required",
                interrupted_cut1: "required",
                interrupted_cut2: "required",
                coolant1: "required",
                coolant2: "required",
                surface_quality1: "required",
                surface_quality2: "required",
                cost_per_hour: "required",
                work_pcs: "required",
                durability_of_edge_min1: "required",
                durability_of_edge_min2: "required",
                machine_time1: "required",
                machine_time2: "required",
                insert_fracture_fragile1: "required",
                insert_fracture_fragile2: "required",
                built_up_edge1: "required",
                built_up_edge2: "required",
                nose_tip_plastic_deformation1: "required",
                nose_tip_plastic_deformation2: "required",
                kind_of_chip1: "required",
                kind_of_chip2: "required",
                successful_stories: "required",
                technical_evaluation: "required",
                included_test_to_the_general_evaluation: "required",
                rigidity_of_system1: "required",
                rigidity_of_system2: "required",
                tool_cost1: "required",
                tool_cost2: "required",
                no_of_inserts1: "required",
                no_of_inserts2: "required",
                cutting_index_insert1: "required",
                cutting_index_insert2: "required",
                grade1: "required",
                grade2: "required",
                insert_of_cost1: "required",
                insert_of_cost2: "required",
                no_of_cutting_edges1: "required",
                no_of_cutting_edges2: "required",
                total_cost_cn1: "required",
                total_cost_cn2: "required",
                tool_exchange_cost1: "required",
                tool_exchange_cost2: "required",
                machining_cost1: "required",
                machining_cost2: "required",
                total_cost1: "required",
                total_cost2: "required",
                no_of_inserts: "required",
                q1: "required",
                q2: "required"
            },
            messages: {
                customer: "Please enter valid value",
                name: "Please enter valid value",
                place: "Please enter valid value",
                date: "Please enter valid value",
                hardness_hrc: "Please enter valid value",
                type: "Please enter valid value"
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });
</script>
</head>


<div class="container">
    <!--    create_trial_report_form-->

    <form id='update_trial_report_form' action="update.php" method="post" novalidate="novalidate"
          enctype="multipart/form-data">
        <input type='hidden' name='id' value='<?php echo $report_id ?>'/>
        <div class="panel panel-danger text-center">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                        <b>Update Trial Report No : <?php echo htmlspecialchars($trial_report->id, ENT_QUOTES); ?> </b></a>
            </div>


            <div id="collapse1" class="panel-collapse collapse in">
                <div class="panel-body">

                    <table class='table table-hover table-responsive table-striped'>
                        <tr>
                            <td>Customer</td>
                            <td>
                                <input type="text" class="form-control" name="customer"
                                       value="<?php echo $trial_report->customer; ?>">
                            </td>
                            <td>Engineer Name</td>
                            <td><input type="text" class="form-control" name="name"
                                       value="<?php echo $trial_report->name; ?>"></td>
                            <td>Place of Test</td>
                            <td>
                                <input type="text" class="form-control" name="place"
                                       value="<?php echo $trial_report->place; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Date</td>
                            <td><i class="icon-date"></i>
                                <input type="date" name="date" value="<?php echo $trial_report->date; ?>"
                                       class="form-control" placeholder="Date"/></td>
                            <td>Technology</td>
                            <td><input type="text" name="technology" value="<?php echo $trial_report->technology; ?>"
                                       class="form-control"/></td>
                            <td></td>
                            <td>

                            </td>
                        </tr>

                    </table>

                </div>
            </div>


            <!--Machined Part-->
            <div class="panel-heading">
                <h3 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                        <b>Machined Part</b></a>
            </div>
            <div id="collapse1" class="panel-collapse collapse in">
                <div class="panel-body">

                    <table class='table table-hover table-responsive '>
                        <tr>
                            <td>Type</td>
                            <td><input type="text" class="form-control" name="type" placeholder=""
                                       value="<?php echo htmlspecialchars($trial_report->type, ENT_QUOTES); ?>"></td>
                            <td>Load</td>
                            <td><input type="text" class="form-control" name="load_mp" placeholder=""
                                       value="<?php echo htmlspecialchars($trial_report->load_mp, ENT_QUOTES); ?>"></td>
                            <td>Techn Condition</td>
                            <td><input type="text" class="form-control" name="techn_conditions" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->techn_conditions, ENT_QUOTES); ?>'>
                            </td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td><input type="text" class="form-control" name="name_mp" placeholder=""
                                       value="<?php echo htmlspecialchars($trial_report->name_mp, ENT_QUOTES); ?>"></td>
                            <td>Requested Roughness</td>
                            <td><input type="text" class="form-control" name="requested_roughness" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->requested_roughness, ENT_QUOTES); ?>'>
                            </td>
                            <td>Workpiece Mat</td>
                            <td><input type="text" class="form-control" name="workpiece" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->workpiece, ENT_QUOTES); ?>'>
                            </td>
                        </tr>
                        <tr>
                            <td>Group</td>
                            <td><input type="text" class="form-control" name="group_mp" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->group_mp, ENT_QUOTES); ?>'>
                            </td>
                            <td>Strength [Mpa]</td>
                            <td><input type="text" class="form-control" name="strength" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->strength, ENT_QUOTES); ?>'>
                            </td>
                            <td>Hardnerned HB</td>
                            <td><input type="text" class="form-control" name="hardness_hb" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->hardness_hb, ENT_QUOTES); ?>'>
                            </td>
                        </tr>
                        <tr>
                            <td>Hardnerned HRC</td>
                            <td><input type="text" class="form-control" name="hardness_hrc" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->hardness_hrc, ENT_QUOTES); ?>'>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>


            <!--Tool-->
            <div class="panel-heading">
                <h3 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                        <b>Tool</b></a>
                </h3>
            </div>
            <div id="collapse1" class="panel-collapse collapse in">
                <div class="panel-body">

                    <table class='table table-hover  table-responsive '>
                        <tr class="info">
                            <td>
                                <div class="row">
                                    <div class="col-md-1">C %</div>
                                    <div class="col-md-1">Mn %</div>
                                    <div class="col-md-1">Si %</div>
                                    <div class="col-md-1">Cr %</div>
                                    <div class="col-md-1">Ni %</div>
                                    <div class="col-md-1">V %</div>
                                    <div class="col-md-1">Mo %</div>
                                    <div class="col-md-1">W %</div>
                                    <div class="col-md-1">Co %</div>
                                    <div class="col-md-1">Ti %</div>
                                    <div class="col-md-1">Fe %</div>
                                    <div class="col-md-1">Al%</div>
                                </div>
                            </td>


                        </tr>
                        <tr class="success">
                            <td>
                                <div class="row">
                                    <div class="col-md-1"> <input type="text" id="c" name="c" class="form-control"  value='<?php echo htmlspecialchars($trial_report->c, ENT_QUOTES); ?>'></div>
                                    <div class="col-md-1"> <input type="text" id="mn" name="mn" class="form-control"  value='<?php echo htmlspecialchars($trial_report->mn, ENT_QUOTES); ?>'></div>
                                    <div class="col-md-1"> <input type="text" id="si" name="si" class="form-control"  value='<?php echo htmlspecialchars($trial_report->si, ENT_QUOTES); ?>'> </div>
                                    <div class="col-md-1"> <input type="text" id="cr" name="cr" class="form-control"  value='<?php echo htmlspecialchars($trial_report->cr, ENT_QUOTES); ?>'></div>
                                    <div class="col-md-1"> <input type="text" id="ni" name="ni" class="form-control"  value='<?php echo htmlspecialchars($trial_report->ni, ENT_QUOTES); ?>'></div>
                                    <div class="col-md-1"> <input type="text" id="v" name="v" class="form-control"  value='<?php echo htmlspecialchars($trial_report->v, ENT_QUOTES); ?>'></div>
                                    <div class="col-md-1"> <input type="text" id="mo" name="mo" class="form-control"  value='<?php echo htmlspecialchars($trial_report->mo, ENT_QUOTES); ?>'></div>
                                    <div class="col-md-1"> <input type="text" id="w" name="w" class="form-control"  value='<?php echo htmlspecialchars($trial_report->w, ENT_QUOTES); ?>'></div>
                                    <div class="col-md-1"> <input type="text" id="co" name="co" class="form-control"  value='<?php echo htmlspecialchars($trial_report->co, ENT_QUOTES); ?>'></div>
                                    <div class="col-md-1"> <input type="text" id="ti" name="ti" class="form-control"  value='<?php echo htmlspecialchars($trial_report->ti, ENT_QUOTES); ?>'></div>
                                    <div class="col-md-1"> <input type="text" id="fe" name="fe" class="form-control"  value='<?php echo htmlspecialchars($trial_report->fe, ENT_QUOTES); ?>'></div>
                                    <div class="col-md-1"> <input type="text" id="al" name="al" class="form-control"  value='<?php echo htmlspecialchars($trial_report->al, ENT_QUOTES); ?>'></div>
                                </div>
                            </td>
                        </tr>
                    </table>

                    <table class='table table-hover table-responsive'>
                        <tr>
                            <td>Producer</td>
                            <td><input type="text" class="form-control" name="producer1" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->producer1, ENT_QUOTES); ?>'>
                            </td>
                            <td></td>
                            <td><input type="text" class="form-control" name="producer2" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->producer2, ENT_QUOTES); ?>'>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td><input type="text" class="form-control" name="description1" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->description1, ENT_QUOTES); ?>'/>
                            </td>
                            <td></td>
                            <td><input type="text" class="form-control" name="description2" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->description2, ENT_QUOTES); ?>'/>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Cutting Index Insert(1)</td>
                            <td>
                                <input type="text" class="form-control"
                                       name="cutting_index_insert1" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->cutting_index_insert1, ENT_QUOTES); ?>'/>
                            </td>
                            <td></td>
                            <td><input type="text" class="form-control"
                                       name="cutting_index_insert2" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->cutting_index_insert2, ENT_QUOTES); ?>'/>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Chip Breaker(1)</td>
                            <td><input type="text" class="form-control"
                                       name="chip_breaker1" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->chip_breaker1, ENT_QUOTES); ?>'/>
                            </td>
                            <td></td>
                            <td><input type="text" class="form-control"
                                       name="chip_breaker2" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->chip_breaker2, ENT_QUOTES); ?>'/>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Grade(1)</td>
                            <td><input type="text" class="form-control"
                                       name="grade1" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->grade1, ENT_QUOTES); ?>'/></td>
                            <td></td>
                            <td><input type="text" class="form-control"
                                       name="grade2" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->grade2, ENT_QUOTES); ?>'/></td>
                            <td></td>
                        </tr>


                    </table>
                </div>
            </div>


            <!--Cutting Conditions-->
            <div class="panel-heading">
                <h3 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                        <b>Cutting Conditions</b></a>
                </h3>
            </div>
            <div id="collapse1" class="panel-collapse collapse in">
                <div class="panel-body">

                    <table class='table table-hover table-responsive table-striped'>

                        <!--saves in table ilptcrm_tool start-->
                        <tr>
                            <td>Cutting Speed(1)</td>
                            <td><input type="text" class="form-control"
                                       name="cutting_speed1" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->cutting_speed1, ENT_QUOTES); ?>'/>
                            </td>
                            <td>m/min</td>
                            <td><input type="text" class="form-control"
                                       name="cutting_speed2" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->cutting_speed2, ENT_QUOTES); ?>'/>
                            </td>
                            <td>m/min</td>
                        </tr>

                        <tr>
                            <td>Revolution RPM</td>
                            <td><input type="text" class="form-control"
                                       name="revolution_rpm1" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->revolution_rpm1, ENT_QUOTES); ?>'/>
                            </td>
                            <td>rev/min</td>
                            <td><input type="text" class="form-control"
                                       name="revolution_rpm2" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->revolution_rpm2, ENT_QUOTES); ?>'/>
                            </td>
                            <td>rev/min</td>
                        </tr>

                        <tr>
                            <td>Feed Rev</td>
                            <td><input type="text" class="form-control"
                                       name="feed_rev1" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->feed_rev1, ENT_QUOTES); ?>'/>
                            </td>
                            <td>mm/min</td>
                            <td><input type="text" class="form-control"
                                       name="feed_rev2" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->feed_rev2, ENT_QUOTES); ?>'>
                            </td>
                            <td>mm/min</td>
                        </tr>

                        <tr>
                            <td>Feed Tooth</td>
                            <td><input type="text" class="form-control"
                                       name="feed_tooth1" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->feed_tooth1, ENT_QUOTES); ?>'>
                            </td>
                            <td>mm/tooth</td>
                            <td><input type="text" class="form-control"
                                       name="feed_tooth2" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->feed_tooth2, ENT_QUOTES); ?>'>
                            </td>
                            <td>mm/tooth</td>
                        </tr>

                        <tr>
                            <td>Feed Min</td><!--saves in table ilptcrm_tool end-->
                            <td><input type="text" class="form-control" name="feed_min1" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->feed_min1, ENT_QUOTES); ?>'>
                            </td>
                            <td>mm/min</td>
                            <td><input type="text" class="form-control" name="feed_min2" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->feed_min2, ENT_QUOTES); ?>'>
                            </td>
                            <td>mm/min</td>
                        </tr>
                        <tr>
                            <td>Cutting Depth [Mn]</td>
                            <td><input type="text" class="form-control" name="cutting_depth1"
                                       value='<?php echo htmlspecialchars($trial_report->cutting_depth1, ENT_QUOTES); ?>'>
                            </td>
                            <td>m/min</td>
                            <td><input type="text" class="form-control" name="cutting_depth2" placeholder=""
                                       value="<?php echo htmlspecialchars($trial_report->cutting_depth2, ENT_QUOTES); ?>">
                            </td>
                            <td>m min</td>
                        </tr>

                        <tr>
                            <td>Machined Surface Width</td>
                            <td><input type="text" class="form-control" name="machine_surface_width1"
                                       value='<?php echo htmlspecialchars($trial_report->machine_surface_width1, ENT_QUOTES); ?>'>
                            </td>
                            <td>m/min</td>
                            <td><input type="text" class="form-control"
                                       name="machine_surface_width2" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->machine_surface_width2, ENT_QUOTES); ?>'>
                            </td>
                            <td>m/min</td>
                        </tr>

                        <tr>
                            <td>Thread Pitch (T)</td>
                            <td><input type="text" class="form-control"
                                       name="thread_pitch1" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->thread_pitch1, ENT_QUOTES); ?>'>
                            </td>
                            <td>m/min</td>
                            <td><input type="text" class="form-control"
                                       name="thread_pitch2" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->thread_pitch2, ENT_QUOTES); ?>'>
                            </td>
                            <td>m/min</td>
                        </tr>

                        <tr>
                            <td>Number of infeed (I)</td>
                            <td><input type="text" class="form-control"
                                       name="number_of_infeed1" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->number_of_infeed1, ENT_QUOTES); ?>'>
                            </td>
                            <td>m/min</td>
                            <td><input type="text" class="form-control"
                                       name="number_of_infeed2" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->number_of_infeed2, ENT_QUOTES); ?>'>
                            </td>
                            <td>m/min</td>
                        </tr>

                        <tr>
                            <td>Cutting length [mm] (L)</td>
                            <td><input type="text" class="form-control"
                                       name="cutting_length1" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->cutting_length1, ENT_QUOTES); ?>'>
                            </td>
                            <td>m/min</td>
                            <td><input type="text" class="form-control"
                                       name="cutting_length2" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->cutting_length2, ENT_QUOTES); ?>'>
                            </td>
                            <td>m/min</td>
                        </tr>

                        <tr>
                            <td>Depth Of Grooving [mm]</td>
                            <td><input type="text" class="form-control"
                                       name="depth_of_grooving1" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->depth_of_grooving1, ENT_QUOTES); ?>'>
                            </td>
                            <td>mm</td>
                            <td><input type="text" class="form-control"
                                       name="depth_of_grooving2" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->depth_of_grooving2, ENT_QUOTES); ?>'>
                            </td>
                            <td>mm</td>
                        </tr>

                        <tr>
                            <td>Surface Skin [Y/N]</td>
                            <td><input type="text" class="form-control btn-primary "
                                       name="surface_skin1"
                                       value='<?php echo htmlspecialchars($trial_report->surface_skin1, ENT_QUOTES); ?>'>
                                </input></td>
                            <td>Surface Skin [Y/N]</td>
                            <td>
                                <input type="text" class="form-control btn-primary"
                                       name="surface_skin2"
                                       value='<?php echo htmlspecialchars($trial_report->surface_skin2, ENT_QUOTES); ?>'>
                                </input>
                            </td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>Interrupted Cut [Y/N]</td>
                            <td><input type="text" class="form-control btn-primary "
                                       name="interrupted_cut1"
                                       value='<?php echo htmlspecialchars($trial_report->interrupted_cut1, ENT_QUOTES); ?>'>
                            </td>
                            <td>Interrupted Cut [Y/N]</td>
                            <td><input type="text" class="form-control btn-primary "
                                       name="interrupted_cut2"
                                       value='<?php echo htmlspecialchars($trial_report->interrupted_cut2, ENT_QUOTES); ?>'>
                            </td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>Coolant [Y/N]</td>
                            <td><input type="text" class="form-control btn-primary "
                                       name="coolant1"
                                       value='<?php echo htmlspecialchars($trial_report->coolant1, ENT_QUOTES); ?>'>
                            </td>
                            <td>Coolant [Y/N]</td>
                            <td><input type="text" class="form-control btn-primary "
                                       name="coolant2"
                                       value='<?php echo htmlspecialchars($trial_report->coolant2, ENT_QUOTES); ?>'>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Surface Quality</td>
                            <td><input type="text" class="form-control btn-primary "
                                       name="surface_quality1"
                                       value='<?php echo htmlspecialchars($trial_report->surface_quality1, ENT_QUOTES); ?>'>
                            </td>
                            <td>Rz</td>

                            <td><input type="text" class="form-control btn-primary "
                                       name="surface_quality2"
                                       value='<?php echo htmlspecialchars($trial_report->surface_quality2, ENT_QUOTES); ?>'>
                            </td>
                            <td></td>
                        </tr>
                        <tr class = "success">
                            <td>
                                Q1
                            </td>
                            <td>
                                <input type="text" class="form-control" id="q1" readonly
                                       value='<?php echo htmlspecialchars($trial_report->q1, ENT_QUOTES); ?>'
                                       name="q1" placeholder="">
                            </td>
                            <td>
                                Q2
                            </td>
                            <td>
                                <input type="text" class="form-control" id="q2" readonly class = "success"
                                       value='<?php echo htmlspecialchars($trial_report->q2, ENT_QUOTES); ?>'
                                       name="q2" placeholder="">
                            </td>
                        </tr>
                    </table>

                </div>
            </div>


            <!--Evaluation-->
            <div class="panel-heading">
                <h3 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                        <b>Evaluation</b></a>
                </h3>
            </div>
            <div id="collapse1" class="panel-collapse collapse in">
                <div class="panel-body">

                    <table class='table table-hover table-responsive '>
                        <tr>
                            <td>Durability Of Edge [Min] Tmin</td>
                            <td><input type="text" class="form-control"
                                       name="durability_of_edge1" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->durability_of_edge1, ENT_QUOTES); ?>'>
                            </td>
                            <td>min</td>
                            <td><input type="text" class="form-control"
                                       name="durability_of_edge2" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->durability_of_edge2, ENT_QUOTES); ?>'>
                            </td>
                            <td>min</td>
                        </tr>

                        <tr>
                            <td>Durability [Pcs]Tpcs</td>
                            <td><input type="text" class="form-control"
                                       name="durability_pcs1" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->durability_pcs1, ENT_QUOTES); ?>'>
                            </td>
                            <td>Pcs</td>
                            <td><input type="text" class="form-control"
                                       name="durability_pcs2" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->durability_pcs2, ENT_QUOTES); ?>'>
                            </td>
                            <td>Pcs</td>
                        </tr>


                        <tr>
                            <td>Flank Wear [Mm]VB</td>
                            <td><input type="text" class="form-control"
                                       name="flank_wear1" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->flank_wear1, ENT_QUOTES); ?>'>
                            </td>
                            <td></td>
                            <td><input type="text" class="form-control"
                                       name="flank_wear2" placeholder=""
                                       value='<?php echo htmlspecialchars($trial_report->flank_wear2, ENT_QUOTES); ?>'>
                            </td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>Insert Fracture-Fragile [Y/N]</td>
                            <td><input type="text" class="form-control btn-primary "
                                       name="insert_fracture_fragile1"
                                       value='<?php echo htmlspecialchars($trial_report->insert_fracture_fragile1, ENT_QUOTES); ?>'>
                            </td>
                            <td></td>
                            <td><input type="text" class="form-control btn-primary "
                                       name="insert_fracture_fragile2"
                                       value='<?php echo htmlspecialchars($trial_report->insert_fracture_fragile2, ENT_QUOTES); ?>'>
                            </td>
                            <td></td>
                        </tr>


                        <tr>
                            <td>Built-Up Edge [Y/N]</td>
                            <td><input type="text" class="form-control btn-primary "
                                       name="built_up_edge1"
                                       value='<?php echo htmlspecialchars($trial_report->built_up_edge1, ENT_QUOTES); ?>'>
                            </td>
                            <td></td>
                            <td><input type="text" class="form-control btn-primary "
                                       name="built_up_edge2"
                                       value='<?php echo htmlspecialchars($trial_report->built_up_edge2, ENT_QUOTES); ?>'>
                            </td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>Nose Tip Plastic Deformation [Y/N]</td>
                            <td><input type="text" class="form-control btn-primary "
                                       name="nose_tip_plastic_deformation1"
                                       value='<?php echo htmlspecialchars($trial_report->nose_tip_plastic_deformation1, ENT_QUOTES); ?>'>
                            </td>
                            <td></td>
                            <td><input type="text" class="form-control btn-primary "
                                       name="nose_tip_plastic_deformation2"
                                       value='<?php echo htmlspecialchars($trial_report->nose_tip_plastic_deformation2, ENT_QUOTES); ?>'>
                            </td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>Kind Of Chip [Y/N]</td>
                            <td><input type="text" class="form-control btn-primary "
                                       value='<?php echo htmlspecialchars($trial_report->kind_of_chip1, ENT_QUOTES); ?>'
                                       name="kind_of_chip1">
                            </td>
                            <td></td>
                            <td><input type="text" class="form-control btn-primary "
                                       value='<?php echo htmlspecialchars($trial_report->kind_of_chip2, ENT_QUOTES); ?>'
                                       name="kind_of_chip2">
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Rigidity Of System Machine-Part-Tool [Y/N]</td>
                            <td><input type="text" class="form-control btn-primary "
                                       value='<?php echo htmlspecialchars($trial_report->rigidity_of_system1, ENT_QUOTES); ?>'
                                       name="rigidity_of_system1">

                            </td>
                            <td></td>
                            <td><input type="text" class="form-control btn-primary "
                                       value='<?php echo htmlspecialchars($trial_report->rigidity_of_system2, ENT_QUOTES); ?>'
                                       name="rigidity_of_system2">

                            </td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>


            <!--Evaluation Notes Successful Stories-->
            <div class="panel-heading">
                <h3 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                        <b>Evaluation Notes Successful Stories</b></a>
                </h3>
            </div>
            <div id="collapse1" class="panel-collapse collapse in">
                <div class="panel-body">

                    <table class='table table-hover table-responsive '>

                        <tr>
                            <td>Successful Stories</td>
                            <td>
                                <div style="margin-right:96px;">
                                    <input type="text" class="form-control btn-primary "
                                           name="successful_stories"
                                           value='<?php echo htmlspecialchars($trial_report->successful_stories, ENT_QUOTES); ?>'>

                                </div>
                            </td>

                            <td>Technical evaluation of test</td>
                            <td>
                                <div style="margin-bottom: 0px;">

                                    <input type="text" class="form-control btn-primary "
                                           name="technical_evaluation"
                                           value='<?php echo htmlspecialchars($trial_report->technical_evaluation, ENT_QUOTES); ?>'>
                                    <!--                                    <select class="btn btn-primary dropdown-toggle"-->
                                    <!--                                            value='-->
                                    <?php //echo htmlspecialchars($trial_report->technical_evaluation, ENT_QUOTES); ?><!--'     style="width: 165px; height: 34px; ">-->
                                    <!--                                        <option value="">Select</option>-->
                                    <!--                                        <option value="">N-Unsuccessful</option>-->
                                    <!--                                        <option value="">OK-Successful</option>-->
                                    <!--                                        <option value="">W-Without a Conclusion</option>-->
                                    <!--                                        <option value="">I-Identical Result</option>-->
                                    <!--                                    </select>-->
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Attachment</td>
                            <td>
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                 <span class="btn btn-primary btn-file"><span class="fileupload-new">Select file</span>
                                     <span class="fileupload-exists">Change</span>
                                     <input id="uploadImage" type="file" accept="image/*" name="attachment"/>
                                 </span>
                                    <span class="fileupload-preview"></span>
                                    <a href="#" class="close fileupload-exists" data-dismiss="fileupload"
                                       style="float: none">×</a>
                                </div>


                                <div>
                                    <a href="<?php echo UPLOAD_DIR . htmlspecialchars($trial_report->attachment, ENT_QUOTES); ?>"
                                       download>
                                        Download Attachment
                                    </a>
                                </div> <!-- test ker bhai test ker -->

                            </td>
                            <td>Included test to the general evaluation</td>
                            <td>
                                <div style="margin-left: 4px;">

                                    <input type="text" class="form-control btn-primary "
                                           name="included_test_to_the_general_evaluation"
                                           value='<?php echo htmlspecialchars($trial_report->included_test_to_the_general_evaluation, ENT_QUOTES); ?>'
                                    </input>
                                    <!--                                    <select  value='-->
                                    <?php //echo htmlspecialchars($trial_report->included_test_to_the_general_evaluation, ENT_QUOTES); ?><!--' class="btn btn-primary dropdown-toggle"-->
                                    <!--                                            style="width: 165px; height: 34px; margin-left:-4px;">-->
                                    <!--                                        <option value="Select">Select</option>-->
                                    <!--                                        <option value="Yes">Yes</option>-->
                                    <!--                                        <option value="No">No</option>-->
                                    <!--                                    </select>-->
                                </div>
                            </td>

                        </tr>

                        <tr>
                            <td>Notes</td>
                            <td colspan="3">

                                    <textarea name="notes" class="form-control"
                                              rows="4"><?php echo htmlspecialchars($trial_report->notes, ENT_QUOTES); ?> </textarea>

                            </td>
                        </tr>
                        <tr>


                    </table>
                </div>
            </div>


            <!--Comparision Of Machining capacity-->
            <div class="panel-heading">
                <h3 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                        <b>Comparision Of Machining capacity (Volume of Material Cut in 1 Min : Q)</b></a>
                </h3>
            </div>

            <div id="collapse1" class="panel-collapse collapse in">
                <div class="panel-body">

                    <table class='table table-hover table-responsive '>
                        <tr>
                            <td>Cutting Speed(1)</td>
                            <td><input type="text" class="form-control"
                                       name="cutting_speed_cp1" placeholder="" disabled
                                       value='<?php echo htmlspecialchars($trial_report->cutting_speed1, ENT_QUOTES); ?>'/>
                            </td>
                            <td>m/min</td>
                            <td><input type="text" class="form-control"
                                       name="cutting_speed_cp2" placeholder="" disabled
                                       value='<?php echo htmlspecialchars($trial_report->cutting_speed2, ENT_QUOTES); ?>'/>
                            </td>
                            <td>m/min</td>
                            <td rowspan="10">
                                <div id="chartContainer">
                                
                                    <pre>
                                      Put the graph here !!
                                    </pre>

                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Revolution RPM</td>
                            <td><input type="text" class="form-control"
                                       name="revolution_rpm_cp1" placeholder="" disabled=""
                                       value='<?php echo htmlspecialchars($trial_report->revolution_rpm1, ENT_QUOTES); ?>'/>
                            </td>
                            <td>rev/min</td>
                            <td><input type="text" class="form-control"
                                       name="revolution_rpm_cp2" placeholder="" disabled
                                       value='<?php echo htmlspecialchars($trial_report->revolution_rpm2, ENT_QUOTES); ?>'/>
                            </td>
                            <td>rev/min</td>

                        </tr>

                        <tr>
                            <td>Feed Rev</td>
                            <td><input type="text" class="form-control"
                                       name="feed_rev_cp1" placeholder="" disabled
                                       value='<?php echo htmlspecialchars($trial_report->feed_rev1, ENT_QUOTES); ?>'/>
                            </td>
                            <td>mm/min</td>
                            <td><input type="text" class="form-control"
                                       name="feed_rev_cp2" placeholder="" disabled
                                       value='<?php echo htmlspecialchars($trial_report->feed_rev2, ENT_QUOTES); ?>'>
                            </td>
                            <td>mm/min</td>
                        </tr>

                        <tr>
                            <td>Feed Tooth</td>
                            <td><input type="text" class="form-control"
                                       name="feed_tooth_cp1" placeholder="" disabled
                                       value='<?php echo htmlspecialchars($trial_report->feed_tooth1, ENT_QUOTES); ?>'>
                            </td>
                            <td>mm/tooth</td>
                            <td><input type="text" class="form-control"
                                       name="feed_tooth_cp2" placeholder="" disabled
                                       value='<?php echo htmlspecialchars($trial_report->feed_tooth2, ENT_QUOTES); ?>'>
                            </td>
                            <td>mm/tooth</td>
                        </tr>

                        <tr>
                            <td>Feed Min</td>
                            <td><input type="text" class="form-control" name="feed_min_cp1" placeholder="" disabled
                                       value='<?php echo htmlspecialchars($trial_report->feed_min1, ENT_QUOTES); ?>'>
                            </td>
                            <td>mm/min</td>
                            <td><input type="text" class="form-control" name="feed_min_cp2" placeholder="" disabled
                                       value='<?php echo htmlspecialchars($trial_report->feed_min2, ENT_QUOTES); ?>'>
                            </td>
                            <td>mm/min</td>
                        </tr>

                        <tr>
                            <td>Cutting Depth [Mn]</td>
                            <td><input type="text" class="form-control" name="cutting_depth_cp1" disabled
                                       value='<?php echo htmlspecialchars($trial_report->cutting_depth1, ENT_QUOTES); ?>'>
                            </td>
                            <td>m/min</td>
                            <td><input type="text" class="form-control" disabled="" name="cutting_depth_cp2"
                                       placeholder=""
                                       value="<?php echo htmlspecialchars($trial_report->cutting_depth2, ENT_QUOTES); ?>">
                            </td>
                            <td>m min</td>
                        </tr>

                        <tr>
                            <td>Machined Surface Width</td>
                            <td><input type="text" class="form-control" name="machine_surface_width_cp1" disabled
                                       value='<?php echo htmlspecialchars($trial_report->machine_surface_width1, ENT_QUOTES); ?>'>
                            </td>
                            <td>m/min</td>
                            <td><input type="text" class="form-control"
                                       name="machine_surface_width_cp2" placeholder="" disabled=""
                                       value='<?php echo htmlspecialchars($trial_report->machine_surface_width2, ENT_QUOTES); ?>'>
                            </td>
                            <td>m/min</td>
                        </tr>

                        <tr>
                            <td>Thread Pitch (T)</td>
                            <td><input type="text" class="form-control"
                                       name="thread_pitch_cp1" placeholder="" disabled
                                       value='<?php echo htmlspecialchars($trial_report->thread_pitch1, ENT_QUOTES); ?>'>
                            </td>
                            <td>m/min</td>
                            <td><input type="text" class="form-control"
                                       name="thread_pitch_cp2" placeholder="" disabled
                                       value='<?php echo htmlspecialchars($trial_report->thread_pitch2, ENT_QUOTES); ?>'>
                            </td>
                            <td>m/min</td>
                        </tr>

                        <tr>
                            <td>Number of infeed (I)</td>
                            <td><input type="text" class="form-control"
                                       name="number_of_infeed_cp1" placeholder="" disabled
                                       value='<?php echo htmlspecialchars($trial_report->number_of_infeed1, ENT_QUOTES); ?>'>
                            </td>
                            <td>m/min</td>
                            <td><input type="text" class="form-control"
                                       name="number_of_infeed_cp2" placeholder="" disabled=""
                                       value='<?php echo htmlspecialchars($trial_report->number_of_infeed2, ENT_QUOTES); ?>'>
                            </td>
                            <td>m/min</td>
                        </tr>

                        <tr>
                            <td>Cutting length [mm] (L)</td>
                            <td><input type="text" class="form-control"
                                       name="cutting_length_cp1" placeholder="" disabled=""
                                       value='<?php echo htmlspecialchars($trial_report->cutting_length1, ENT_QUOTES); ?>'>
                            </td>
                            <td>m/min</td>
                            <td><input type="text" class="form-control"
                                       name="cutting_length_cp2" placeholder="" disabled=""
                                       value='<?php echo htmlspecialchars($trial_report->cutting_length2, ENT_QUOTES); ?>'>
                            </td>
                            <td>m/min</td>
                        </tr>

                        <tr>
                            <td>Depth Of Grooving [mm]</td>
                            <td><input type="text" class="form-control"
                                       name="depth_of_grooving_cp1" placeholder="" disabled=""
                                       value='<?php echo htmlspecialchars($trial_report->depth_of_grooving1, ENT_QUOTES); ?>'>
                            </td>
                            <td>mm</td>
                            <td><input type="text" class="form-control"
                                       name="depth_of_grooving_cp2" placeholder="" disabled=""
                                       value='<?php echo htmlspecialchars($trial_report->depth_of_grooving2, ENT_QUOTES); ?>'>
                            </td>
                            <td>mm</td>
                        </tr>

                        <tr>
                            <td>Surface Skin [Y/N]</td>
                            <td><input type="text" class="form-control"
                                       name="surface_skin_cp1" disabled=""
                                       value='<?php echo htmlspecialchars($trial_report->surface_skin1, ENT_QUOTES); ?>'>
                                </input></td>
                            <td>Surface Skin [Y/N]</td>
                            <td>
                                <input type="text" class="form-control"
                                       name="surface_skin_cp2" disabled=""
                                       value='<?php echo htmlspecialchars($trial_report->surface_skin2, ENT_QUOTES); ?>'>
                                </input>
                            </td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>Interrupted Cut [Y/N]</td>
                            <td><input type="text" class="form-control "
                                       name="interrupted_cut_cp1" disabled=""
                                       value='<?php echo htmlspecialchars($trial_report->interrupted_cut1, ENT_QUOTES); ?>'>
                            </td>
                            <td>Interrupted Cut [Y/N]</td>
                            <td><input type="text" class="form-control "
                                       name="interrupted_cut_cp2" disabled=""
                                       value='<?php echo htmlspecialchars($trial_report->interrupted_cut2, ENT_QUOTES); ?>'>
                            </td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>Coolant [Y/N]</td>
                            <td><input type="text" class="form-control "
                                       name="coolant_cp1" disabled
                                       value='<?php echo htmlspecialchars($trial_report->coolant1, ENT_QUOTES); ?>'>
                            </td>
                            <td>Coolant [Y/N]</td>
                            <td><input type="text" class="form-control "
                                       name="coolant_cp2" disabled=""
                                       value='<?php echo htmlspecialchars($trial_report->coolant2, ENT_QUOTES); ?>'>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Volume of the mat. cut off in 1 minute Q</td>
                            <td><input type="text" disabled="" class="form-control"
                                       value='<?php echo htmlspecialchars($trial_report->q1, ENT_QUOTES); ?>'></td>

                            <td>Volume of the mat. cut off in 1 minute Q</td>
                            <td><input type="text" disabled="" class="form-control"
                                       value='<?php echo htmlspecialchars($trial_report->q2, ENT_QUOTES); ?>'></td>

                        </tr>

                    </table>
                </div>
            </div>


            <!-- Spending Last Section-->
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                        <b>Spending on cutting operation (depending on machine conditions)</b></a>
                </h4>
            </div>


            <div id="collapse1" class="panel-collapse collapse in">
                <div class="panel-body">
                    <br>
                    <div>

                        <table class='table table-hover table-responsive'>
                            <tr>

                                <td colspan="3">Machine Part I</td>
                                <td colspan="2">Machine Part II</td>
                            </tr>

                            <tr class="info">
                                <td>Cost per Hour</td>
                                <td><input type="text" class="form-control" placeholder=""
                                           value='<?php echo htmlspecialchars($trial_report->cost_per_hour1, ENT_QUOTES); ?>'
                                           name="cost_per_hour1"/>
                                </td>
                                <td>Curr/hour : No Of Workpcs</td>
                                <td><input type="text" class="form-control" placeholder=""
                                           value='<?php echo htmlspecialchars($trial_report->cost_per_hour2, ENT_QUOTES); ?>'
                                           name="cost_per_hour2"/>
                                </td>
                                <td>pcs.</td>

                            </tr>
                            <tr>
                                <td>Durability of edge [min]</td>
                                <td><input type="text" class="form-control" disabled="" placeholder=""
                                           name="durability_of_edge1"
                                           value='<?php echo htmlspecialchars($trial_report->durability_of_edge1, ENT_QUOTES); ?>'>
                                </td>
                                <td>min.</td>
                                <td><input type="text" class="form-control" placeholder="" disabled=""
                                           name="durability_of_edge2"
                                           value='<?php echo htmlspecialchars($trial_report->durability_of_edge2, ENT_QUOTES); ?>'>
                                </td>
                                <td>min.</td>
                            </tr>

                            <tr>
                                <td>Durability [Pcs]</td>
                                <td><input type="text" class="form-control" disabled="" placeholder=""
                                           name="durability_pcs1"
                                           value='<?php echo htmlspecialchars($trial_report->durability_pcs1, ENT_QUOTES); ?>'>
                                </td>
                                <td>min.</td>
                                <td><input type="text" class="form-control" placeholder="" disabled=""
                                           name="durability_pcs2"
                                           value='<?php echo htmlspecialchars($trial_report->durability_pcs2, ENT_QUOTES); ?>'>
                                </td>
                                <td>min.</td>
                            </tr>


                            <tr>
                                <td>Machine time</td>
                                <td><input type="text" class="form-control" placeholder="" name="machine_time1"
                                           value='<?php echo htmlspecialchars($trial_report->machine_time1, ENT_QUOTES); ?>'/>
                                </td>
                                <td>pcs</td>
                                <td><input type="text" class="form-control" placeholder="" name="machine_time2"
                                           value='<?php echo htmlspecialchars($trial_report->machine_time2, ENT_QUOTES); ?>'/>
                                </td>
                                <td>pcs</td>
                            </tr>
                            <tr>
                                <td>Tool</td>
                                <td><input type="text" class="form-control" placeholder="" name="tool1"
                                           value='<?php echo htmlspecialchars($trial_report->tool1, ENT_QUOTES); ?>'/>
                                </td>
                                <td>min/pcs.</td>
                                <td><input type="text" class="form-control" placeholder="" name="tool2"
                                           value='<?php echo htmlspecialchars($trial_report->tool2, ENT_QUOTES); ?>'/>
                                </td>
                                <td>min/pcs.</td>
                            </tr>
                            <tr>
                                <td>Tool cost</td>
                                <td><input type="text" class="form-control" placeholder="" name="tool_cost1"
                                           value='<?php echo htmlspecialchars($trial_report->tool_cost1, ENT_QUOTES); ?>'/>
                                </td>
                                <td></td>
                                <td><input type="text" class="form-control" placeholder="" name="tool_cost2"
                                           value='<?php echo htmlspecialchars($trial_report->tool_cost2, ENT_QUOTES); ?>'/>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>No of inserts</td>
                                <td><input type="text" class="form-control" placeholder="" name="no_of_inserts1"
                                           value='<?php echo htmlspecialchars($trial_report->no_of_inserts1, ENT_QUOTES); ?>'/>
                                </td>
                                <td>curr</td>
                                <td><input type="text" class="form-control" placeholder="" name="no_of_inserts2"
                                           value='<?php echo htmlspecialchars($trial_report->no_of_inserts2, ENT_QUOTES); ?>'/>
                                </td>
                                <td>curr</td>
                            </tr>
                            <tr>
                                <td>Cutting index. insert</td>
                                <td><input type="text" class="form-control" placeholder="" disabled=""
                                           name="cutting_index_insert1"
                                           value='<?php echo htmlspecialchars($trial_report->cutting_index_insert1, ENT_QUOTES); ?>'/>
                                </td>
                                <td>pcs</td>
                                <td><input type="text" class="form-control" placeholder="" disabled=""
                                           name="cutting_index_insert2"
                                           value='<?php echo htmlspecialchars($trial_report->cutting_index_insert2, ENT_QUOTES); ?>'/>
                                </td>
                                <td>pcs</td>
                            </tr>
                            <tr>
                                <td>Grade</td>
                                <td><input type="text" disabled="" class="form-control" placeholder="" name="grade1"
                                           value='<?php echo htmlspecialchars($trial_report->grade1, ENT_QUOTES); ?>'/>
                                </td>
                                <td>&nbsp;</td>
                                <td><input type="text" disabled="" class="form-control" placeholder="" name="grade2"
                                           value='<?php echo htmlspecialchars($trial_report->grade2, ENT_QUOTES); ?>'/>
                                </td>
                                <td>curr</td>
                            </tr>
                            <tr>
                                <td>Insert of cost</td>
                                <td><input type="text" class="form-control" placeholder="" name="insert_of_cost1"
                                           value='<?php echo htmlspecialchars($trial_report->insert_of_cost1, ENT_QUOTES); ?>'/>
                                </td>
                                <td>curr</td>
                                <td><input type="text" class="form-control" placeholder="" name="insert_of_cost2"
                                           value='<?php echo htmlspecialchars($trial_report->insert_of_cost2, ENT_QUOTES); ?>'/>
                                </td>
                                <td>pcs</td>
                            </tr>
                            <tr>
                                <td>No. of cutting edges</td>
                                <td><input type="text" class="form-control" placeholder="" name="no_of_cutting_edges1"
                                           value='<?php echo htmlspecialchars($trial_report->no_of_cutting_edges1, ENT_QUOTES); ?>'/>
                                </td>
                                <td>&nbsp;</td>
                                <td><input type="text" class="form-control" placeholder="" name="no_of_cutting_edges2"
                                           value='<?php echo htmlspecialchars($trial_report->no_of_cutting_edges2, ENT_QUOTES); ?>'/>
                                </td>
                                <td>curr/pcs</td>
                            </tr>
                            <tr>
                                <td>Tool cost <b>C<sub>N</sub></b></td>
                                <td><input type="text" class="form-control" placeholder="" name="total_cost_cn1"  readonly
                                           value='<?php echo htmlspecialchars($trial_report->tool_cost_cn1, ENT_QUOTES); ?>'/>
                                </td>
                                <td>curr/pcs</td>
                                <td><input type="text" class="form-control" placeholder="" name="total_cost_cn2" readonly
                                           value='<?php echo htmlspecialchars($trial_report->tool_cost_cn2, ENT_QUOTES); ?>'/>
                                </td>
                                <td>curr/pcs.</td>
                            </tr>
                            <tr>
                                <td>Tool exchange cost <b>C<sub>V</sub></b></td>
                                <td><input type="text" class="form-control" placeholder="" name="tool_exchange_cost1" readonly
                                           value='<?php echo htmlspecialchars($trial_report->tool_exchange_cost1, ENT_QUOTES); ?>'/>
                                </td>
                                <td>curr/pcs</td>
                                <td><input type="text" class="form-control" placeholder="" name="tool_exchange_cost2" readonly
                                           value='<?php echo htmlspecialchars($trial_report->tool_exchange_cost2, ENT_QUOTES); ?>'/>
                                </td>
                                <td>curr/pcs</td>
                            </tr>
                            <tr>
                                <td>Machining cost <b>C<sub>M</sub></b></td>
                                <td><input type="text" class="form-control" placeholder="" name="machining_cost1" readonly
                                           value='<?php echo htmlspecialchars($trial_report->machining_cost1, ENT_QUOTES); ?>'/>
                                </td>
                                <td>curr/pcs</td>
                                <td><input type="text" class="form-control" placeholder="" name="machining_cost2" readonly
                                           value='<?php echo htmlspecialchars($trial_report->machining_cost2, ENT_QUOTES); ?>'/>
                                </td>
                                <td>curr/pcs</td>
                            </tr>


                            <tr>
                                <td>Total Cost C</td>
                                <td><input type="text" class="form-control" name="total_cost1" placeholder="" readonly
                                           value='<?php echo htmlspecialchars($trial_report->total_cost1, ENT_QUOTES); ?>'/>
                                </td>
                                <td>curr./pcs.</td>
                                <td><input type="text" class="form-control" placeholder="" name="total_cost2" readonly
                                           value='<?php echo htmlspecialchars($trial_report->total_cost2, ENT_QUOTES); ?>'/>
                                </td>
                                <td>curr./pcs.</td>
                            </tr>


                            <tr>
                                <td colspan="5">
                                    <div id="chartContainer1">
                                   
                                    <pre>
                                        
                                    </pre>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="6">
                                    <button type="submit" id='create_submit' name="btn_update" class='btn btn-success'>
                                        <span class='glyphicon glyphicon-info'></span>Update Trial report
                                    </button>

                                </td>

                            </tr>


                        </table>

                    </div>

                </div>
            </div>

        </div>
    </form>
</div>
</div>
</div>
</div>
</div>






