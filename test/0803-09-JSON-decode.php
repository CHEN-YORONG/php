<pre> 
   
   <?php
    
    $str = '{"name":"\u674e\u66c9\u660e\/\u5e25","age":23,"gender":"\u7537"}';

    $obj = json_decode($str); // 轉換為 PHP Object
    
    $ar = json_decode($str, true); // 轉換關聯式陣列 array
    print_r($obj);
    echo '<br>---<br>';
    print_r($ar);
    echo '<br>---<br>';

    echo $obj -> name;  //物件的屬性
    echo '<br>---<br>';
    echo $ar['name'];  //陣列的元素值
    



    ?>
</pre>  