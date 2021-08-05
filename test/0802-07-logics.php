<h2>
<?php

$a = 1.2;

var_dump($a);
echo '<br>';


var_dump(7 && 5); // 邏輯運算子的結果一定是 bool
echo '<br>';
var_dump(7 and 5); // 邏輯運算子的結果一定是 bool
echo '<br>';

$b = 7 || 5; // &&, || 優先權比等號要高 
var_dump($b);
echo '<br>';  //bool(true)

$c = 7 or 5; // and, or 優先權比等號要低
var_dump($c);
echo '<br>';   //int(7)

?>
</h2>

