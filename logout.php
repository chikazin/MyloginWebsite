<head>
    <meta charset="UTF-8">
    <title>注销界面</title>
    <style>
        .content {
            margin: 230px auto;
            width: 230px;
            height: 165px;
            border: 1px black solid;
        }
    </style>
</head>
<body>
<div class="content">
    <?php
    header("Content-Type:text/html;charset=utf-8");
    session_start();
    $username = $_SESSION["username"];
    $_SESSION = array();
    session_destroy();

    if (isset($_COOKIE['username'])) {
        setcookie($_COOKIE["username"], "", time() - 1);
        setcookie($_COOKIE["password"], "", time() - 1);
    }
    echo "<p style='margin:20px'>{$username}：注销成功！</p>";
    echo "<a style='margin:20px' href='login.html'>重新登录</a>";
    ?>
</div>
</body>
