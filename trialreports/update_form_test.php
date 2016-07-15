<?php
// get trial_report id
$trial_report_id=isset($_GET['trial_report_id']) ? $_GET['trial_report_id'] : die('ERROR: Trial Report ID not found.');

// include database and object files
ini_set('display_errors', 'On');
// include database and object files
include_once '../config/database.php';
include_once '../objects/client.php';


// instantiate database and user object
$database = new Database();
$db = $database->getConnection();

// initialize object
$trial_report = new Trialreport($db);

// set client id property
$trial_report->id=$trial_report_id;

// read single client

$trial_report->readOne();
?>
<!--we have our html form here where new client information will be entered-->
<form id='update-product-form' action='#' method='post' border='0'>
    <table class='table table-bordered table-hover'>
        <tr>
                    <td>Client</td>
            <td><input type='text' name='client_name' class='form-control' value='<?php echo htmlspecialchars($trial_report->client_name, ENT_QUOTES); ?>' required /></td>
        </tr>
        <tr>
            <td>Location</td>
            <td>
                <input type='text' name='location' class='form-control' value='<?php echo htmlspecialchars($trial_report->location, ENT_QUOTES); ?>' required />
            </td>

        </tr>
        <tr>
            <td>Address</td>
            <td><input type='text' min='6' name='address' class='form-control' value='<?php echo htmlspecialchars($trial_report->address, ENT_QUOTES);  ?>' required /></td>
        </tr>
        <tr>
        <tr>
            <td>Phone No.</td>
            <td>
                <input type='text' name='phone_no' class='form-control' value='<?php echo htmlspecialchars($trial_report->phone_no, ENT_QUOTES); ?>' required />
            </td>

        </tr>
<!--        <tr>-->
<!--            <td>Rights</td>-->
<!--            <td>-->
<!--                <input type='text' name='rights' class='form-control' value='--><?php //echo htmlspecialchars($client->rights, ENT_QUOTES); ?><!--' required />-->
<!--            </td>-->
<!---->
<!--        </tr>-->
        <td>
            <!-- hidden ID field so that we could identify what record is to be updated -->
            <input type='hidden' name='id' value='<?php echo $client_id ?>' />
        </td>
        <td>
            <button type='submit' class='btn btn-primary'>
                <span class='glyphicon glyphicon-edit'></span> Save Changes
            </button>
        </td>
        </tr>
    </table>
</form>