<head>
    <meta charset="UTF-8">
    <title>登录验证界面</title>
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
    include_once("./statusHint.php");
    include_once("./passwdCrypt.php");
    header("Content-Type:text/html;charset=utf-8");
    session_start();

    if (isset($_POST["login"])) {
        $username = $_POST["Username"];
        $password = passwdCrypt($_POST["Password"]);

        $conn = mysqli_connect("www.mylogin.com", "root", "root", "Account");
        if ($conn->connect_error) {
            echo "数据库连接失败.$conn->connect_error";
            exit(0);
        } else {
            $sql = "select username,password from userinfo where username = '$username' and password = '$password'";
            $result = $conn->query($sql);
            $number = mysqli_num_rows($result);
            if ($number) {
                if (isset($_POST["remember"])) {
                    setcookie("username", $username, time() + 60 * 60 * 24);
                    setcookie("password", md5($password), time() + 60 * 60 * 24);
                }
                $_SESSION["username"] = $username;
                $_SESSION["islogin"] = 1;
                statusHint("登录成功，系统将在", "s后跳转至个人中心页面", 'index.php');

            } else {
                statusHint("账号或密码错误, 将在", "s后返回登录界面", 'login.html');
            }
        }
    }

    ?>
</div>
</body>