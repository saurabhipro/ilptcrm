<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>ILPT CRM</title>
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>

<body>

<?php require("header.php") ?>

<div id="wrapper">
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-lg-12">
                    <br><br>
                    <h2>ILPT CRM DASHBOARD</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="alert alert-info">
                        
                        <strong>Welcome <?php echo $_SESSION['username']; ?>(<?php echo $_SESSION['role']; ?>
                            )! </strong> You Have No pending Task For Today.

                    </div>

                </div>
            </div>

            <div class="row text-center pad-top">
            </div>

            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="/ilptcrm_design/masters/user/list_users.php">
                        <i class="fa fa-users fa-5x"></i>
                        <h4>Users</h4>
                    </a>
                </div>


            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="/ilptcrm_design/masters/client/list_clients.php">
                        <i class="fa fa-user fa-5x"></i>
                        <h4>Client</h4>
                    </a>
                </div>


            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="/ilptcrm_design/trialreports/list_trial_report.php">
                        <i class="fa fa-clipboard fa-5x"></i>
                        <h4>Trial Report </h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="/ilptcrm_design/sales/list_sale.php">
                        <i class="fa fa-cube fa-5x"></i>
                        <h4>Sales </h4>
                    </a>
                </div>
            </div>

            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="/ilptcrm_design/target/list_target.php">
                        <i class="fa fa-codepen fa-5x"></i>
                        <h4>Target</h4>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
    </div>
</div>
</div>
</div>
</div>
<script src="assets/js/jquery-1.10.2.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>

<html>
<head></head>
<body></body>
</html>