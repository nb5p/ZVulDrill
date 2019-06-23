<?php
require_once('../system/config.php');

if (isset($_SESSION['admin'])) { require_once('../header.php'); ?>
    <legend class="mb-2">控制面板</legend>
    <table class="table table-hover">
        <thead class="thead-light">
            <th>项目</th>
            <th>操作</th>
        </thead>
        <tr class="odd">
            <td>管理用户</td>
            <td>
                <a href="manageUser.php">进入</a></td>
        </tr>
        <tr class="odd">
            <td>管理评论</td>
            <td><a href="manageCom.php">进入</a></td>
        </tr>
        </tbody>
    </table>
    <?php require_once('../footer.php');
} else {
    err_msg($_SERVER['PHP_SELF']);
}
