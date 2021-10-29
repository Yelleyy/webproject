<?php
session_start();
include "tools.php";
include "connect.php";
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header('location: login.php');
}
$ID_CATF = $_REQUEST["ID_CATF"];
$stmt = $pdo->prepare("select * from stock where ID_CATF=$ID_CATF");
$stmt->execute();
$stmt1 = $pdo->prepare("select * from categoryf where ID_CATF=$ID_CATF");
$stmt1->execute();

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
        <?php $row1 = $stmt1->fetch() ?>
        <h1 style="font-size: 60px;">เมนู<?= $row1[1] ?></h1>
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