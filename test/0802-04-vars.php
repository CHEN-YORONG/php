
<h2>


<?php

$name = 'Peter';

$a =66;
$b = "22";
$c = 'hi';

echo $a + $b;  // + 只做數值相加
echo '<br>';

echo $a * $b; 
echo '<br>';

echo $c + $b; //Warning 
echo '<br>';

echo $c * $b;
echo '<br>';

echo intval($c) + intval($b);  // intval() 轉換為整數
echo '<br>';

echo intval($c) * intval($b);
echo '<br>';


?>



</h2>