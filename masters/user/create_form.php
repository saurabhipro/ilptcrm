<!--
    -we have our html form here where product information will be entered
    -we used the 'required' html5 property to prevent empty fields
-->


<form id='create-user-form' action='#' method='post' border='0'>
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Username</td>
            <td><input type='text' name='username' class='form-control' required/></td>
        </tr>
        <tr>
            <td>Login Id</td>
            <td><input type='text' name='login_id' class='form-control' required/></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type='password' min='6' name='password' class='form-control' required/></td>
        </tr>
        <tr>
        <tr>
            <td>Role</td>
            <td>
                <!--                <input type='text'  name='role' class='form-control' required />-->
                <select name='role' class="btn btn-primary dropdown-toggle" style="width: 1060px; height: 34px; ">
                    <option value="Select">Select</option>
                    <option value="Administrator">Administrator</option>
                    <option value="engineer">Engineer</option>

                </select>
            </td>
        </tr>
        <tr>
            <!--        <tr>-->
            <!--            <td>Rights</td>-->
            <!--            <td><input type='text' name='rights' class='form-control' required /></td>-->
            <!--        </tr>-->
            <!--        <tr>-->
            <td></td>
            <td>
                <button type="submit" id='create_submit' class='btn btn-primary'>
                    <span class='glyphicon glyphicon-plus'></span> Create Users
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