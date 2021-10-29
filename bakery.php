<?php
include "tools.php";
include "connect.php";
$stmt = $pdo->prepare("select * from categoryf where category='bakery'");
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
        <h1 style="font-size: 60px;">หมวดขนม</h1>
        <ul class="auto-grid">
            <?php while ($row = $stmt->fetch()) : ?>
                <a href="buyfood.php?ID_CATF=<?= $row[0] ?>">
                    <li class="grid"><img src="img/<?= $row[2]; ?>" width="100%"><?= $row[1]; ?>
                    </li>
                </a>
            <?php endwhile; ?>
        </ul>
    </div>

</body>
<br>
<footer class="site-footer">
    <div class="centerf">
        <span style="font-size: 1.3rem;">Copyright © 2021 All Rights Reserved by <a href="index.php" style="color: black;">GYP Dessert </a> <br>Phone : 099-XXX-XXXX<br> Location : XX/XXX บ้าน XX กรุงเทพมหานคร 10800 </span>
    </div>
</footer>

</html>