<?php
include "tools.php";
include "connect.php";
$stmt = $pdo->prepare("select * from stock where category='coffee'");
$stmt->execute();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="grid.css">
</head>


<body class="grid">
    <div class="center">
        <h1 style="font-size: 60px;">เมนูกาแฟ</h1>
        <ul class="auto-grid">
            <?php while ($row = $stmt->fetch()) : ?>
                <li class="grid"><img src="img/<?= $row[4]; ?>" width="100%"><?= $row[1]; ?>
                    <p>ราคา <?= $row[3]; ?> บาท</p><a href="cart.php?ID_Product=<?= $row[0] ?>&op=add">
                        <p>ซื้อ</p>
                </li></a>
            <?php endwhile; ?>
        </ul>
    </div>
</body>

</html>