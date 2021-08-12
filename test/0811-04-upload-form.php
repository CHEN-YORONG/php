<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<form action="0811-05-file.php" name="form1" method="post" enctype="multipart/form-data">
<!-- enctype="multipart/form-data"  上傳檔案一定要加 -->
<input type="file" name="avatar" accept="image/*">  <!-- accept="image/*" 只能選圖檔 -->
<br>
<input type="text" name="name" placeholder="姓名">
<br>
<input type="submit">

</form>




</body>
</html>