<?php
require_once('../system/config.php');

if (isset($_SESSION['admin'])) { require_once('../header.php');
    $query = "SELECT * FROM comment ORDER BY comment_id";
    $data = mysqli_query($dbc, $query) or die('Error');
    mysqli_close($dbc); ?>

    <legend class="mb-2">管理留言</legend>
    <table class="table table-hover">
        <thead class="thead-light">
            <th>留言</th>
            <th>用户</th>
            <th>管理</th>
        </thead>

        <?php while ($com = mysqli_fetch_array($data)) {
            $html_comment_text = htmlspecialchars(fifter($com['comment_text']));
            $html_user_name = htmlspecialchars(fifter($com['user_name'])); ?>
            <tr class="odd">
                <td><?php echo $html_comment_text; ?></td>
                <td><?php echo $html_user_name; ?></td>
                <td><a href="delCom.php?id=<?php echo $com['comment_id']; ?>">删除</a></td>
            </tr>
        <?php } ?>
    </table>
    <a href="manage.php">返回</a>

    <?php require_once('../footer.php');
} else {
    err_msg($_SERVER['PHP_SELF']);
}