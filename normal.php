<!-- // 一般用戶頁面 -->
<?php 
session_start();
// 如果SESSION 沒有設定 id 或 permission 就跳轉回 index.php
if (!isset($_SESSION["id"]) || !isset($_SESSION["permission"])) {
    header("Location: index.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GDSC login</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <p>你是一般用戶,登入成功</p>
    <a href="api.php?function=logout">登出</a>
</body>
</html>