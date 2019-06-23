<?php
require_once('../system/config.php');
if (isset($_SESSION['username'])) {
    require_once('../header.php');
    $html_avatar = htmlspecialchars($_SESSION['avatar']);
    $html_username = htmlspecialchars($_SESSION['username']);

    if (isset($_SESSION['error_info']) && $_SESSION['error_info'] != '') {
        echo $_SESSION['error_info'];
        $_SESSION['error_info'] = '';
    } ?>

    <script src="../javascript/check.js"></script>
    <script src="../javascript/avatar.js"></script>
    <legend class="mb-2">用户中心</legend>

    <form action="updateName.php" name="updateName" class="form-horizontal" method="post">
        <input type="hidden" name="id" value="<?php echo $_SESSION['user_id'] ?>">
        <div class="form-group row justify-content-center">
            <label for="inputEmail" class="col-2 col-form-label text-right">用户名：</label>
            <input type="text" name="username" value="<?php echo $html_username ?>" class="col-4 form-control" id="inputEmail">
            <input type="submit" name="submit" class="col-1 btn btn-primary ml-2" value="更新" />
        </div>
    </form>
    <hr />

    <form class="form-horizontal" action="updatePass.php" method="get" name="updatePasswd">
        <input type="hidden" name="id" value="<?php echo $_SESSION['user_id'] ?>">
        <div class="form-group row justify-content-center">
            <label for="inputPasswd" class="col-2 col-form-label text-right">新密码：</label>
            <input type="password" name="passwd" class="col-4 form-control" id="inputPasswd">
            <div class="col-1 ml-2"></div>
        </div>
        <div class="form-group row justify-content-center">
            <label for="inputPasswd2" class="col-2 col-form-label text-right">确认密码：</label>
            <input type="password" name="passwd2" class="col-4 form-control" id="inputPasswd2" onblur="check()">
            <input type="submit" name="submit" class="col-1 btn btn-primary ml-2" value="更新" />
        </div>
    </form>
    <hr />

    <form class="form-horizontal" action="updateAvatar.php" method="post" enctype="multipart/form-data" name="uploadAvatar">
        <div class="form-group row justify-content-center ">
            <label for="inputAvatar" class="col-2 col-form-label text-right">头像：</label>
            <div class="custom-file col-4">
                <input type="file" class="custom-file-input" accept="image/png, image/gif, image/jpeg, image/jpg" id="inputAvatar" name="upfile" aria-describedby="inputGroupFileAddon04">
                <label class="custom-file-label" for="inputAvatar"></label>
            </div>
            <input type="submit" name="submit" class="col-1 btn btn-primary ml-2" value="上传" />
        </div>
        <div class="form-group row justify-content-center">
            <img src="<?php echo $html_avatar ?>" class="img-thumbnail" style="height:100px; margin-top: 10px;">
        </div>
    </form>
<?php
} else {
    err_msg($_SERVER['PHP_SELF']);
} ?>

<?php require_once('../footer.php'); ?>