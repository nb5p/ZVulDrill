<?php

function custom_fifter($dirty) {
    // 请在这里自定义过滤
    // $dirty = str_replace("&", '&#38;', $dirty);

    $clean = $dirty;
    return $clean;
}