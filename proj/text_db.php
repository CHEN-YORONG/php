<?php

require __DIR__. '/partoals/init.php';

$stmt = $pdo->query("SELECT * FROM address_book LIMIT 5");

// print_r($stmt ->fetch(PDO::FETCH_ASSOC));
echo json_encode($stmt ->fetch(), JSON_UNESCAPED_UNICODE);//第一筆 fetch(PDO::FETCH_ASSOC)
echo json_encode($stmt ->fetch(), JSON_UNESCAPED_UNICODE);//第二筆 fetch(PDO::FETCH_ASSOC)
//fetch 一筆(不管上面有幾筆) fetchALL全部  //FETCH_ASSOC 關聯式陣列      FETCH_NUM 索引式陣列    FETCH_BOTH 兩個都給
?>