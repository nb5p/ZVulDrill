<?php
require_once('../system/config.php');

if (isset($_SESSION['admin'])) {
    require_once('../header.php');
    $query = "SELECT * FROM users ORDER BY user_id";
    $data = mysqli_query($dbc, $query) or die('Error');
    mysqli_close($dbc); ?>
    
    <legend class="mb-2">管理用户</legend>
    <table class="table table-hover">
        <thead class="thead-light">
            <th>用户</th>
            <th>操作</th>
        </thead>

        <?php while ($users = mysqli_fetch_array($data)) {
            $html_user_name = htmlspecialchars($users['user_name']); ?>
            <tr class="odd">
                <td><?php echo $html_user_name; ?></td>
                <td><a href="delUser.php?id=<?php echo $users['user_id']; ?>">删除</a></td>
            </tr>
        <?php } ?>
    </table>
    <a href="manage.php" sytle="margin-top: 50px;">返回</a>
    <?php require_once('../footer.php'); ?>
<?php
} else {
    err_msg($_SERVER['PHP_SELF']);
}
