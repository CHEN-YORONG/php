<?php
include __DIR__ . '/partoals/init.php';

$title = '資料列表';


$row = $pdo->query("SELECT * FROM address_book LIMIT 8")
    ->fetchAll();





?>
<?php include __DIR__ . '/partoals/html-head.php'; ?>
<?php include __DIR__ . '/partoals/navbar.php'; ?>
<div class="container">
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
            <?php foreach($row as $r):?>
                <h2><?= $r['name'] ?></h2>
            <?php endforeach; ?>
        </div> -->
        

    </div>
</div>
<?php include __DIR__ . '/partoals/scripts.php'; ?>
<?php include __DIR__ . '/partoals/html-foot.php'; ?>