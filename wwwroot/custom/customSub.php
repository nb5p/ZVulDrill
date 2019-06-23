<?php
require_once('../system/config.php');

$file = "../system/func.php";
if (isset($_POST['reset'])) { // 重置代码
    $back = "../system/backup.php";
    copy($back, $file);
} elseif (isset($_POST['submit']) && !empty($_POST['code'])) { // 提交代码
    // 先写入临时文件，再静态检查
    $temp = "../system/tmp.php";
    $f = fopen($temp, "w") or err_msg($_SERVER['PHP_SELF']);
    fwrite($f, $_POST['code']);
    fclose($f);

    // 静态检查
    exec('/usr/bin/php -l ../system/tmp.php', $res, $rc);
    if ($rc == 0) { // 静态检查通过
        copy($temp, $file);
    } else { // 未通通过静态检查
        $_SESSION['error_info'] = '未通过静态检查';
    }
} else {
    err_msg($_SERVER['PHP_SELF']);
}

header('Location: custom.php');

