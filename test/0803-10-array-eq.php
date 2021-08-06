<pre> 
   <?php

    $ar = array(

        'name' => '李曉明',
        'age' => 23,
        'gender' => '男',

    );

    $ar2 = $ar;  //複製新的陣列在指定(設定值) 只會改$ar2  set by value
    $ar2['name']='陳小華';


    echo json_encode($ar , JSON_UNESCAPED_UNICODE);
    echo '<br>----<br>';  //李曉明
    echo json_encode($ar2 , JSON_UNESCAPED_UNICODE);
    echo '<br>----<br>'; //陳小華

    
    $ar3 = &$ar;  // &設定值位址 倆個都會改  set by address
    $ar3['name']='許大功';

    echo json_encode($ar , JSON_UNESCAPED_UNICODE);
    echo '<br>----<br>';
    //許大功
    echo json_encode($ar3 , JSON_UNESCAPED_UNICODE);
    echo '<br>----<br>';
    //許大功
    ?>
    
</pre>  