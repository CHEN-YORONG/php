<?php
setcookie('my_cookie','1');
//設定COOKIE 在所有HTML內容之前
//其實是設定檔頭
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?= $_COOKIE['my_cookie'];   //$_COOKIE 讀取 內建?>
</body>
</html>