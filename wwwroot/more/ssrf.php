<?php
require_once('../system/config.php');
require_once('../header.php'); ?>

<legend class="mb-2">SSRF</legend>

<form name="ssrf" action="" method="post">
    <div class="form-row">
        <input type="text" name="target" size="30" class="form-control">
    </div>
    <div class="form-row">
        <input type="submit" value="访问" name="submit" class="ml-auto mt-2 col-1 btn btn-primary">
    </div>
</form>

<?php
if (isset($_POST['submit'])) {
    $url = @$_POST['target'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $co = curl_exec($ch);
    curl_close($ch);
    echo $co;
}
?>

<?php require_once('../footer.php'); ?>
