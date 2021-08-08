<?php $title = '登入'; ?>
<?php include __DIR__ . '/partoals/html-head.php'; ?>
<?php include __DIR__ . '/partoals/navbar.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-md-6">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">登入</h5>
                    <form name="form1">
                        <div class="form-group">
                            <label for="account">帳號</label>
                            <input type="text" class="form-control" id="account" name="account">
                            <small  class="form-text"></small>
                        </div>
                        <div class="form-group">
                            <label for="password">密碼</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">登入</button>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>
<?php include __DIR__ . '/partoals/scripts.php'; ?>
<?php include __DIR__ . '/partoals/html-foot.php'; ?>