<h3>

<?php

for ($i = 1; $i < 10; $i++) {
    $br[] = $i * $i;
}


array_push($br, 100, 101);

echo json_encode($br); //轉換成JSON字串


echo '<br>------------<br>';

$ar = array(
   
    'name' => '李曉明/帥',
    'age' => 23,
    'gender' => '男',
    
);  


echo json_encode($ar);  //中文會變成UNICODE 跳脫
echo '<br>------------<br>';
echo json_encode($ar,JSON_UNESCAPED_UNICODE); //不要跳脫中文  轉換成JSON 字串
echo '<br>------------<br>';
echo json_encode($ar,JSON_UNESCAPED_SLASHES); //不要跳脫  slash \
echo '<br>------------<br>';
echo json_encode($ar,JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); //不要跳脫中文 同時不跳脫slash
echo '<br>------------<br>';








?>

</h3>