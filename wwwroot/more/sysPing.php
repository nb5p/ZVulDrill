<?php
require_once('../system/config.php');
require_once('../header.php'); ?>

<legend class="mb-2">Ping工具</legend>

<form name="include_exec" action="" method="post">
    <div class="form-row">
        <input type="text" name="target" size="30" class="form-control">
    </div>
    <div class="form-row">
        <input type="submit" value="执行" name="submit" class="ml-auto mt-2 col-1 btn btn-primary">
    </div>
</form>

<?php
if (isset($_POST['submit'])) {
    if ($target = $_POST['target']) {
        $cmd = 'ping -c 4 ' . $target;
        $res = shell_exec($cmd);
        echo "<pre>$cmd\n\n" . iconv('GB2312', 'UTF-8', $res) . "</pre>";
    }
}
?>

<?php require_once('../footer.php'); ?>
