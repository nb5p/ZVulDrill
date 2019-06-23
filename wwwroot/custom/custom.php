<?php
require_once('../system/config.php');
require_once('../header.php');

if (isset($_SESSION['error_info']) && $_SESSION['error_info'] != '') { // 输出错误提示
    echo $_SESSION['error_info'];
    $_SESSION['error_info'] = '';
}
?>

<script src="https://cdn.bootcss.com/highlight.js/9.15.6/highlight.min.js"></script>
<link href="https://cdn.bootcss.com/highlight.js/9.15.6/styles/idea.min.css" rel="stylesheet">

<script>hljs.initHighlightingOnLoad();</script>
<legend class="mb-2">自定义</legend>

<form class="row form-horizontal" action="customSub.php" method="post" name="updateFunc">
    <div class="col-6">
        <pre class="hljs"><code class="php"><?php $file = "../system/func.php"; echo htmlentities(file_get_contents($file)); ?></code></pre>
    </div>

    <textarea name="code" class="col-6 form-control mb-3" id="customCode" rows="10" style="font-family: Monaco, Consolas, monospace"><?php $file = "../system/func.php"; echo htmlentities(file_get_contents($file));?></textarea>
    <input type="submit" name="submit" class="ml-auto col-1 btn btn-primary" value="更新" />
    <input type="submit" name="reset" class="ml-2 col-1 btn btn-primary" value="重置" />
</form>

<?php require_once('../footer.php'); ?>