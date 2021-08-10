<?php
include __DIR__ . '/partoals/init.php';

$title = '資料列表';

//固定每一頁最多幾筆
$perPage = 5;


//用戶決定查看第幾頁
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;   //intval(轉換成整數)

//總共有幾筆
$totalRows = $pdo->query("SELECT count(1) FROM address_book")->fetch(PDO::FETCH_NUM)[0];
// echo $totalRows; exit; 查看總共幾筆


//總共有幾頁才能生出分業按鈕

$totalPages = ceil($totalRows / $perPage); //ceil() 無條件進位
// echo "$totalRows,$totalPages"; exit; 查看幾筆,幾頁


//SELECT * FROM address_book ORDER BY sid DESC LIMIT 0,5  (索引直0開始  , 5個)
//SELECT * FROM address_book ORDER BY sid DESC LIMIT 5,5  第二頁
//($page-1)*$perPage  第二頁 (2-1)*5=5   第三頁 (3-1)*5=10

$sql = sprintf("SELECT * FROM address_book ORDER BY sid DESC LIMIT %s,%s", ($page - 1) * $perPage, $perPage);


$row = $pdo->query($sql) //ORDER BY sid DESC 從後面排回來8 .7 .6 最新的資料開始排
    ->fetchAll();





?>
<?php include __DIR__ . '/partoals/html-head.php'; ?>
<?php include __DIR__ . '/partoals/navbar.php'; ?>
<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="Page navigation example">
                <ul class="pagination d-flex justify-content-end">

                    <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
                        <!-- disabled  a連結禁止點擊 -->
                        <a class="page-link" href="?page=1">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </li>

                    <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
                        <!-- disabled  a連結禁止點擊 -->
                        <a class="page-link" href="?page=<?= $page - 1 ?>">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </li>




                    <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                        <li class="page-item <?= $i == $page ? 'active' : '' ?>"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
                        <!-- active b4屬性 反白 -->
                    <?php endfor; ?>


                    <li class="page-item <?= $page >= $totalPages ? 'disabled' : ''  ?>">
                        <a class="page-link" href="?page=<?= $page + 1 ?>">
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </li>

                    <li class="page-item <?= $page >= $totalPages ? 'disabled' : ''  ?>">
                        <a class="page-link" href="?page=<?= $totalPages?>">
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>


    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <!-- `sid`, `name`, `email`, `mobile`, `bithday`, `created_at` -->
                        <th scope="col">sid</th>
                        <th scope="col">name</th>
                        <th scope="col">email</th>
                        <th scope="col">mobile</th>
                        <th scope="col">bithday</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($row as $r) : ?>
                        <tr>
                            <td><?= $r['sid'] ?></td>
                            <td><?= $r['name'] ?></td>
                            <td><?= $r['email'] ?></td>
                            <td><?= $r['mobile'] ?></td>
                            <td><?= $r['bithday'] ?></td>
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
<?php include __DIR__ . '/partoals/html-foot.php'; ?>