<!--
    -we have our html form here where product information will be entered
    -we used the 'required' html5 property to prevent empty fields
-->


<form id='create-user-form' action='#' method='post' border='0'>
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Clients</td>
            <td>

                <select name="client" id = "client" class="form-control btn-primary">
                    <?php
                    include '../config/database.php';
                   
                    $query = "SELECT id,client_name FROM ilptcrm_client";
                    $data = $odb->prepare($query);    // Prepare query for execution
                    $data->execute();// Execute (run) the query
                    echo '<option>Select</option>';
                    while($row=$data->fetch(PDO::FETCH_ASSOC)){
                        echo '<option value="'.$row['client_name'].'">'.$row['client_name'].'</option>';
                    }
                    ?>
                </select>
                
            </td>
        </tr>
        <tr>
            <td>Year</td>
            <td>
            <select name='year' class="btn btn-primary dropdown-toggle" style="width: 1060px; height: 34px; ">
                <option value="Select">Select</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2016">2017</option>
                <option value="2016">2018</option>
        </select>
            </td>
        </tr>
        <tr>
            <td>Month</td>
            <td>
                <select name='month' class="btn btn-primary dropdown-toggle" style="width: 1060px; height: 34px; ">
                    <option value="Select">Select</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="11">December</option>
                </select>
       </td> </tr>
        <tr>
        <tr>
            <td>Target</td>
            <td><input type='text'  name='target' class='form-control' required /></td>
        </tr>
        <tr>
<!--        <tr>-->
<!--            <td>Rights</td>-->
<!--            <td><input type='text' name='rights' class='form-control' required /></td>-->
<!--        </tr>-->
        <tr>
            <td></td>
            <td>
                <button type="submit" id='create_submit' class='btn btn-primary'>
                    <span class='glyphicon glyphicon-plus'></span> Create Sales
                </button>
            </td>
        </tr>
    </table>
</form>



<script>

//
//    $('#create_submit').click(function(){
//        $('#loader-image').show();
//        $('#create-product').hide();
//        $('#read-products').show();
//
//        $('#page-content').fadeOut('slow', function(){
//               $('#create-user-form').submit();
//                $('#loader-image').hide();
//                $('#page-content').fadeIn('slow');
//                console.log('hi '+data);
//
//        });
//
//    });

</script>