<?php 
//啟動session
session_start();
//可以登入的用戶資料
$users = [
    'shin' =>[
        'pw' => '123456',
        'nickname' => '小明',
    ],
    'der123' =>[
        'pw' => '654321',
        'nickname' => '小華',
    ],

];

//輸出的格式
$output=[
    'success' => false,
    'error' =>'',
    'code' => 0,

];
//$_POST['account']
if(! isset($users[$_POST['account']])){
    $output['error']='帳號錯誤';
    $output['code']=401;
    echo json_encode($output,JSON_UNESCAPED_UNICODE);
    exit; //直接離開 (中斷)
    //die(); //換EXIT一樣
}

$userData = $users[$_POST['account']];
if($_POST['password'] !== $userData['pw']){
    $output['error']='密碼錯誤';
    $output['code']='405';
}else{
    $output['success']=true;
    $output['code']=200;

    $_SESSION['user']=[
        'account' => $_POST['account'],
        'nickname' => $userData['nickname'],
    ];

}




echo json_encode($output,JSON_UNESCAPED_UNICODE);

?>