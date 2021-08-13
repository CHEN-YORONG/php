<pre>
<?php

//上傳後的檔案路徑
$folder = __DIR__. '/img/';

//如果有上傳檔案
if(!empty($_FILES)){
    
    if(move_uploaded_file(
        $_FILES['avatar']['tmp_name'],
        $folder. $_FILES['avatar']['name']
        
        )){
            echo 'ok';
    }else {
        echo 'move file errors';
    
    }
}else{
    echo 'no file';
}


//var_dump($_FILES);

//單一個檔案
// $_FILES['avatar']['name']  //上傳檔案的原來黨名

// array(1) {
//     ["avatar"]=>
//     array(5) {
//       ["name"]=>
//       string(46) "{8E084F05-608A-4951-B353-F01A5C769425}.png.jpg"
//       ["type"]=>
//       string(10) "image/jpeg"
//       ["tmp_name"]=>
//       string(24) "C:\xampp\tmp\php2629.tmp"
//       ["error"]=>
//       int(0)
//       ["size"]=>
//       int(36481)
//     }
  

?>
</pre>