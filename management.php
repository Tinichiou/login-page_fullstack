<?php
session_start();

if (!isset ($_SESSION['id']) || !isset($_SESSION['permission'])){
    header("Location: index.html");
}
if ((int)$_SESSION['permission'] !==1){
    header("Location: normal.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理者頁面</title>
    <link rel="stylesheet" href="style_manage.css">
</head>
<!-- <body>
    <h1>恭喜來到管理者頁面</h1>
    <a href="api.php?function=logout">登出</a>
</body> -->
<body>
    <div class="login management">
        <form class="fcc" action="api.php" method="post">
            <div>
                <div class="margin30">
                    <h2>管理者頁面</h2>
                    <p>新增使用者</p>
                    <a href="api.php?function=logout">登出</a>
                </div>
                <div class="fc">
                    <input type="text" placeholder="帳號" name="account" required>
                    <input type="password" placeholder="密碼" name="password" required>
                    <input type="number" placeholder="0是一般使用者, 1是管理者" name="permission" min="0" max="1" required>
                    <input type="hidden" name="function" value="add_user">
                    <input type="submit" value="submit">
                </div>
            </div>
        </form>
    </div>
</body>
</html>

