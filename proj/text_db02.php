<?php

require __DIR__. '/partoals/init.php';

$stmt = $pdo->query("SELECT * FROM address_book LIMIT 7");


while($r = $stmt->fetch()){
    echo "<p> {$r['sid']} : {$r['name']} </p>";
}

?>