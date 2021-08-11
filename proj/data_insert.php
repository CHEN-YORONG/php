<?php
include __DIR__ . '/partoals/init.php';
$title = '新增資料';
?>
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
                    <h5 class="card-title">新增資料</h5>
                    <form name="form1" onsubmit="checkForm();return false;">
                        <div class="form-group">
                            <label for="name">name *</label>
                            <input type="text" class="form-control" id="name" name="name">
                            <small class="form-text "></small>
                        </div>

                        <div class="form-group">
                            <label for="email">email *</label>
                            <input type="text" class="form-control" id="email" name="email">
                            <small class="form-text "></small>
                        </div>

                        <div class="form-group">
                            <label for="mobile">mobile</label>
                            <input type="text" class="form-control" id="mobile" name="mobile">
                            <small class="form-text "></small>
                        </div>

                        <div class="form-group">
                            <label for="bithday">bithday</label>
                            <input type="text" class="form-control" id="bithday" name="bithday">
                            <small class="form-text "></small>
                        </div>

                        <button type="submit" class="btn btn-primary">新增</button>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
<?php include __DIR__ . '/partoals/scripts.php'; ?>

<script>
    //html5作法 <input   require 必填 >
    const email_re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    const mobile_re = /^09\d{2}-?\d{3}-?\d{3}-?/;

    const name = document.querySelector('#name');
    const email = document.querySelector('#email');



    function checkForm() {
        //TODO:欄位的外觀要回復成原來的狀態
        name.nextElementSibling.innerHTML = ''; //'' 不顯示  <SMALL>
        name.style.border = '1px #CCCCCC solid';
        email.nextElementSibling.innerHTML = '';
        email.style.border = '1px #CCCCCC solid';

        //TODO: 資料欄位檢查
        //TODO:如果格式不符 要有欄位提示的不同外觀


        let isPass = true;
        // if (name.value.length < 2) {
        //     isPass = false;
        //     name.nextElementSibling.innerHTML = '請填寫正確的名字'; //nextElementSibling 下一個  <SMALL>
        //     name.style.border = '1px red solid';
        // }
        // if (!email_re.test(email.value)) {
        //     isPass = false;
        //     email.nextElementSibling.innerHTML = '請填寫正確的EMAIL';
        //     email.style.border = '1px red solid';
        // }
        if (isPass) {

            const fd = new FormData(document.form1);
            fetch('data-insert-api.php', {
                    method: 'POST',
                    body: fd
                }).then(r => r.json())
                .then(obj => {
                    console.log(obj);
                })
                .catch(error => {
                    console.log('error:', error);
                });
        }


    }
</script>



<?php include __DIR__ . '/partoals/html-foot.php'; ?>