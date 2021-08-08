<h2>
    <?php 
    // https://www.php.net/manual/zh/function.date.php
    date_default_timezone_set('Asia/Taipei'); //預設是德國時區 修改為台北時區
    echo time().'<br>';
    echo date("Y-m-d H:i:s").'<br>';
    echo date("D N").'<br>';
    echo date("Y-m-d H:i:s",time()+40*24*60*60); //40天後
    //格式化時間

    $t = strtotime('2021/09/06').'<br>';
    echo date("Y-m-d H:i:s",$t).'<br>';
    ?>
</h2>