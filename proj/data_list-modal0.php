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


//要有資料才能取讀該頁的資料
$row = [];
if ($totalRows != 0) {

    //總共有幾頁才能生出分業按鈕
    $totalPages = ceil($totalRows / $perPage); //ceil() 無條件進位
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

    $sql = sprintf("SELECT * FROM address_book ORDER BY sid DESC LIMIT %s,%s", ($page - 1) * $perPage, $perPage);


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
                        <a class="page-link" href="?page=<?= $page - 1 ?>">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </li>




                    <?php for ($i = $page - 5; $i <= $page + 5; $i++) :
                        if ($i >= 1 and $i <= $totalPages) :
                    ?>

                            <li class="page-item <?= $i == $page ? 'active' : '' ?>"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
                            <!-- active b4屬性 反白 -->
                    <?php
                        endif;
                    endfor; ?>

                    <!-- 下一頁 -->
                    <li class="page-item <?= $page >= $totalPages ? 'disabled' : ''  ?>">
                        <a class="page-link" href="?page=<?= $page + 1 ?>">
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
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-warning del1btn" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">刪除注意</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary modal-del-btn">delete</button>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__ . '/partoals/scripts.php'; ?>

<script>
    const myTable = document.querySelector('table');
    const modal = $('#exampleModal');

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
    
    let willDeleteID=0;

    $('.del1btn').on('click',function(event){
        willDeleteId = event.target.closest('tr').dataset.sid;
        console.log(willDeleteId);
        modal.find('.modal-body').html(`確定要刪除編號為 ${willDeleteId}的資料嗎？`);
        
    })

    modal.find('.modal-del-btn').on('click',function(event){
        location.href=(`data-delete.php?sid=${willDeleteId}`)
    })

    //modal 一開始顯示觸發
    modal.on('show.bs.modal',function(event){
        // console.log(event.target);
    });
</script>


<?php include __DIR__ . '/partoals/html-foot.php'; ?>