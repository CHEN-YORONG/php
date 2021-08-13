<?php 
include __DIR__. '/partoals/init.php';
// echo json_encode($_POST);
header('Content-Type: application/json');


//要存放的資料夾
$folder = __DIR__. '/img/';

//允許的檔案類型

$imgTypes=[
    'image/jpeg' => '.jpg',
    'image/png' => '.png',

];

$output = [
'success' => false,
'error' => '資料欄位不足',
'code' => 0,
'postData' => $_POST,

];



//檢查有沒有 nickname
if(empty($_POST['nickname'])){
    echo json_encode($output);
    exit;
}

$isSaved = false;


//判斷有沒有檔案上傳
if(! empty($_FILES) and !empty($_FILES['avatar'])){
    
    $ext = $imgTypes[$_FILES['avatar']['type']]; // 取得副檔名
    
    //如果是允許的檔案類型
    if(! empty($ext)){
            $filename = sha1( $_FILES['avatar']['name']. rand()). $ext; //sha1隨機的黨名

            if(move_uploaded_file(
                $_FILES['avatar']['tmp_name'],
                $folder. $filename
                )){
                    $output['filename'] = $filename;
                    $output['error'] = '';
                    $output['success'] = true;
                
                    echo json_encode($output);
                    exit;
                
             }

    }

}
echo json_encode($output);
?>