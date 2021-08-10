<?php
include __DIR__ . '/partoals/init.php';
$title = '新增資料';
?>
<?php include __DIR__ . '/partoals/html-head.php'; ?>
<?php include __DIR__ . '/partoals/navbar.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">新增資料</h5>
                    <form name="form1" onsubmit="checkForm();return false;">
                        <div class="form-group">
                            <label for="name">name</label>
                            <input type="text" class="form-control" id="name" name="name" >
                            <small  class="form-text text-muted"></small>
                        </div>

                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="text" class="form-control" id="email" name="email">
                            <small  class="form-text text-muted"></small>
                        </div>

                        <div class="form-group">
                            <label for="mobile">mobile</label>
                            <input type="text" class="form-control" id="mobile" name="mobile">
                            <small  class="form-text text-muted"></small>
                        </div>

                        <div class="form-group">
                            <label for="bithday">bithday</label>
                            <input type="text" class="form-control" id="bithday" name="bithday">
                            <small  class="form-text text-muted"></small>
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
function checkForm(){


}

</script>



<?php include __DIR__ . '/partoals/html-foot.php'; ?>