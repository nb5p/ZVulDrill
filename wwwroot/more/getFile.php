<?php
if (isset($_GET['file'])) {
    $f = $_GET['file'];
    include($f);
}

