<?php
// 資料表要新增一個存放圖片檔明的欄位
// ALTER TABLE `members` ADD `avatar` VARCHAR(255) NULL DEFAULT '' AFTER `id`;



include __DIR__ . '/partoals/init.php';
$title = '修改個人資料';


//查看有沒有登入
if(! isset($_SESSION['user'])){
    header('Location: data-list.php');
    exit;
}



$sql = "SELECT * FROM `members` WHERE id=". intval($_SESSION['user']['id']);

$row = $pdo->query($sql)->fetch();

if (empty($row)) {
    header('Location:index_.php');
    exit;
}



?>



<!-- copy insert.php -->
<?php include __DIR__ . '/partoals/html-head.php'; ?>
<?php include __DIR__ . '/partoals/navbar.php'; ?>
<style>
    form .form-group small {
        color: red;
    }
</style>





<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">修改資料</h5>
                    <form name="form1" onsubmit="checkForm();return false;">
                        
                        <div class="form-group">
                            <label for="name">大頭貼</label>
                            <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*" > 
                            <?php if(empty($row['avatar'])): ?>
                                <!-- 預設大頭貼 -->
                            <?php else: ?>
                                <!-- 顯示原本的大頭貼 -->
                            <?php endif; ?>
                            <img src="<?= $row['avatar'] ?>" alt="">
                        </div>

                        <div class="form-group">
                            <!-- disabled 沒有功能 -->
                            <label for="email">email (帳號不能修改)</label>
                            <input type="text" class="form-control"  disabled
                            value="<?= htmlentities($row['email']) ?>"> <!-- value 顯示資料 htmlentities()特殊字元顯示 -->
                            <small class="form-text "></small>
                        </div>
                        
                        <div class="form-group">
                            <label for="mobile">暱稱</label>
                            <input type="text" class="form-control" id="nickname" name="nickname" value="<?= htmlentities($row['nickname']) ?>"> <!-- value 顯示資料 -->
                            <small class="form-text "></small>
                        </div>

                        <button type="submit" class="btn btn-primary">修改</button>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
<?php include __DIR__ . '/partoals/scripts.php'; ?>

<script>
    function checkForm() {

            const fd = new FormData(document.form1);
            fetch('profile-edit-api.php', {
                    method: 'POST',
                    body: fd
                }).then(r => r.json())
                .then(obj => {
                    console.log(obj);
                    if (obj.success) {
                        alert('修改成功');
                    } else {
                        alert(obj.error);
                    }
                })
                .catch(error => {
                    console.log('error:', error);
                });
        }


    
</script>



<?php include __DIR__ . '/partoals/html-foot.php'; ?>