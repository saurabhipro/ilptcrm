<?php
// get product id
$datalist_id=isset($_GET['datalist_id']) ? $_GET['datalist_id'] : die('ERROR: Data List ID not found.');
 
// include database and object files
ini_set('display_errors', 'On');
// include database and object files
include_once '../../config/database.php';
include_once '../../objects/datalist.php';

 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$datalist = new Datalist($db);
 
// set product id property
$datalist->id=$datalist_id;
 
// read single product
$datalist->readOne();
?>
<!--we have our html form here where new product information will be entered-->
<form id='update-product-form' action='#' method='post' border='0'>
    <table class='table table-bordered table-hover'>
        <tr>
            <td>Parameter Name</td>
            <td><input type='text' name='parameter_name' class='form-control' value='<?php echo htmlspecialchars($datalist->parameter_name, ENT_QUOTES); ?>' required /></td>
        </tr>
        <tr>
            <td>Parameter Value</td>
            <td><input type='text' name='parameter_value' class='form-control' value='<?php echo htmlspecialchars($datalist->parameter_value, ENT_QUOTES); ?>' required /></td>
        </tr>
         <!-- <tr>
            <td>Location</td>
            <td><input type='text' name='location' class='form-control' value=''<?php// echo htmlspecialchars($product->location, ENT_QUOTES); ?>' required /></td>
        </tr> -->
       <!--  <tr>
            <td>Location</td>
            <td>
            <textarea name='location' class='form-control' value='<?php 
            //echo htmlspecialchars($product->location, ENT_QUOTES); ?>' required />
            </textarea>
            </td>
        </tr> -->
        <tr>
            <td>Parameter Unit</td>
            <td><input type='text' name='parameter_unit' class='form-control' value='<?php echo htmlspecialchars($datalist->parameter_unit, ENT_QUOTES);  ?>' required /></td>
        </tr>
      

        <tr>
            <td>
                <!-- hidden ID field so that we could identify what record is to be updated -->
                <input type='hidden' name='id' value='<?php echo $datalist_id ?>' />
            </td>
            <td>
                <button type='submit' class='btn btn-primary'>
                    <span class='glyphicon glyphicon-edit'></span> Save Changes
                </button>
            </td>
        </tr>
    </table>
</form>