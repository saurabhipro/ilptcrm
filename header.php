
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>

    <link  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.css"/>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <script type="text/javascript" src="../fusioncharts/js/fusioncharts.js"></script>
    <script type="text/javascript" src="../fusioncharts/js/themes/fusioncharts.theme.fint.js"></script>
    <script type="text/javascript"  src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
    <script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.js"></script>



    <style type="text/css">

        body {
            background-color: hsla(236, 44%, 46%, 0.3);
            margin: 10px;
            padding: 10px;
        }

    </style>

    <script type="text/javascript">window.history.forward();
        function noBack() {
            window.history.forward();
        }</script>
</head>


<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/ilptcrm_design/dashboard.php">ILPT</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">


                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Master<span class="caret"></span></a>
                    <ul class="dropdown-menu">

                     <li><a href="/ilptcrm_design/masters/user/list_users.php">User</a></li>
                     <li><a href="/ilptcrm_design/masters/client/list_clients.php">Client</a></li>
                    <li><a href="/ilptcrm_design/masters/datalist/list_datalist.php">Data Lists</a></li> 
                   

                    

                  
                    </ul>
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Sales<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/ilptcrm_design/sales/list_sale.php">Sales</a></li>
                        <li><a href="/ilptcrm_design/sales/sales_excel_download_form.php">Sales Report</a></li>
                        <li><a href="/ilptcrm_design/target/list_target.php">Target</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Trial Reports<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/ilptcrm_design/trialreports/list_trial_report.php">Trial Report</a></li>
                        <li><a href="/ilptcrm_design/trialreports/create_trial_report_form.php">Create Report</a></li>


                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!--                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>-->
                <li><a href="/ilptcrm_design/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br><br>

