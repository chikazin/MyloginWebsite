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
    include_once("statusHint.php");
    include_once("./passwdCrypt.php");
    $username = $_POST["Username"];
    $password = $_POST["Password"];
    $repassword = $_POST["Repassword"];
    if ($password === $repassword) {
        $conn = mysqli_connect("www.mylogin.com", "root", "root", "Account");
        if ($conn->connect_error) {
            echo "数据库连接失败.$conn->connect_error";
            exit(0);
        } else {
            $sql = "select username from userinfo where username = '$username'";
            $result = $conn->query($sql);
            $number = mysqli_num_rows($result);
            if ($number) {
                statusHint("该用户名已存在，请重新注册，将在", "s后跳转至注册界面", "./register.html");
            } else {
                $cryptedPwd = passwdCrypt($password);
                $sql_insert = "INSERT INTO  userinfo (username ,password)VALUES ('$username',  '$cryptedPwd');";
                $res_insert = $conn->query($sql_insert);
                if ($res_insert) {
                    statusHint("注册成功, 将在", "s后跳转至登录页面", "login.html");
                } else {
                    statusHint("系统繁忙, 请稍后再试，将在", "s后跳转至注册界面", "./register.html");
                }
            }
        }
    } else {
        statusHint("两次密码不一致，将在", "s后跳转至注册界面", "./register.html");
    }
    ?>
</div>
</body>




