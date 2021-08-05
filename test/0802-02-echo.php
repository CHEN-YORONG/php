<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

echo __DIR__; //該PHP所在的實體資料夾
echo '<br>';
echo __FILE__; //該PHP所在的路徑(包含檔名)
echo '<br>';
echo __LINE__; //拿到位置 畫面會顯示該行 16  少用 用來除錯
echo '<br>';

echo PHP_VERSION; //版本
echo '<br>';


?>
</body>
</html>