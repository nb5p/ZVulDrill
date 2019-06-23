<?php
require_once('../system/config.php');

if (isset($_POST['submit']) && !empty($_POST['message'])) {
    if (isset($_SESSION['username'])) {
        $name = $_SESSION['username'];
    } else if (isset($_SESSION['admin'])){
        $name = $_SESSION['admin'];
    }
    $clean_message = fifter($_POST['message']);
    $query = "INSERT INTO comment(user_name,comment_text,pub_date) VALUES ('$name','$clean_message',now())";
    mysqli_query($dbc, $query) or die("Error!!");
    mysqli_close($dbc);
    header('Location: message.php');
} else {
    err_msg($_SERVER['PHP_SELF']);
}
