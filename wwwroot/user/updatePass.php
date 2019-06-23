<?php
require_once('../system/config.php');

if (!empty($_REQUEST['passwd'])) {
    $clean_passwd = fifter($_REQUEST['passwd']);
    $query = "UPDATE users SET user_pass = 
        SHA('$clean_passwd') WHERE user_id = '{$_REQUEST['id']}'";
    mysqli_query($dbc, $query) or die("updata error!");
    mysqli_close($dbc);
    header('Location: edit.php');
} else {
    err_msg($_SERVER['PHP_SELF']);
}

