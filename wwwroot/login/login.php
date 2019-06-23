<?php
require_once('../system/config.php');
require_once('../header.php');

if (isset($_SESSION['error_info']) && $_SESSION['error_info'] != '') {
    echo $_SESSION['error_info'];
    $_SESSION['error_info'] = '';
}
?>

<script src="../javascript/change.js"></script>
<legend class="mb-2">登录</legend>

<form id="loginForm" class="form-horizontal" action="../user/checkLogin.php" method="post" name="log">
    <div class="form-group row justify-content-center">
        <label for="inputUsername" class="col-2 col-form-label text-right">用户名：</label>
        <input type="text" name="user" class="col-4 form-control" id="inputUsername">
    </div>

    <div class="form-group row justify-content-center">
        <label for="inputPasswd" class="col-2 col-form-label text-right">密码：</label>
        <input type="password" class="col-4 form-control" name="pass" id="inputPassword">
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-2"></div>
        <label class="col-2">
            <input type="radio" name="changeMode" id="inputUser" value="user" checked="true" onchange="change('user')"> 普通用户
        </label>
        <label class="col-2">
            <input type="radio" name="changeMode" id="inputAdmin" value="admin" onchange="change('admin')"> 管理员用户
        </label>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-2"></div>
        <input type="submit" name="submit" class="col-4 form-control btn btn-primary" value="登录" />
    </div>
</form>
</div>

<?php require_once('../footer.php'); ?>