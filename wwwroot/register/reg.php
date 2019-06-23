<?php
require_once('../system/config.php');
require_once('../header.php');

if (isset($_SESSION['error_info']) && $_SESSION['error_info'] != '') {
    echo $_SESSION['error_info'];
    $_SESSION['error_info'] = '';
}
?>

<script src="../js/check.js"></script>
<legend class="mb-2">注册</legend>

<form class="form-horizontal" action="regCheck.php" method="post" name="reg">
    <div class="form-group row justify-content-center">
        <label for="inputUsername" class="col-2 col-form-label text-right">用户名：</label>
        <input type="text" name="user" class="col-4 form-control" id="inputUsername">
    </div>

    <div class="form-group row justify-content-center">
        <label for="inputPasswd" class="col-2 col-form-label text-right">密码：</label>
        <input type="password" name="passwd" class="col-4 form-control" id="inputPasswd">
    </div>

    <div class="form-group row justify-content-center">
        <label for="inputPasswd2" class="col-2 col-form-label text-right">确认密码：</label>
        <input type="password" name="passwd2" class="col-4 form-control" id="inputPasswd2" onblur="check()">
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-2"></div>
        <input type="submit" name="submit" class="col-4 form-control btn btn-primary" value="注册" />
    </div>
</form>

<?php
require_once('../footer.php');
?>