<!--
    -we have our html form here where product information will be entered
    -we used the 'required' html5 property to prevent empty fields
-->


<form id='create-user-form' action='#' method='post' border='0'>
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Client</td>
            <td><input type='text' name='client_name' class='form-control' required /></td>
        </tr>
        <tr>
            <td>Location</td>
            <td><input type='text' name='location' class='form-control' required /></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input type='text' min='6' name='address' class='form-control' required /></td>
        </tr>
        <tr>
        <tr>
            <td>Phone No.</td>
            <td><input type='text'  name='phone_no' class='form-control' required /></td>
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
                    <span class='glyphicon glyphicon-plus'></span> Create Clients
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