<?php
require_once('../system/config.php');

if (isset($_SESSION['username'])) {
    require_once('../header.php');
    if (!isset($SESSION['user_id'])) {
        $query = "SELECT * FROM users WHERE user_name = '{$_SESSION['username']}'";
        $data = mysqli_query($dbc, $query) or die('Error!!');
        mysqli_close($dbc);
        $result = mysqli_fetch_array($data);
        $_SESSION['user_id'] = $result['user_id'];
    }
    $html_avatar = htmlspecialchars($_SESSION['avatar']); ?>

    <legend class="mb-2">用户中心</legend>

    <div class="thumbnail">
        <div class="text-center" style="margin-top: 50px;">
            <img src="<?php echo $html_avatar ?>" width="100" height="100" class="img-responsive img-thumbnail" />
            <div>用户名： <strong><?php echo $_SESSION['username'] ?></strong></div>
        </div>

        <div class="caption" style="margin-top: 15px; margin-bottom: 50px;">
            <div class="text-center">
                <a href="edit.php" class="col-1 btn btn-primary" role="button">编辑</a>
                <a href="../message/message.php" class="col-1 btn btn-primary" role="button">留言</a>
                <a href="../login/logout.php" class="col-1 btn btn-primary" role="button">退出</a>
            </div>
        </div>
    </div>

<?php
} else {
    err_msg($_SERVER['PHP_SELF']);
}
?>

<?php require_once('../footer.php'); ?>