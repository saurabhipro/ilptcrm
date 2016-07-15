<?php
// get client id
$sale_id=isset($_GET['sale_id']) ? $_GET['sale_id'] : die('ERROR: sale ID not found.');

// include database and object files
ini_set('display_errors', 'On');
// include database and object files
include_once '../config/database.php';
include_once '../objects/sale.php';


// instantiate database and user object
$database = new Database();
$db = $database->getConnection();

// initialize object
$sale = new Sale($db);

// set client id property
$sale->id = $sale_id;

// read single client
$sale->readOne();
?>
<!--we have our html form here where new client information will be entered-->
<form id='update-product-form' action='#' method='post' border='0'>
    <table style="width:70%;margin:auto;" class='table table-bordered table-hover'>
        <tr>
            <td>Client</td>
            <td><input style="width:100%;" type='text' name='client' class='form-control' value='<?php echo htmlspecialchars($sale->client, ENT_QUOTES); ?>' required /></td>
        </tr>
        <tr>
            <td>year</td>
            <td>
                <input style="width:100%;" type='text' name='year' class='form-control' value='<?php echo htmlspecialchars($sale->year, ENT_QUOTES); ?>' required />
            </td>

        </tr>
        <tr>
            <td>Month</td>
            <td><input style="width:100%;" type='text' min='6' name='month' class='form-control' value='<?php echo htmlspecialchars($sale->month, ENT_QUOTES);  ?>' required /></td>
        </tr>
        <tr>
        <tr>
            <td>Value</td>
            <td>
                <input style="width:100%;" type='text' name='value_s' class='form-control' value='<?php echo htmlspecialchars($sale->value_s, ENT_QUOTES); ?>' required />
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
            <input type='hidden' name='id' value='<?php echo $sale_id ?>' />
        </td>
        <td>
            <button type='submit' class='btn btn-primary'>
                <span class='glyphicon glyphicon-edit'></span> Save Changes
            </button>
        </td>
        </tr>
    </table>
</form>