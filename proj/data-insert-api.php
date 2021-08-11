<?php 
include __DIR__ .'/partoals/init.php';
// echo json_encode($_POST);

$output=[
'success' => false,
'error' => '',
'code' => 0,
'rowCount' => 0,
'postData' => $_POST,

];




// TODO : 資料格式檢查
if(strlen($_POST['name'])<2){

    $output['error']='姓名長度太短';
    $output['code']=410;
    echo json_encode($output);
    exit;
}

if(! filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $output['error']='email 格式錯誤';
    $output['code']=420;
    echo json_encode($output);
    exit;
}




// var_dump(filter_var('bob@example.com', FILTER_VALIDATE_EMAIL)); //檢查EMAIL格式



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

$output['rowCount'] = $stmt ->rowCount(); //新增的筆數
if($stmt->rowCount()==1){
    $output['success'] =true;
}
echo json_encode($output);
?>

