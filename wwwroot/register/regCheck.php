<?php
require_once('../system/config.php');

if (isset($_POST['submit']) && !empty($_POST['user']) && !empty($_POST['passwd'])) {
    $clean_name = fifter($_POST['user']);
    $clean_pass = fifter($_POST['passwd']);
    $avatar = '../images/default.png';

    $query = "SELECT * FROM users WHERE user_name = '$clean_name'";
    $data = mysqli_query($dbc, $query);
    if (mysqli_num_rows($data) == 1) {
        $_SESSION['error_info'] = '用户名已存在';
        header('Location: reg.php');
    } else {
        $_SESSION['username'] = $clean_name;
        $_SESSION['avatar'] = $avatar;
        $date = date('Y-m-d');

        $query = "INSERT INTO users(user_name,user_pass,user_avatar,join_date) VALUES ('$clean_name',SHA('$clean_pass'),'$avatar','$date')";
        mysqli_query($dbc, $query) or die("Error!!");
        mysqli_close($dbc);
        header('Location: ../user/user.php');
    }
} else {
    err_msg($_SERVER['PHP_SELF']);
}
