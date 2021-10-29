<?php
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="apple-touch-icon" sizes="144x144" href="img/apple-icon-144x144.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/favicon-96x96.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="img/ms-icon-144x144.png">
    <link rel="manifest" href="img/manifest.json">
    <title>GYP Dessert</title>
</head>
<style>
    li {
        margin-right: 15px;
    }
</style>

<body class="nav">
    <nav>
        <ul class="links" id="nav">
            <li><strong><a href="index.php">GYP DESSERT</a></li></strong>
            <li><a href="index.php">หน้าหลัก</a></li>

            <?php if (isset($_SESSION['email'])) : ?>
                <li><a href="coffee.php">กาแฟ</a></li>
                <li><a href="bakery.php">ขนม</a></li>
                <li><a href="tea.php">ชา</a></li>
                <li><a href="icecream.php">ไอศกรีม</a></li>
                <li class="right"  style="font-weight: bold;">
                    <a href="index.php?logout='1'" style="color: red;">ออกจากระบบ</a>
                </li>
                <li class="right">
                    <a class="right" href="invoice.php">ตรวจสอบสถานะ</a>
                </li>
                <li class="right">
                    <a href="profile.php" style="font-weight: bold;">
                        <?php echo "ยินดีต้อนรับคุณ " . $_SESSION['email']; ?>
                    </a>
                </li>
            <?php else : ?>
                
                <li class="right"><a href="register.php">สมัครสมาชิก</a></li>
                <li class="right"><a href="login.php">ล็อกอิน</a></li>
            <?php endif ?>
            <li class="icon">
                <a onclick="nav()">&#9776;</a>
            </li>
        </ul>
    </nav>
</body>
<script src="./nav.js"></script>

</html>