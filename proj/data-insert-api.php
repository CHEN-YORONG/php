<?php 
include __DIR__ .'/partoals/init.php';
// echo json_encode($_POST);


//錯誤的做法
$sql="INSERT INTO `address_book`(
    `name`, `email`, `mobile`, `bithday`, `created_at`) 
    VALUES(
        '{$_POST['name']}','{$_POST['email']}','{$_POST['mobile']}','{$_POST['bithday']}',now()
    )";

$stmt = $pdo->query($sql);

echo json_encode([
    'rowCount' => $stmt->rowCount(), //新增的筆數
    'postData' => $_POST,
]);
?>

