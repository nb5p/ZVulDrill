<?php header('X-XSS-Protection: 0'); ?>
<!DOCTYPE html>
<html lang="zh">

<head>
    <title>留言板</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/popper.js/1.15.0/esm/popper.min.js"></script>
    <script src="https://cdn.bootcss.com/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.bootcss.com/bootswatch/4.3.1/flatly/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="navbar-brand ml-5">
            <a href="<?php echo $basedir ?>/index.php" class="navbar-brand">首页</a>
        </div>

        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="navbar-nav ml-5">
                <li><a class="nav-link mr-3" href="<?php echo $basedir ?>/message/message.php">留言板</a></li>
                <li><a class="nav-link mr-3" href="<?php echo $basedir ?>/custom/custom.php">自定义</a></li>
                <li><a class="nav-link mr-3" href="<?php echo $basedir ?>/more/more.php">更多</a></li>
            </ul>

            <ul class="navbar-nav ml-auto mr-5">
                <form class="form-inline  mr-5" action="<?php echo $basedir ?>/search.php" method="get">
                    <input type="text" name="search" class="form-control" placeholder="搜索留言">
                </form>

                <?php if (isset($_SESSION['username'])) { ?>
                    <li><a class="nav-link" href="<?php echo $basedir ?>/user/user.php"><?php echo $_SESSION['username']; ?></a></li>
                    <li><a class="nav-link" href="<?php echo $basedir ?>/login/logout.php">退出</a></li>
                <?php } else if (isset($_SESSION['admin'])) { ?>
                    <li><a class="nav-link" href="<?php echo $basedir ?>/admin/manage.php"><?php echo $_SESSION['admin']; ?></a></li>
                    <li><a class="nav-link" href="<?php echo $basedir ?>/login/logout.php">退出</a></li>
                <?php } else { ?>
                    <li><a class="nav-link" href="<?php echo $basedir ?>/login/login.php">登录</a></li>
                    <li><a class="nav-link" href="<?php echo $basedir ?>/register/reg.php">注册</a></li>
                <?php } ?>
            </ul>
        </div>
        </div>

    </nav>


    <div class="container" style="margin-top: 50px;">
