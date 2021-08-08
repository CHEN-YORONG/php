<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?= isset($_COOKIE['my_cookie']) ? $_COOKIE['my_cookie']:'';   //$_COOKIE 讀取 內建
    ?>
</body>

</html>