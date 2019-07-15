<head>
    <meta charset="UTF-8">
    <title>个人中心</title>
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
    //个人中心
    include_once("./statusHint.php");

    header("Content-Type:text/html;charset=utf-8");
    session_start();

    if (isset($_COOKIE["username"])) {
        $_SESSION["username"] = $_COOKIE["username"];
        $_SESSION["islogin"] = 1;
    }

    if (isset($_SESSION["islogin"])) {
        echo "<p style='margin:20px'>{$_SESSION['username'] }：欢迎来到个人中心</p>";
        echo "<a style='margin:20px' href='logout.php'>注销</a>";
    } else {
        statusHint('您还尚未登录，系统将在', 's后跳转至登录界面', 'login.html');
    }
    ?>
</div>
</body>
