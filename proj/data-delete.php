<?php 
include __DIR__ .'/partoals/init.php';

header('Content-Type: application/json');


$sid =  isset($_GET['sid'])? intval($_GET['sid']) : 0;
if(! empty($sid)){  //empty(0) = true
    $sql="DELETE FROM `address_book` WHERE sid=$sid";
    $stmt = $pdo->query($sql); //
}

header('Location:data_list.php');




?>