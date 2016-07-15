<?php
// get target id
$target_id=isset($_GET['target_id']) ? $_GET['target_id'] : die('ERROR: target ID not found.');

// include database and object files
ini_set('display_errors', 'On');
// include database and object files
include_once '../config/database.php';
include_once '../objects/target.php';


// instantiate database and user object
$database = new Database();
$db = $database->getConnection();

// initialize object
$target = new Target($db);

// set client id property
$target->id = $target_id;

// read single target
$target->readOne();
?>
<!--we have our html form here where new client information will be entered-->
<form id='update-product-form' action='#' method='post' border='0'>
    <table class='table table-bordered table-hover'>
        <tr>
            <td>Client</td>
            <td><input type='text' name='client' class='form-control' value='<?php echo htmlspecialchars($target->client, ENT_QUOTES); ?>' required /></td>
        </tr>
        <tr>
            <td>year</td>
            <td>
                <input type='text' name='year' class='form-control' value='<?php echo htmlspecialchars($target->year, ENT_QUOTES); ?>' required />
            </td>

        </tr>
        <tr>
            <td>Month</td>
            <td><input type='text'  name='month' class='form-control' value='<?php echo htmlspecialchars($target->month, ENT_QUOTES);  ?>' required /></td>
        </tr>
        <tr>
        <tr>
            <td>Value</td>
            <td>
                <input type='text' name='target' class='form-control' value='<?php echo htmlspecialchars($target->target, ENT_QUOTES); ?>' required />
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
            <input type='hidden' name='id' value='<?php echo $target_id ?>' />
        </td>
        <td>
            <button type='submit' class='btn btn-primary'>
                <span class='glyphicon glyphicon-edit'></span> Save Changes
            </button>
        </td>
        </tr>
    </table>
</form>