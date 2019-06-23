<?php
require_once('./system/config.php');
require_once('header.php');
if (!empty($_GET['search'])) {
    $query = "SELECT * FROM comment WHERE comment_text LIKE '%{$_GET['search']}%'";
    $data = mysqli_query($dbc, $query); ?>

    <legend class="mb-2">搜索留言</legend>
    <div class="table-responsive">
        <h4 style="font-weight: normal;"><?php echo '关于 <b>' . $_GET['search'] . '</b> 的搜索结果' ?></h4>
        <table class="table table-striped table-hover ">
            <tr class="active">
                <th>用户</th>
                <th>留言</th>
            </tr>
            <?php while ($com = mysqli_fetch_array($data)) {
                $html['username'] = htmlspecialchars($com['user_name']);
                $html['comment_text'] = htmlspecialchars($com['comment_text']);
                echo '<tr>';
                echo '<td>' . $html['username'] . '</td>';
                echo '<td>' . $html['comment_text'] . '</td>';
                echo '</tr>';
            } ?>
        </table>
    </div>

    <?php if (isset($_SESSION['username']) || isset($_SESSION['admin'])) { ?>
        <legend class="mt-5 mb-2">写留言</legend>
        <form action="messageSub.php" method="post" name="message">
            <div class="form-row">
                <div class="col-11">
                    <textarea class="form-control" rows="1" id="textArea" name="message"></textarea>
                </div>
                <div class="col">
                    <input class="btn btn-primary" type="submit" name="submit" value="留言" />
                </div>
            </div>
        </form>
    <?php } ?>

<?php } ?>

<?php require_once('footer.php'); ?>