<?php
require_once('../system/config.php');

if (isset($_POST['submit']) && !empty($_POST['user']) && !empty($_POST['pass'])) {
    $clean_name = fifter($_POST['user']);
    $clean_pass = fifter($_POST['pass']);
    $query = "SELECT * FROM users WHERE user_name = '$clean_name' AND user_pass = SHA('$clean_pass')";
    $data = mysqli_query($dbc, $query) or die('Error!!');
    mysqli_close($dbc);

    if (mysqli_num_rows($data) == 1) {
        $row = mysqli_fetch_array($data);
        $_SESSION['username'] = $row['user_name'];
        $_SESSION['avatar'] = $row['user_avatar'];
        header('Location: user.php');
    } else {
        $_SESSION['error_info'] = '用户名或密码错误';
        header('Location: ../login/login.php');
    }
} else {
    err_msg($_SERVER['PHP_SELF']);
}
