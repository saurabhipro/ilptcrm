<?php
/**
 * Created by PhpStorm.
 * User: gaurav
 * Date: 10/6/16
 * Time: 5:00 PM
 */
session_start();
unset($_SESSION['username']);
unset($_SESSION['role']);
session_destroy();

header("Location: index.php");
exit;
