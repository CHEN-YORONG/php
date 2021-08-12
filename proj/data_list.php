<?php
include __DIR__ . '/partoals/init.php';

$title = '資料列表';

//固定每一頁最多幾筆
$perPage = 5;

//query string paramters
$qs=[];

//關鍵字查詢
$keyword = isset($_GET['keyword'])? $_GET['keyword'] : '';


//用戶決定查看第幾頁
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;   //intval(轉換成整數)

$where = 'WHERE 1';
if(! empty($keyword)){
    //$where .= " AND `name` LIKE '%{$keyword}%' "; //sql injection 漏洞
    $where .= sprintf(" AND `name` LIKE %s", $pdo->quote('%'. $keyword. '%') ); 

    $qs['keyword']=$keyword;
};

//總共有幾筆
$totalRows = $pdo->query("SELECT count(1) FROM address_book $where ")
->fetch(PDO::FETCH_NUM)[0];
// echo $totalRows; exit; 查看總共幾筆

//總共有幾頁才能生出分業按鈕
$totalPages = ceil($totalRows / $perPage); //ceil() 無條件進位
//要有資料才能取讀該頁的資料
$row = [];
if ($totalRows != 0) {

    
    // echo "$totalRows,$totalPages"; exit; 查看幾筆,幾頁


    //讓page的值在安全的範圍 <1的 都是0  page=多大 都跳到$totalPages
    if ($page < 1) {
        header('Location:?page=1');
        exit;
    }
    if ($page > $totalPages) {
        header('Location:?page=' . $totalPages);
        exit;
    }

    //SELECT * FROM address_book ORDER BY sid DESC LIMIT 0,5  (索引直0開始  , 5個)
    //SELECT * FROM address_book ORDER BY sid DESC LIMIT 5,5  第二頁
    //($page-1)*$perPage  第二頁 (2-1)*5=5   第三頁 (3-1)*5=10

    $sql = sprintf("SELECT * FROM address_book %s ORDER BY sid DESC LIMIT %s,%s", 
    $where,
    ($page - 1) * $perPage, 
    $perPage);


    $row = $pdo->query($sql) //ORDER BY sid DESC 從後面排回來8 .7 .6 最新的資料開始排
        ->fetchAll();
}




?>
<?php include __DIR__ . '/partoals/html-head.php'; ?>
<?php include __DIR__ . '/partoals/navbar.php'; ?>

<style>
    table tbody i.fas.fa-trash-alt {
        color: darkred;
    }

    table tbody i.fas.fa-trash-alt.ajaxDelete {
        color: orange;
        cursor: pointer;
        /* 改變滑鼠游標 */
    }
</style>


<div class="container">

    <!-- 搜尋 -->
    <div class="row mb-3 mt-3">
        <div class="col d-flex justify-content-end">
            <form action="data_list.php" class="form-inline my-2 my-lg-0 ">
                <input name="keyword" class="form-control mr-sm-2 " type="search" placeholder="Search" aria-label="Search"  
                value="<?= htmlentities($keyword) ?>">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>

    <!-- 分頁 -->
    <div class="row">
        <div class="col">
            <nav aria-label="Page navigation example">
                <ul class="pagination d-flex justify-content-end">
                    <!-- 最前頁 -->
                    <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
                        <!-- disabled  a連結禁止點擊 -->
                        <a class="page-link" href="?page=1">
                            <i class="fas fa-angle-double-left"></i>
                        </a>
                    </li>
                    <!-- 上一頁 -->
                    <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
                        <!-- disabled  a連結禁止點擊 -->
                        <a class="page-link" 
                        href="?<?php $qs['page']= $page - 1;
                                     echo http_build_query($qs); ?>">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </li>




                    <?php for ($i = $page - 5; $i <= $page + 5; $i++) :
                        if ($i >= 1 and $i <= $totalPages) :
                            $qs['page'] =$i;
                    ?>

                            <li class="page-item <?= $i == $page ? 'active' : '' ?>"><a class="page-link" href="?<?= http_build_query($qs) ?>"><?= $i ?></a></li>
                            <!-- active b4屬性 反白 -->
                    <?php
                        endif;
                    endfor; ?>

                    <!-- 下一頁 -->
                    <li class="page-item <?= $page >= $totalPages ? 'disabled' : ''  ?>">
                        <a class="page-link" href="?<?php $qs['page']=$page + 1; echo http_build_query($qs); ?>">
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </li>

                    <!-- 最後一頁 -->
                    <li class="page-item <?= $page >= $totalPages ? 'disabled' : ''  ?>">
                        <a class="page-link" href="?page=<?= $totalPages ?>">
                            <i class="fas fa-angle-double-right"></i>
                        </a>
                    </li>


                </ul>
            </nav>
        </div>
    </div>

    <!-- 通訊錄 -->
    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <!-- `sid`, `name`, `email`, `mobile`, `bithday`, `created_at` -->
                        <th scope="col"><i class="far fa-trash-alt"></i></th>
                        <th scope="col"><i class="far fa-trash-alt"> ajax</i></th>
                        <th scope="col">sid</th>
                        <th scope="col">name</th>
                        <th scope="col">email</th>
                        <th scope="col">mobile</th>
                        <th scope="col">bithday</th>
                        <th scope="col"><i class="far fa-edit"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($row as $r) : ?>
                        <tr data-sid="<?= $r['sid'] ?>">
                            <td>
                                <a href="data-delete.php?sid=<?= $r['sid'] ?>" onclick="return confirm('確定要刪除編號為<?= $r['sid'] ?>的資料嗎?')">
                                    <!-- 跳出提示確認是否刪除 -->
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                            <td>
                                <i class="fas fa-trash-alt ajaxDelete"></i>
                            </td>
                            <td><?= $r['sid'] ?></td>
                            <td><?= $r['name'] ?></td>
                            <td><?= $r['email'] ?></td>
                            <td><?= htmlentities($r['mobile']) ?></td>
                            <!-- 1. strip_tags()  輸入框輸入  alert('爛芭樂') 會直接顯示 不會    跳alert -->
                            <!-- **2.  htmlentities()  同上 特殊符號的跳脫 比較好的方式-->
                            <td><?= $r['bithday'] ?></td>
                            <td>
                                <a href="data-edit.php?sid=<?= $r['sid'] ?> ">
                                    <i class="far fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- <div>
            <?php foreach ($row as $r) : ?>
                <h2><?= $r['name'] ?></h2>
            <?php endforeach; ?>
        </div> -->


    </div>
</div>
<?php include __DIR__ . '/partoals/scripts.php'; ?>

<script>
    const myTable = document.querySelector('table');

    myTable.addEventListener('click', function(event) {

        //判斷有沒有點到橙色的垃圾桶 contains 包含
        if (event.target.classList.contains('ajaxDelete')) {
            // console.log(event.target.closest('tr')); //event.target 往外找 closest 最接近 tr的
            const tr = event.target.closest('tr');
            const sid = tr.getAttribute('data-sid');
            console.log(sid);

            if (confirm(`是否刪除編號為${sid}的資料`)) {
                fetch('data-delete-api.php?sid=' + sid)
                    .then(r => r.json())
                    .then(obj => {
                        if (obj.success) {
                            tr.remove(); //從DOM 裡移除元素
                        } else {
                            alert(obj.error);
                        }
                    });
            }

        }
    })
</script>


<?php include __DIR__ . '/partoals/html-foot.php'; ?>