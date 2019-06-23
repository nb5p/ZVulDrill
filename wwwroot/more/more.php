<?php
require_once('../system/config.php');
require_once('../header.php');
?>

<legend class="mb-2">更多内容</legend>
<ul>
    <li><a href="getFile.php?file=phpinfo.php">info</a></li>
    <li><a href="sysPing.php">Ping</a></li>
    <li><a href="ssrf.php">SSRF</a></li>
    <li><a href="xml.php">XML</a></li>
</ul>

<?php require_once('../footer.php'); ?>