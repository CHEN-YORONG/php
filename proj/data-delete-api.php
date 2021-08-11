<?php 
include __DIR__ .'/partoals/init.php';

header('Content-Type: application/json');

$sid =  isset($_GET['sid'])? intval($_GET['sid']) : 0;

$output =[
    'success'=>false,
    'error' => '沒有給sid',
    'sid' =>$sid,

];

if(empty($sid)){
    echo json_encode( $output,JSON_UNESCAPED_UNICODE);
    exit;
} else{  //empty(0) = true
    $sql="DELETE FROM `address_book` WHERE sid=$sid";
    $stmt = $pdo->query($sql); 

    if($stmt->rowCount()==1){
        $output['success']= true;
        $output['error']= '';
    }else{
        $output['error']='沒有刪除成功 (可能沒有該筆資料)';
    }
}


echo json_encode($output,JSON_UNESCAPED_UNICODE);
?>