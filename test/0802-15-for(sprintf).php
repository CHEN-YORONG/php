<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;

        }

        tr {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <table>
        <?php for ($i = 1; $i <= 10; $i++) : ?>
            <tr>
                <td><?= sprintf('%s * %s = %s ',   $i,$i,$i*$i) ?></td>
                <!-- '%s * %s = %s '  ,  $i,$i,$i*$i      一個對一個 前面是'%s' -->
            </tr>
        <?php endfor ?>
        <!-- { :       } endfor -->
    </table>


</body>

</html>