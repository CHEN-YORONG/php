<?php 
    include __DIR__.'/partoals/init.php';
    $title = '登入';

    if(isset($_SESSION['user'])){
        header('Location: index_.php'); //redirect 直接跳轉到別的頁面 PHP
        exit;
    }
    ?>

<?php include __DIR__. '/partoals/html-head.php'; ?>
<?php include __DIR__. '/partoals/navbar.php'; ?>
    <style>
        form .form-group small {
            color: red;
            display: none;
        }
    </style>
<div class="container">
    <div class="row">
        <div class="col-md-6">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">登入</h5>
                    <form name="form1" onsubmit="sendForm(); return false;">
                        <div class="form-group">
                            <label for="account">帳號</label>
                            <input type="text" class="form-control" id="account" name="account">
                            <small class="form-text">請填寫帳號</small>
                        </div>
                        <div class="form-group">
                            <label for="password">密碼</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <small class="form-text">請填寫密碼</small>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">登入</button>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>
<?php include __DIR__ . '/partoals/scripts.php'; ?>

<script>
    function sendForm(){
        let isPass = true;
        document.form1.account.nextElementSibling.style.display = 'none'; //回復到原來的狀態 不燃都還是紅色的
        document.form1.password.nextElementSibling.style.display = 'none'; //回復到原來的狀態 不燃都還是紅色的
        if(! document.form1.account.value){
            document.form1.account.nextElementSibling.style.display = 'block';
            isPass = false;
        }
        if(! document.form1.password.value){
            document.form1.password.nextElementSibling.style.display = 'block';
            isPass = false;
        }

        if(isPass) {
            const fd = new FormData(document.form1);

            fetch('login-api.php', {
                method: 'POST',
                body: fd
            
            
            }).then(r=>r.json())
            .then(obj=>{
                console.log('result',obj);
                if(obj.success){
                    location.href = 'index_.php'; //跳轉到別的葉面 JS
                }else{
                    alert(obj.error);
                }
            })


        }
    }

</script>

<?php include __DIR__ . '/partoals/html-foot.php'; ?>