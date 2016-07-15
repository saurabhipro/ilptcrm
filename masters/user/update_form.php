<?php
// get user id
$user_id=isset($_GET['user_id']) ? $_GET['user_id'] : die('ERROR: user ID not found.');

// include database and object files
ini_set('display_errors', 'On');
// include database and object files
include_once '../../config/database.php';
include_once '../../objects/user.php';


// instantiate database and user object
$database = new Database();
$db = $database->getConnection();

// initialize object
$user = new User($db);

// set user id property
$user->id=$user_id;

// read single user
$user->readOne();
?>
<!--we have our html form here where new user information will be entered-->
<form id='update-product-form' action='#' method='post' border='0'>
    <table class='table table-bordered table-hover'>
        <tr>
            <td>Username</td>
            <td><input type='text' name='username' class='form-control' value='<?php echo htmlspecialchars($user->username, ENT_QUOTES); ?>' required /></td>
        </tr>
        <tr>
            <td>Login Id</td>
            <td>
                <input type='text' name='login_id' class='form-control' value='<?php echo htmlspecialchars($user->login_id, ENT_QUOTES); ?>' required />
            </td>

        </tr>
        <tr>
            <td>Password</td>
            <td><input type='password' min='6' name='password' class='form-control' value='<?php echo htmlspecialchars($user->password, ENT_QUOTES);  ?>' required /></td>
        </tr>
        <tr>
        <tr>
            <td>Role</td>
            <td>
                <input type='text' name='role' class='form-control' value='<?php echo htmlspecialchars($user->role, ENT_QUOTES); ?>' required />
            </td>

        </tr>
<!--        <tr>-->
<!--            <td>Rights</td>-->
<!--            <td>-->
<!--                <input type='text' name='rights' class='form-control' value='--><?php //echo htmlspecialchars($user->rights, ENT_QUOTES); ?><!--' required />-->
<!--            </td>-->
<!---->
<!--        </tr>-->
        <td>
            <!-- hidden ID field so that we could identify what record is to be updated -->
            <input type='hidden' name='id' value='<?php echo $user_id ?>' />
        </td>
        <td>
            <button type='submit' class='btn btn-primary'>
                <span class='glyphicon glyphicon-edit'></span> Save Changes
            </button>
        </td>
        </tr>
    </table>
</form>