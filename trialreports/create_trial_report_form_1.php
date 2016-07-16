<!DOCTYPE html>
<?php require("../header.php") ?>
<title>Create trial report</title>
<style type="text/css">
    table {
        font-weight: bold;
        text-align: left;
    }
    #chartdiv {
        width: 100%;
        height: 435px;
        font-size: 11px;
    }
    .label {
        width: 100px;
        text-align: right;
        float: left;
        padding-right: 10px;
        font-weight: bold;
    }
    #create_trial_report_form label.error {
        color: #FB3A3A;
        font-weight: bold;
    }
    h1 {
        font-family: Helvetica;
        font-weight: 100;
        color: #333;
        padding-bottom: 20px;
    }
</style>
<meta charset="UTF-8">
<title>ILPT</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="../fusioncharts/js/fusioncharts.js"></script>
<script type="text/javascript" src="../fusioncharts/js/themes/fusioncharts.theme.fint.js"></script>
<script src="//code.jquery.com/jquery-1.9.1.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>


<script type="text/javascript">
    $(document).ready(function () {


        $("#durability_of_edge1").change(function () {
            $("#durability_of_edge11").val($(this).val());
        });

        $("#durability_of_edge2").change(function () {
            alert($("#durability_of_edge2").val());
            $("#durability_of_edge21").val($(this).val());
        });


        $("#durability_pcs1").change(function () {
            $("#durability_pcs11").val($(this).val());
        });

        $("#durability_pcs2").change(function () {
            $("#durability_pcs21").val($(this).val());
        });

        $("#grade1").change(function () {
            $("#grade11").val($(this).val());
        });

        $("#grade2").change(function () {
            $("#grade21").val($(this).val());
        });



        $.ajax({
            type: "POST",
            dataType: "json",
            url: "datalist_json.php?parameter_name=grade",
            data: "",
            success: function (data) {
                $.each(data, function (index, element) {
                    $('#grade1').append($('<option>', {text: element.parameter_value, value: element.parameter_value}));
                    $('#grade2').append($('<option>', {text: element.parameter_value, value: element.parameter_value}));
                });
            },
            error: function (request, status, error) {
                alert(request.responseText);
            }
        });

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "datalist_json.php?parameter_name=chipbreaker",
            data: "",
            success: function (data) {
                $.each(data, function (index, element) {
                    $('#chip_breaker1').append($('<option>', {
                        text: element.parameter_value,
                        value: element.parameter_value
                    }));

                    $('#chip_breaker2').append($('<option>', {
                        text: element.parameter_value,
                        value: element.parameter_value
                    }));

                    $('select').each(function () {
                        $(this).find('option:nth-child(2)').prop('selected', 'selected');
                    });


                    $("input:not([type=file])").each(function () {
                        $(this).val("0");
                    });


                });
            },
            error: function (request, status, error) {
                alert(request.responseText);
            }
        });
    });


</script>


<script type="text/javascript">
    $(function () {
        $("#create_trial_report_form").validate({
            rules: {
                customer: "required",
                name: "required",
                place: "required",
                date: "required",
                hardness_hrc: "required",
                type: "required",
                cost_per_hour1: {
                    required: true,
                    number: true
                },
                cost_per_hour2: {
                    required: true,
                    number: true
                },
                grade1: "required",
                grade2: "required",
                durability_of_edge1: {
                    required: true,
                    number: true
                },

                durability_of_edge2: {
                    required: true,
                    number: true
                },
                load: "required",

                techn_conditions: "required",
                name_mp: "required",
                requested_roughness: {
                    required: true,
                },
                workpiece: "required",
                group: "required",
                producer1: {
                    required: true,
                },
                strength: "required",
                producer2: {
                    required: true,
                },
                cutting_speed1: {
                    required: true,
                    number: true
                },
                cutting_speed2: {
                    required: true,
                    number: true
                },
                hardness_hb: "required",


                description1: {
                    required: true,
                },
                description2: {
                    required: true,

                },

                //attachment: "required",
                cutting_index_insert1: "required",
                cutting_index_insert2: "required",
                cutting_speed1: {
                    required: true,
                    number: true,
                    letter: false
                },

                cutting_speed2: {
                    required: true,
                    number: true,
                    letter: false
                },
                revolution_rpm1: {
                    required: true,
                    number: true,
                    letter: false
                },
                revolution_rpm2: {

                    required: true,
                    number: true,
                    letter: false
                },
                feed_rev1: {
                    required: true,
                    number: true,
                    letter: false
                },
                feed_rev2: {
                    required: true,
                    number: true,
                    letter: false
                },
                feed_tooth1: {
                    required: true,
                    number: true,
                    letter: false
                },
                feed_tooth2: {
                    required: true,
                    number: true,
                    letter: false
                },
                feed_min1: {
                    required: true,
                    number: true,
                    letter: false
                },
                feed_min2: {
                    required: true,
                    number: true,
                    letter: false
                },
                cutting_depth1: {
                    required: true,
                    number: true,
                    letter: false
                },
                cutting_depth2: {
                    required: true,
                    number: true,
                    letter: false
                },
                machine_surface_width1: {
                    required: true,
                    number: true,
                    letter: false
                },
                machine_surface_width2: {
                    required: true,
                    number: true,
                    letter: false
                },
                thread_pitch1: "required",
                thread_pitch2: "required",
                number_of_infeed1: {
                    required: true,
                    number: true,
                    letter: false
                },
                number_of_infeed2: {
                    required: true,
                    number: true,
                    letter: false
                },
                cutting_length1: {
                    required: true,
                    number: true,
                    letter: false
                },
                cutting_length2: {
                    required: true,
                    number: true,
                    letter: false
                },
                depth_of_grooving1: {
                    required: true,
                    number: true,
                    letter: false
                },
                depth_of_grooving2: {
                    required: true,
                    number: true,
                    letter: false
                },
                durability_of_edge1: {
                    required: true,
                    number: true,
                    letter: false,
                    notEqual: 0
                },
                durability_of_edge2: {
                    required: true,
                    number: true,
                    letter: false
                },
                durability_pcs1: {
                    required: true,
                    number: true,
                    letter: false
                },
                durability_pcs2: {
                    required: true,
                    number: true,
                    letter: false
                },
                flank_wear1: {
                    required: true,
                    number: true,
                    letter: false
                },
                flank_wear2: {
                    required: true,
                    number: true,
                    letter: false
                },
                cost_per_hour: {
                    required: true,
                    number: true,
                    letter: false
                },
                work_pcs: {
                    required: true,
                    number: true,
                    letter: false
                },
                durability_of_edge_min1: {
                    required: true,
                    number: true,
                    letter: false
                },
                durability_of_edge_min2: {
                    required: true,
                    number: true,
                    letter: false
                },
                machine_time1: {
                    required: true,
                    number: true,
                    letter: false
                },
                machine_time2: {
                    required: true,
                    number: true,
                    letter: false
                },
                tool1: "required",
                tool2: "required",


                tool_cost1: {
                    required: true,
                    number: true,
                    letter: false
                },
                tool_cost2: {
                    required: true,
                    number: true,
                    letter: false
                },
                no_of_inserts1: {
                    required: true,
                    number: true,
                    letter: false
                },
                no_of_inserts2: {
                    required: true,
                    number: true,
                    letter: false
                },
                cutting_index_insert1: "required",
                cutting_index_insert2: "required",
                grade1: "required",
                grade2: "required",


                insert_of_cost1: {
                    required: true,
                    number: true

                },
                insert_of_cost2: {
                    required: true,
                    number: true

                },
                no_of_cutting_edges1: {
                    required: true,
                    number: true,
                    letter: false
                },
                no_of_cutting_edges2: {
                    required: true,
                    number: true,
                    letter: false
                },
                total_cost_cn1: {
                    required: true,
                    number: true,
                    letter: false
                },
                total_cost_cn2: {
                    required: true,
                    number: true,
                    letter: false
                },
                tool_exchange_cost1: {
                    required: true,
                    number: true

                },
                tool_exchange_cost2: {
                    required: true,
                    number: true

                },
                machining_cost1: {
                    required: true,
                    number: true,
                    letter: false
                },
                machining_cost2: {
                    required: true,
                    number: true,
                    letter: false
                },
                total_cost1: {
                    required: true,
                    number: true,
                    letter: false
                },
                total_cost2: {
                    required: true,
                    number: true,
                    letter: false
                },
                q1: {
                    required: true,
                    number: true
                },

                q2: {
                    required: true,
                    number: true
                }

            },
            messages: {
                date: "Please enter valid date.",
                type: "Please enter valid type .",
                //load: "Please enter valid load.",
                //techn_conditions: "Please enter valid value .",
                name_mp: "Please enter the mp name.",
                requested_roughness: "Please enter valid value.",
                workpiece: "Please enter valid value",
                group: "Please enter valid value",
                strength: "Please enter valid value",
                producer1: "Please enter valid value.",
                producer2: "Please enter valid value.",
                cutting_speed1: "Please enter valid value.",
                cutting_speed2: "Please enter valid value.",
                //hardness_hb: "Please enter valid value.",
                description1: "Please enter your valid value.",
                description2: "Please enter your valid value.",
                cutting_index_insert1: "Please enter valid value.",
                cutting_index_insert2: "Please enter valid value.",
                //cutting_speed1: "Please enter valid value.",
                //cutting_speed2: "Please enter valid value.",
                revolution_rpm1: "Please enter valid value.",
                revolution_rpm2: "Please enter valid value.",
                feed_rev1: "Please enter valid value",
                feed_rev2: "Please enter valid value",
                feed_tooth1: "Please enter valid value",
                feed_tooth2: "Please enter valid value",
                feed_min1: "Please enter valid value",
                feed_min2: "Please enter valid value",
                cutting_depth1: "Please enter valid value",
                cutting_depth2: "Please enter valid value",
                machine_surface_width1: "Please enter valid value",
                machine_surface_width2: "Please enter valid value",
                thread_pitch1: "Please enter valid value",
                thread_pitch2: "Please enter valid value",
                number_of_infeed1: "Please enter valid value",
                number_of_infeed2: "Please enter valid value",
                cutting_length1: "Please enter valid value",
                cutting_length2: "Please enter valid value",
                depth_of_grooving1: "Please enter valid value",
                depth_of_grooving2: "Please enter valid value",
                durability_of_edge1: "Please enter valid value",
                durability_of_edge2: "Please enter valid value",
                durability_pcs1: "Please enter valid value",
                durability_pcs2: "Please enter valid value",
                flank_wear1: "Please enter valid value",
                flank_wear2: "Please enter valid value",
                cost_per_hour1: "Please enter valid value.",
                cost_per_hour2: "Please enter valid value.",
                work_pcs: "Please enter valid value.",
                durability_of_edge_min1: "Please enter valid value.",
                durability_of_edge_min2: "Please enter valid value.",
                machine_time1: "Please enter valid value.",
                machine_time2: "Please enter valid value.",
                // tool1: "Please enter valid value.",
                // tool2: "Please enter valid value.",
                tool_cost1: "Please enter valid value.",
                tool_cost2: "Please enter valid value",
                no_of_inserts1: "Please enter valid value",
                no_of_inserts2: "Please enter valid value",
                // cutting_index_insert1: "Please insert valid value",
                // cutting_index_insert2: "Please insert valid value",
                // grade1: "Please insert valid value",
                // grade2: "Please insert valid value",
                insert_of_cost1: "Please insert valid value",
                insert_of_cost2: "Please insert valid value",
                no_of_cutting_edges1: "Please insert valid value",
                no_of_cutting_edges2: "Please insert valid value",
                total_cost_cn1: "Please insert valid value",
                total_cost_cn2: "Please insert valid value",
                tool_exchange_cost1: "Please insert valid value",
                tool_exchange_cost2: "Please insert valid value",
                machining_cost1: "Please insert valid value",
                machining_cost2: "Please insert valid value",
                total_cost1: "Please insert valid value",
                total_cost2: "Please insert valid value",
                durability_of_edge1: "Please insert valid value",
                durability_of_edge2: "Please insert valid value",
                grade1: "Please insert valid value",
                grade2: "Please insert valid value",
                q1: "Please enter valid value",
                q2: "Please enter valid value"
            },


            submitHandler: function (form) {
                form.submit();
            }
        });
    });
</script>

<script src="//code.jquery.com/jquery-1.9.1.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
</head>


<div class="container">
    <form id='create_trial_report_form' action="create.php" method="post" novalidate="novalidate"
          enctype="multipart/form-data">
        <div class="panel panel-danger text-center">

            <div class="panel-heading">
                <h3 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                        <b>Trial Report</b></a>
            </div>

            <div id="collapse1" class="panel-collapse collapse in">
                <div class="panel-body">

                    <table class='table table-hover table-responsive '>
                        <tr>
                            <td>Customer</td>
                            <td>
                                <input type="text" placeholder="" name="customer" class="form-control">

                            </td>


                            <td>Engineer Name</td>
                            <td>
                                <input type="text" placeholder="" name="name" class="form-control"></td>

                            <td>Place of Test</td>
                            <td>
                                <input type="text" placeholder="" name="place" class="form-control">
                            </td>
                        </tr>


                        <tr>
                            <td>Date</td>
                            <td><i class="icon-date"></i>
                                <input type="date" name="date" class="form-control" placeholder="Date" id="report_date"/></td>
                            <td>Technology</td>
                            <td><select required class="form-control btn-primary dropdown-toggle" name="technology">
                                    <option value="Select">Select</option>
                                    <option value="S">Turning</option>
                                    <option value="F">Milling</option>
                                    <option value="V">Drilling</option>
                                    <option value="Y">Boring</option>
                                    <option value="U">Parting Off</option>
                                    <option value="Z">Grooving</option>
                                    <option value="T">Scarfing</option>
                                </select></td>
                            <td></td>
                            <td></td>
                        </tr>

                    </table>
                </div>
            </div>


            <!--Machined Part-->
            <div class="panel-heading">
                <h3 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">

                        <b>Machined Part</b></a>
            </div>

            <div id="collapse2" class="panel-collapse collapse in">

                <div class="panel-body">

                    <table class='table table-hover table-responsive '>
                        <tr>
                            <td>Type</td>
                            <td><input type="text" class="form-control" name="type" placeholder=""></td>
                            <td>Load</td>
                            <td><input type="text" class="form-control" name="load" placeholder=""></td>
                            <td>Techn Condition</td>
                            <td><input type="text" class="form-control" name="techn_conditions" placeholder=""></td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td><input type="text" class="form-control" name="name_mp" placeholder=""></td>

                            <td>Requested Roughness</td>
                            <td>
                                <select required class="form-control btn-primary dropdown-toggle"
                                        name="requested_roughness">

                                    <option value="Select">Select</option>
                                    <option value="0.1 Ra">0.1 Ra</option>
                                    <option value="0.2 Ra">0.2 Ra</option>
                                    <option value="0.4 Ra">0.4 Ra</option>
                                    <option value="0.8 Ra">0.8 Ra</option>
                                    <option value="1.6 Ra">1.6 Ra</option>
                                    <option value="3.2 Ra">3.2 Ra</option>
                                    <option value="6.3 Ra">6.3 Ra</option>
                                    <option value="12.5 Ra">12.5 Ra</option>
                                    <option value="25 Ra">25 Ra</option>
                                    <option value="50 Ra">50 Ra</option>
                                    <option value="100 Ra">100 Ra</option>
                                    <option value="Not Applicable">Not Applicable</option>
                                </select>
                            </td>

                            <td>Workpiece Mat</td>
                            <td><input type="text" class="form-control" name="workpiece" placeholder=""></td>
                        </tr>
                        <tr>
                            <td>Group</td>
                            <td>
                                <select required class="form-control btn-primary dropdown-toggle" name="group">
                                    <option value="Select">Select</option>
                                    <option value="P">P</option>
                                    <option value="M">M</option>
                                    <option value="K">K</option>
                                    <option value="N">N</option>
                                    <option value="S">S</option>
                                    <option value="H">H</option>
                                </select>
                            </td>
                            <td>Strength [Mpa]</td>
                            <td><input type="text" class="form-control" name="strength" placeholder=""></td>
                            <td>Hardnerned HB</td>
                            <td><input type="text" class="form-control" name="hardness_hb" placeholder=""></td>
                        </tr>

                        <tr>
                            <td>Hardnerned HRC</td>
                            <td><input type="text" class="form-control" name="hardness_hrc" placeholder=""></td>

                        </tr>
                    </table>
                </div>
            </div>


            <!--Tool-->
            <div class="panel-heading">
                <h3 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                        <b>Tool</b></a>
                </h3>
            </div>
            <div id="collapse3" class="panel-collapse collapse in">
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
                                    <div class="col-md-1"> <input type="text" id="c" name="c" class="form-control"></div>
                                    <div class="col-md-1"> <input type="text" id="mn" name="mn" class="form-control"></div>
                                    <div class="col-md-1"> <input type="text" id="si" name="si" class="form-control"></div>
                                    <div class="col-md-1"> <input type="text" id="cr" name="cr" class="form-control"></div>
                                    <div class="col-md-1"> <input type="text" id="ni" name="ni" class="form-control"></div>
                                    <div class="col-md-1"> <input type="text" id="v" name="v" class="form-control"></div>
                                    <div class="col-md-1"> <input type="text" id="mo" name="mo" class="form-control"></div>
                                    <div class="col-md-1"> <input type="text" id="w" name="w" class="form-control"></div>
                                    <div class="col-md-1"> <input type="text" id="co" name="co" class="form-control"></div>
                                    <div class="col-md-1"> <input type="text" id="ti" name="ti" class="form-control"></div>
                                    <div class="col-md-1"> <input type="text" id="fe" name="fe" class="form-control"></div>
                                    <div class="col-md-1"> <input type="text" id="al" name="al" class="form-control"></div>
                                </div>
                            </td>
                        </tr>
                    </table>

                    <table class='table table-hover table-responsive'>
                        <tr>
                            <td>Brand/Make</td>
                            <td><input type="text" class="form-control" name="producer1" placeholder=""></td>
                            <td></td>
                            <td><input type="text" class="form-control" name="producer2" placeholder=""></td>
                            <td></td>
                        </tr>
                        <tr>

                            <!--<td>Description</td>-->
                            <td>Tool Code</td>
                            <td><input type="text" class="form-control" name="description1" placeholder=""></td>
                            <td></td>
                            <td><input type="text" class="form-control" name="description2" placeholder=""></td>
                            <td></td>
                        </tr>
                        <tr>
                            <!--<td>Cutting Index Insert(1)</td>-->
                            <td>Index Code</td>
                            <td><input type="text" class="form-control" id="cutting_index_insert1"
                                       name="cutting_index_insert1" placeholder=""></td>
                            <td></td>
                            <td><input type="text" class="form-control" id="cutting_index_insert2"
                                       name="cutting_index_insert2" placeholder=""></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Chip Breaker</td>
                            <td>
                                <input type="text" class="form-control btn-primary" name="chip_breaker1"
                                       id="chip_breaker1"
                                       required>
                                </input>

                            </td>
                            <td></td>
                            <td><input type="text" class="form-control btn-primary" name="chip_breaker2"
                                       id="chip_breaker1"
                                       required>
                                </input></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Grade</td>
                            <td>
                                <input type="text" class="form-control btn-primary" name="grade1" id="grade1" required>
                                </input>

                            </td>
                            <td></td>
                            <td>
                                <input type="text" class="form-control btn-primary" name="grade2" id="grade2" required>

                                </input>

                            </td>
                            <td></td>
                        </tr>


                    </table>
                </div>
            </div>


            <!--Cutting Conditions-->
            <div class="panel-heading">
                <h3 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                        <b>Cutting Conditions</b></a>
                </h3>
            </div>
            <div id="collapse4" class="panel-collapse collapse in">
                <div class="panel-body">

                    <table class='table table-hover table-responsive '>
                        <tr>

                            <td>Cutting Speed (Vc)</td> <!-- saves in table ilptcrm_tool Start-->
                            <td><input type="text" class="form-control"
                                       name="cutting_speed1" placeholder=""></td>
                            <td>m/min</td>
                            <td><input type="text" class="form-control"
                                       name="cutting_speed2" placeholder=""></td>
                            <td>m/min</td>
                        </tr>

                        <tr>
                            <td>Revolution RPM (n)</td>
                            <td><input type="text" class="form-control"
                                       name="revolution_rpm1" placeholder=""></td>
                            <td>rev/min</td>
                            <td><input type="text" class="form-control"
                                       name="revolution_rpm2" placeholder=""></td>
                            <td>rev/min</td>
                        </tr>

                        <tr>
                            <td>Feed Rev (Fn)</td>
                            <td><input type="text" class="form-control" id="feed_rev1"
                                       name="feed_rev1" placeholder=""></td>
                            <td>mm/min</td>
                            <td><input type="text" class="form-control" id="feed_rev2"
                                       name="feed_rev2" placeholder=""></td>
                            <td>mm/min</td>
                        </tr>

                        <tr>
                            <td>Feed Tooth (Fz)</td>
                            <td><input type="text" class="form-control" id="feed_tooth1"
                                       name="feed_tooth1" placeholder=""></td>
                            <td>mm/tooth</td>
                            <td><input type="text" class="form-control" id="feed_tooth2"
                                       name="feed_tooth2" placeholder=""></td>
                            <td>mm/tooth</td>
                        </tr>

                        <tr>
                            <td>Feed Min (Vf)</td> <!--saves in table ilptcrm_tool end-->
                            <td><input type="text" class="form-control" id="feed_min1"
                                       name="feed_min1" placeholder=""></td>
                            <td>mm/min</td>
                            <td><input type="text" class="form-control" id="feed_min2"
                                       name="feed_min2" placeholder=""></td>
                            <td>mm/min</td>
                        </tr>


                        <tr>
                            <td>Cutting Depth [ap]</td>
                            <td><input type="text" class="form-control" name="cutting_depth1" id="cutting_depth1"
                                       placeholder=""></td>
                            <td>m/min</td>
                            <td><input type="text" class="form-control" name="cutting_depth2" id="cutting_depth2"
                                       placeholder=""></td>
                            <td>m/min</td>
                        </tr>

                        <tr>
                            <td>Cutting Width [ae]</td>
                            <td><input type="text" class="form-control" name="cutting_width1" id="cutting_width1"
                                       placeholder=""></td>
                            <td>m/min</td>
                            <td><input type="text" class="form-control" name="cutting_width2" id="cutting_width2"
                                       placeholder=""></td>
                            <td>m/min</td>
                        </tr>

                        <tr>
                            <td>Machined Surface Width</td>
                            <td><input type="text" class="form-control" id="machine_surface_width1"
                                       name="machine_surface_width1" placeholder=""></td>
                            <td>m/min</td>
                            <td><input type="text" class="form-control" id="machine_surface_width2"
                                       name="machine_surface_width2" placeholder=""></td>
                            <td>m/min</td>
                        </tr>

                        <tr>
                            <td>Thread Pitch</td>
                            <td><input type="text" class="form-control" id="thread_pitch1"
                                       name="thread_pitch1" placeholder=""></td>
                            <td>m/min</td>
                            <td><input type="text" class="form-control" id="thread_pitch2"
                                       name="thread_pitch2" placeholder=""></td>
                            <td>m/min</td>
                        </tr>

                        <tr>
                            <td>Number of infeed</td>
                            <td><input type="text" class="form-control" id="number_of_infeed1"
                                       name="number_of_infeed1" placeholder=""></td>
                            <td>m/min</td>
                            <td><input type="text" class="form-control" id="number_of_infeed2"
                                       name="number_of_infeed2" placeholder=""></td>
                            <td>m/min</td>
                        </tr>

                        <tr>
                            <td>Cutting length [mm] (L)</td>
                            <td><input type="text" class="form-control" id="cutting_length1"
                                       name="cutting_length1" placeholder=""></td>
                            <td>m/min</td>
                            <td><input type="text" class="form-control" id="cutting_length2"
                                       name="cutting_length2" placeholder=""></td>
                            <td>m/min</td>
                        </tr>

                        <tr>
                            <td>Depth Of Grooving [mm]</td>
                            <td><input type="text" class="form-control" id="depth_of_grooving1"
                                       name="depth_of_grooving1" placeholder=""></td>
                            <td>mm</td>
                            <td><input type="text" class="form-control" id="depth_of_grooving2"
                                       name="depth_of_grooving2" placeholder=""></td>
                            <td>mm</td>
                        </tr>

                        <tr>
                            <td>Surface Skin [Y/N]</td>
                            <td><select required class="form-control btn-primary"
                                        name="surface_skin1" required>
                                    <option value="">Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select></td>
                            <td>Surface Skin [Y/N]</td>
                            <td><select required class="form-control btn-primary"
                                        name="surface_skin2" required>
                                    <option value="">Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>Interrupted Cut [Y/N]</td>
                            <td><select required class="form-control btn-primary "
                                        name="interrupted_cut1" required>
                                    <option value="">Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select></td>
                            <td>Interrupted Cut [Y/N]</td>
                            <td><select required class="form-control btn-primary "
                                        name="interrupted_cut2" required>
                                    <option value="">Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>Coolant [Y/N]</td>
                            <td><select required class="form-control btn-primary "
                                        name="coolant1" required>
                                    <option value="">Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select></td>
                            <td>Coolant [Y/N]</td>
                            <td><select required class="form-control btn-primary"
                                        name="coolant2" required>
                                    <option value="">Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>Surface Quality</td>
                            <td><select required class="form-control btn-primary"
                                        name="surface_quality1" required>
                                    <option value="Select">Select</option>
                                    <option value="1 Rz">1 Rz</option>
                                    <option value="2,5 Rz">2,5 Rz</option>
                                    <option value="4 Rz">4 Rz</option>
                                    <option value="6,3 Rz">6,3 Rz</option>
                                    <option value="10 Rz">10 Rz</option>
                                    <option value="16 Rz">16 Rz</option>
                                    <option value="25 Rz">40 Rz</option>
                                    <option value="1 Rz">63 Rz</option>
                                    <option value="1 Rz">100 Rz</option>
                                    <option value="1 Rz">160 Rz</option>
                                    <option value="1 Rz">250 Rz</option>
                                    <option value="1 Rz">160 Rz</option>
                                    <option value="Ok">Ok</option>
                                </select></td>
                            <td>Rz</td>
                            <td><select required class="form-control btn-primary "
                                        name="surface_quality2" required>
                                    <option value="Select">Select</option>
                                    <option value="1 Rz">1 Rz</option>
                                    <option value="2,5 Rz">2,5 Rz</option>
                                    <option value="4 Rz">4 Rz</option>
                                    <option value="6,3 Rz">6,3 Rz</option>
                                    <option value="10 Rz">10 Rz</option>
                                    <option value="16 Rz">16 Rz</option>
                                    <option value="25 Rz">40 Rz</option>
                                    <option value="1 Rz">63 Rz</option>
                                    <option value="1 Rz">100 Rz</option>
                                    <option value="1 Rz">160 Rz</option>
                                    <option value="1 Rz">250 Rz</option>
                                    <option value="1 Rz">160 Rz</option>
                                    <option value="Ok">Ok</option>
                                </select></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                Q1
                            </td>
                            <td>
                                <input type="text" class="form-control"  id="q1" readonly class = "success"
                                       name="q1" placeholder="">
                            </td>
                            <td>
                                Q2
                            </td>
                            <td>
                                <input type="text" class="form-control" id="q2" readonly class = "success"
                                       name="q2" placeholder="">
                            </td>
                        </tr>

                    </table>

                </div>
            </div>


            <!--Evaluation-->
            <div class="panel-heading">
                <h3 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                        <b>Evaluation</b></a>
                </h3>
            </div>
            <div id="collapse5" class="panel-collapse collapse in">
                <div class="panel-body">
                    <table class='table table-hover table-responsive '>
                        <tr>
                            <td>Durability Of Edge [Min] Tmin</td>
                            <td><input type="text" class="form-control" id="durability_of_edge1"
                                       name="durability_of_edge1" placeholder=""></td>
                            <td>Mn</td>
                            <td><input type="text" class="form-control" id="durability_of_edge2"
                                       name="durability_of_edge2" placeholder=""></td>
                            <td>m/min</td>
                        </tr>

                        <tr>
                            <td>Durability [Pcs]Tpcs</td>
                            <td><input type="text" class="form-control" id="durability_pcs1"
                                       name="durability_pcs1" placeholder=""></td>
                            <td>Pcs</td>
                            <td><input type="text" class="form-control" name="durability_pcs2"
                                       name="durability_pcs2" placeholder=""></td>
                            <td>Pcs</td>
                        </tr>


                        <tr>
                            <td>Flank Wear [Mm]VB</td>
                            <td><input type="text" class="form-control"
                                       name="flank_wear1" placeholder=""></td>
                            <td></td>
                            <td><input type="text" class="form-control"
                                       name="flank_wear2" placeholder=""></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>Insert Fracture-Fragile [Y/N]</td>
                            <td><select required class="form-control btn-primary "
                                        name="insert_fracture_fragile1" required>
                                    <option value="">Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select></td>
                            <td></td>
                            <td><select required class="form-control btn-primary "
                                        name="insert_fracture_fragile2" required>
                                    <option value="">Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select></td>
                            <td></td>
                        </tr>


                        <tr>
                            <td>Built-Up Edge [Y/N]</td>
                            <td><select required class="form-control btn-primary"
                                        name="built_up_edge1" required>
                                    <option value="">Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select></td>
                            <td></td>
                            <td><select required class="form-control btn-primary "
                                        name="built_up_edge2" required>
                                    <option value="">Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>Nose Tip Plastic Deformation [Y/N]</td>
                            <td><select required class="form-control btn-primary "
                                        name="nose_tip_plastic_deformation1" required>
                                    <option value="">Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select></td>
                            <td></td>
                            <td><select required class="form-control btn-primary "
                                        name="nose_tip_plastic_deformation2" required>
                                    <option value="">Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select></td>
                            <td></td>
                        </tr>

                        <tr>
                            <!--#ZV$B3K##A-->
                            <td>Kind Of Chip [Y/N]</td>
                            <td><select required class="form-control btn-primary "
                                        name="kind_of_chip1" required>
                                    <option value="">Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select></td>
                            <td></td>
                            <td><select required class="form-control btn-primary "
                                        name="kind_of_chip2" required>
                                    <option value="">Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Rigidity Of System Machine-Part-Tool [Y/N]</td>
                            <td><select required class="form-control btn-primary "
                                        name="rigidity_of_system1" required>
                                    <option value="">Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select></td>
                            <td></td>
                            <td><select required class="form-control btn-primary"
                                        name="rigidity_of_system2" required>
                                    <option value="">Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>


            <!--Evaluation Notes Successful Stories-->
            <div class="panel-heading">
                <h3 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="collapse6">
                        <b>Evaluation Notes Successful Stories</b></a>
                </h3>
            </div>

            <div id="collapse6" class="panel-collapse collapse in">
                <div class="panel-body">
                    <table class='table table-hover table-responsive'>
                        <tr>
                            <td>Successful Stories</td>
                            <td>

                                <select required name="successful_stories" class="form-control btn-primary">
                                    <option value="Select">Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>

                            </td>

                            <td>Technical evaluation of test</td>
                            <td>
                                <div style="margin-bottom: 0px;">
                                    <select required name="technical_evaluation" class="form-control btn-primary ">
                                        <option value="">Select</option>
                                        <option value="N">N-Unsuccessful</option>
                                        <option value="OK">OK-Successful</option>
                                        <option value="W">W-Without a Conclusion</option>
                                        <option value="I">I-Identical Result</option>
                                    </select>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Attachment</td>
                            <td>
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <span class="form-control btn-primary btn-file"><span
                                            class="fileupload-new">Select file</span>
                                        <span class="fileupload-exists">Change</span>
                                        <input id="uploadImage" type="file" name="attachment"/>
                                    </span>
                                    <span class="fileupload-preview"></span>
                                    <a href="#" class="close fileupload-exists" data-dismiss="fileupload"
                                       style="float: none">×</a>
                                </div>
                            </td>
                            <td>Included Test </td>
                            <td>
                                    <select required class="form-control btn-primary dropdown-toggle"
                                            name="included_test_to_the_general_evaluation">
                                        <option value="">Select</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                            </td>

                        </tr>

                        <tr>
                            <td>Notes</td>
                            <td colspan="4">
                                <div>
                                    <textarea name="notes" class="form-control" rows="8" id="notes"></textarea>
                                </div>
                            </td>
                        </tr>

                    </table>
                </div>

            </div>


            <!-- Spending Last Section-->
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">
                        <b>Spending on cutting operation (depending on machine conditions)</b></a>
                </h4>
            </div>

            <div id="collapse7" class="panel-collapse collapse in">
                <div class="panel-body">
                    <br>
                    <div>

                        <table class='table table-hover table-responsive'>
                            <tr>
                                <td colspan="3">Existing I</td>
                                <td colspan="3">Trial Report II</td>
                            </tr>

                            <tr class="info">
                                <td>Cost per Hour</td>
                                <td><input type="text" class="form-control" placeholder="" name="cost_per_hour1"
                                           value=""/>
                                </td>
                                <td>Curr/hour : No Of Workpcs</td>
                                <td><input type="text" class="form-control" placeholder="" name="cost_per_hour2"/>
                                </td>
                                <td>pcs.</td>

                            </tr>

                            <tr>
                                <td>Durability of edge [min]</td>
                                <td><input type="text" class="form-control" placeholder="" id="durability_of_edge11"
                                           readonly
                                           value='<?php echo htmlspecialchars($trial_report->durability_of_edge1, ENT_QUOTES); ?>'>
                                </td>
                                <td>min.</td>
                                <td><input type="text" class="form-control" placeholder="" readonly
                                           id="durability_of_edge21"
                                           value='<?php echo htmlspecialchars($trial_report->durability_of_edge2, ENT_QUOTES); ?>'>
                                </td>
                                <td>min.</td>
                            </tr>


                            <tr>
                                <td>Durability [pcs]</td>
                                <td><input type="text" class="form-control" placeholder="" name="durability_pcs1"
                                           readonly id="durability_pcs11"
                                           value='<?php echo htmlspecialchars($trial_report->durability_pcs1, ENT_QUOTES); ?>'>
                                </td>
                                <td>min.</td>
                                <td><input type="text" class="form-control" placeholder="" name="durability_pcs2"
                                           readonly id="durability_pcs21"
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
                                <td><input type="text" class="form-control" placeholder=""
                                           name="cutting_index_insert1"
                                           value='<?php echo htmlspecialchars($trial_report->cutting_index_insert1, ENT_QUOTES); ?>'/>
                                </td>
                                <td>pcs</td>
                                <td><input type="text" class="form-control" placeholder=""
                                           name="cutting_index_insert2"
                                           value='<?php echo htmlspecialchars($trial_report->cutting_index_insert2, ENT_QUOTES); ?>'/>
                                </td>
                                <td>pcs</td>
                            </tr>
                            <tr>
                                <td>Grade</td>
                                <td><input type="text" class="form-control" placeholder="" name="grade1" readonly
                                           id="grade11"
                                           value='<?php echo htmlspecialchars($trial_report->grade1, ENT_QUOTES); ?>'/>
                                </td>
                                <td>&nbsp;</td>
                                <td><input type="text" class="form-control" placeholder="" name="grade2" readonly
                                           id="grade21"
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
                                <td><input type="text" class="form-control" placeholder="" name="tool_cost_cn1" disabled
                                           value='<?php echo htmlspecialchars($trial_report->tool_cost_cn1, ENT_QUOTES); ?>'/>
                                </td>
                                <td>curr/pcs</td>
                                <td><input type="text" class="form-control" placeholder="" name="tool_cost_cn2" disabled
                                           value='<?php echo htmlspecialchars($trial_report->tool_cost_cn2, ENT_QUOTES); ?>'/>
                                </td>
                                <td>curr/pcs.</td>
                            </tr>
                            <tr>
                                <td>Tool exchange cost <b>C<sub>V</sub></b></td>
                                <td><input type="text" class="form-control" placeholder="" name="tool_exchange_cost1"
                                           disabled
                                           value='<?php echo htmlspecialchars($trial_report->tool_exchange_cost1, ENT_QUOTES); ?>'/>
                                </td>
                                <td>curr/pcs</td>
                                <td><input type="text" class="form-control" placeholder="" name="tool_exchange_cost2"
                                           disabled
                                           value='<?php echo htmlspecialchars($trial_report->tool_exchange_cost2, ENT_QUOTES); ?>'/>
                                </td>
                                <td>curr/pcs</td>
                            </tr>
                            <tr>
                                <td>Machining cost <b>C<sub>M</sub></b></td>
                                <td><input type="text" class="form-control" placeholder="" name="machining_cost1"
                                           disabled
                                           value='<?php echo htmlspecialchars($trial_report->machining_cost1, ENT_QUOTES); ?>'/>
                                </td>
                                <td>curr/pcs</td>
                                <td><input type="text" class="form-control" placeholder="" name="machining_cost2"
                                           disabled
                                           value='<?php echo htmlspecialchars($trial_report->machining_cost2, ENT_QUOTES); ?>'/>
                                </td>
                                <td>curr/pcs</td>
                            </tr>


                            <tr>
                                <td>Total Cost C</td>
                                <td><input type="text" class="form-control" placeholder="" name="total_cost1" disabled
                                           value='<?php echo htmlspecialchars($trial_report->total_cost1, ENT_QUOTES); ?>'/>
                                </td>
                                <td>curr./pcs.</td>
                                <td><input type="text" class="form-control" placeholder="" name="total_cost2" disabled
                                           value='<?php echo htmlspecialchars($trial_report->total_cost2, ENT_QUOTES); ?>'/>
                                </td>
                                <td>curr./pcs.</td>
                            </tr>


                            <tr>
                                <td colspan="6">
                                    <button type="submit" id='create_submit' class='btn btn-danger'>
                                        <span class='glyphicon glyphicon-danger'></span> Create Trial report
                                    </button>

                                </td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
    </form>
</div>

</body>
</html>