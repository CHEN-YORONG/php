<h2>


    <?php

    $name = 'Peter';

    $a = 66;
    $b = "22";
    $c = 'hi';

    echo "$a
    +
    $b <br>"; //中間可以換行

    echo "$a + $b <br>";  // ""  "$a 變數名稱" 變數轉換成數值
    echo '$a + $b <br>';  // '' $a $b 直接顯示出來    


    echo "{$a}555 <br>";  //變數+常數 +{}
    echo "${a}555 <br>";




    $a = "xyz\nabc\"def\'ghi\\ <br>";
    $b ='xyz\nabc\"def\'ghi\\<br>';
    echo $a;
    echo $b;


    ?>



</h2>