<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border-collapse: collapse;
            
        }
        tr{
            border: 1px solid black;
        }
    </style>
</head>

<body>
<table >
    <?php for($i=1 ; $i<=10; $i++){ ?>
    <tr>
        <td><?= "$i * $i =".$i*$i ?></td>
        <!-- <?= $i ?>  =    <?php echo $i ?>     .:接    -->
    </tr>
    <?php } ?>
</table>


</body>

</html>