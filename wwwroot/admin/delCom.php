<?php
require_once('../system/config.php');

if (isset($_SESSION['admin']) && !empty($_GET['id'])) {
    $clean_id = fifter($_GET['id']);
    $query = "DELETE FROM comment WHERE comment_id = '$clean_id' LIMIT 1";
    mysqli_query($dbc, $query) or die('Error');
    mysqli_close($dbc);
    
    header('Location: manageCom.php');
} else {
    err_msg($_SERVER['PHP_SELF']);
}
