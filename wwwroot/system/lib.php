<?php

require('func.php');

function fifter($str) { // 自定义过滤
    if (custom_fifter($str)){ // 使用定义的过滤字符，判定是否可行
        return custom_fifter($str);
    } else {
        return $str;
    }
}

function err_msg($page) { // 错误提示
    header("HTTP/1.1 404 Not Found");
    echo "<h1>404 Not Found</h1><p>The requested URL "
    . $page .
    " was not found on this server.</p>";
}
