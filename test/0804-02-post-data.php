
    <?php

//設定回應給用富端的檔頭
header('Content-Type:application/json');



    //判斷有沒有設定變數 (陣列裡的元素)
    $a = isset($_POST['a']) ? $_POST['a'] : 0;

    $b = isset($_POST['b']) ? $_POST['b'] : 0;
    
    
    echo json_encode([
        'postData' => $_POST,
        'result' =>  $a + $b,
    ]);


    ?>
