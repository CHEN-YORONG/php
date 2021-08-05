<h2>
<?php

// echo $_GET ['a'] ?? ''; //如果沒有設定 使用預設值


//判斷有沒有設定變數 (陣列裡的元素)
$a = isset($_GET['a']) ? $_GET['a'] : 0;

$b = isset($_GET['b']) ? $_GET['b'] : 0;
echo $a+$b;


?>
</h2>