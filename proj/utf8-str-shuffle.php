<?php 
$str = '傷兵滿營的洋基不斷傳出壞消息繼先發投手和捕手陸續傳出新冠肺炎檢測陽性後';
$chrArray = preg_split('//u', $str, -1, PREG_SPLIT_NO_EMPTY);
// print_r($chrArray);

shuffle($chrArray); //shuffle 打亂 隨機
$ar = array_slice($chrArray,0,3); //0開始 取3個


echo implode('',$ar); //implode — 将一个一维数组的值转化为字符串


?>