<?php
require_once('../system/config.php');

if (isset($_POST['submit']) && !empty($_POST['user']) && !empty($_POST['pass'])) {
    require_once('../header.php');
    $name = $_POST['user'];
    $pass = $_POST['pass'];

    $query = "SELECT * FROM admin WHERE admin_name = '$name' AND admin_pass = SHA('$pass')";
    $data = mysqli_query($dbc, $query) or die('Error!!');

    if (mysqli_num_rows($data) == 1) {
        $_SESSION['admin'] = $name;
        header('Location: manage.php');
    } else {
        $_SESSION['error_info'] = '用户名或密码错误';
        header('Location: ../login/login.php');
    }
} else {
    err_msg($_SERVER['PHP_SELF']);
}
