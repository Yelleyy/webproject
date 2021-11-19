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
$page=$_GET["page"];
if(!isset($_GET["page"])){
    $page=0;
}
else{
    $page=$_GET["page"];
}
$stmt = $pdo->prepare("select * from stock where ID_CATF=$ID_CATF limit 4 offset $page");
$stmt->execute();

$stmt1 = $pdo->prepare("select * from categoryf where ID_CATF=$ID_CATF");
$stmt1->execute();

$stmt2 = $pdo->prepare("select COUNT(*) from stock where ID_CATF=$ID_CATF");
$stmt2->execute();
$row2=$stmt2->fetch();
$count=ceil($row2[0]/4);
for ($i=0; $i <$count ; $i++) { 
    echo "<br><div class='center'><a class='center' href='buyfood.php?ID_CATF=".$ID_CATF."&page=".($i*4)."' style='border: 3px solid black;' >หน้าที่ ".($i+1)." "."</a></div>";
}
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
                <li class="grid"><img src="img/<?= $row[3]; ?>" width="100%"><?= $row[1]; ?>
                    <p>ราคา <?= $row[2]; ?> บาท</p><a href="cart.php?ID_Product=<?= $row[0] ?>&op=add">
                        <p>ซื้อ</p>
                </li></a>
            <?php endwhile; ?>
        </ul>
    </div>

</body>

</html>