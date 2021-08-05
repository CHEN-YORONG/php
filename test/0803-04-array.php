<pre>

<?php
//索引式
$ar1 = array(3,5,7);  //舊語法 通用

$ar2 = [3,5,7];  //5.x 才支援的語法

var_dump($ar2);  //查看內容 除錯用
print_r($ar2);  //查看內容 除錯用


//關聯式
//KEY 一定要加'' JS不用
$ar3=array(
    'name' => 'david',
    'age' => 23,

    );

$ar4=[
    'name' => 'david',
    'age' => 23,
    ];
print_r($ar4);

?>

</pre>