<?php
require_once('../system/config.php');
require_once('../header.php');

$query = "SELECT * FROM comment ORDER BY comment_id";
$data = mysqli_query($dbc, $query) or die('Error!!');
mysqli_close($dbc); ?>

<legend class="mb-2">留言板</legend>
<table class="table table-hover">
    <thead class="thead-light">
        <th>用户</th>
        <th>留言内容</th>
    </thead>
    <?php
    while ($com = mysqli_fetch_array($data)) {
        echo '<tr>';
        echo '<td>' . $com['user_name'] . '</td>';
        echo '<td>' . $com['comment_text'] . '</td>';
        echo '</tr>';
    }
    ?>
</table>

<?php if (isset($_SESSION['username']) || isset($_SESSION['admin'])) { ?>
    <legend class="mt-5 pr-2">写留言</legend>
    <form action="messageSub.php" method="post" name="message">
        <div class="form-row">
            <textarea class="form-control" rows="1" id="textArea" name="message"></textarea>
        </div>
        <div class="form-row">
            <input class="ml-auto mt-2 col-1 btn btn-primary" type="submit" name="submit" value="留言" />
        </div>
    </form>
<?php } ?>

<?php require_once('../footer.php'); ?>