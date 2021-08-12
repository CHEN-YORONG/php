<?php
include __DIR__ . '/partoals/init.php';
$title = '修改資料';

$sid =  isset($_GET['sid'])? intval($_GET['sid']) : 0;

$sql= "SELECT * FROM `address_book` WHERE sid=$sid";
$row = $pdo->query($sql)->fetch();

if(empty($row)){
    header('Location:data_list.php');
    exit;
}

echo json_encode($row,JSON_UNESCAPED_UNICODE);

























?>




