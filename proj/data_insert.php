<?php
include __DIR__ . '/partoals/init.php';
$title = '新增資料';
?>
<?php include __DIR__ . '/partoals/html-head.php'; ?>
<?php include __DIR__ . '/partoals/navbar.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-md-6">

            <div class="card" style="width: 18rem;">

                <div class="card-body">
                    <h5 class="card-title">新增資料</h5>
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
<?php include __DIR__ . '/partoals/scripts.php'; ?>
<?php include __DIR__ . '/partoals/html-foot.php'; ?>