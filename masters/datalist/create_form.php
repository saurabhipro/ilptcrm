<!--
    -we have our html form here where product information will be entered
    -we used the 'required' html5 property to prevent empty fields
-->
<form id='create-product-form' action='#' method='post' border='0'>
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Parameter Name</td>
            <td><input type='text' name='parameter_name' class='form-control' required /></td>
        </tr>
        <tr>
            <td>Parameter Value</td>
            <td><input type='text' name='parameter_value' class='form-control' required /></td>
        </tr>

        <tr>
            <td>Parameter Unit</td>
            <td><input type='text'  name='parameter_value' class='form-control' required /></td>
        </tr>

        <tr>
            <td></td>
            <td>                
                <button type='submit' class='btn btn-primary'>
            <span class='glyphicon glyphicon-plus'></span> Create Data list
        </button>
            </td>
        </tr>
    </table>
</form>