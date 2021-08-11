<?php 
include __DIR__. '/partoals/init.php';
// echo json_encode($_POST);
header('Content-Type: application/json');


$sql = "INSERT INTO `address_book`(
    `name`, `email`, `mobile`, `bithday`, `created_at`) 
    VALUES(
        ?,?,?,?,NOW()
    )";
$stmt = $pdo->prepare($sql);

$str = '傷兵滿營的洋基不斷傳出壞消息繼先發投手和捕手陸續傳出新冠肺炎檢測陽性後';
$chrArray = preg_split('//u', $str, -1, PREG_SPLIT_NO_EMPTY);

for($i=0;$i<100;$i++){

    shuffle($chrArray); //shuffle 打亂 隨機
    $name = implode('',array_slice($chrArray, 0, 3) ) ; //0開始 取3個
    
    
    $stmt->execute([
        $name,
        uniqid().'@test.com',
        '09'.strval(rand(10000000,99999999)), //strval 轉換成字串
        date( 'Y-m-d', rand(strtotime('1990-01-01'),strtotime('2000-01-01'))),
    ]);
}



echo 'ok';
