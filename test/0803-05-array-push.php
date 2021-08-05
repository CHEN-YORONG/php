<pre>

<?php

for ($i=1;$i<10 ;$i++){
    $br[]=$i*$i;
}
print_r($br);

echo '<br>';

array_push($br,100 ,101);


echo implode(',',$br).'<br>'; //用','隔開
//echo $br; //不要直接將陣列轉成字串



//將字串切成陣列
$str= '1-3-5-7-15';
$ar = explode('-',$str);
print_r($ar);
?>

</pre>