<?php 
include __DIR__ .'/partoals/init.php';
// echo json_encode($_POST);





//錯誤的做法 :可能受到 SQL injection 攻擊
/* 
$sql="INSERT INTO `address_book`(
    `name`, `email`, `mobile`, `bithday`, `created_at`) 
    VALUES(
        '{$_POST['name']}','{$_POST['email']}','{$_POST['mobile']}','{$_POST['bithday']}',now()
    )";

$stmt = $pdo->query($sql);
*/


//來源不名一律用這個
$sql="INSERT INTO `address_book`(
    `name`, `email`, `mobile`, `bithday`, `created_at`) 
    VALUES(
        ?,?,?,?,now()
    )";

$stmt = $pdo->prepare($sql); //prepare()準備 execute($_POST[''],$_POST[''],)執行 對應每個問號
$stmt->execute([
    $_POST['name'],
    $_POST['email'],
    $_POST['mobile'],
    $_POST['bithday'],
]);



echo json_encode([
    'rowCount' => $stmt->rowCount(), //新增的筆數
    'postData' => $_POST,
]);
?>

