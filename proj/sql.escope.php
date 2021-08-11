<?php 
include __DIR__ .'/partoals/init.php';

$data = "john's cat";

echo $pdo->quote($data); //做SQL跳脫\'   'john\'s cat'