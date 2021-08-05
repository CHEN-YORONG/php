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

        td {
            width: 30px;
            height: 30px;
        }
    </style>
</head>

<body>
    <table border="1">
        <?php for ($i = 0; $i < 256; $i += 17) : ?>
            <tr>
            <?php for ($k = 0; $k < 256; $k += 17) : ?>
                <td style="background-color: #<?= sprintf("%'02X00%'02X", $i,$k) ?>;"></td>
                <!-- %x 16進位 -->
                <!-- " % '.02 X "    0 補0     2 2位-->
                <?php endfor ?>
            </tr>
        <?php endfor ?>
        <!-- { :    ,   } endfor -->
    </table>


</body>

</html>