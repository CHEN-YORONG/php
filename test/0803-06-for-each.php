<pre>

<?php

for ($i = 1; $i < 10; $i++) {
    $br[] = $i * $i;
}


array_push($br, 100, 101);

foreach($br as $v){

    echo "$v <br>";
}
echo '------------<br>';

$ar = array(
    123,
    'name' => 'david',
    'age' => 23,
    'gender' => 'male',
    'hello'
);  //原則上不要混用所以索引式 關聯式

foreach($ar as $k => $v){
    echo "$k => $v <br>";
};


echo '------------<br>';

echo count($ar);




?>

</pre>