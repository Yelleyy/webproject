<?php
session_start();
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header('location: login.php');
}
if (!isset($_SESSION['email'])) {
    echo "<script type='text/javascript'>";
    echo "alert('กรุณาเข้าสู่ระบบ');";
    echo "window.location = 'login.php'; ";
    echo "</script>";
}
include("connect.php");
$ID_Food = $_REQUEST["ID"];
$stmt1 = $pdo->prepare("SELECT * FROM stock WHERE ID_Food = '$ID_Food'");
$stmt1->execute();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body >
    <br><br><br><br>
    <form action='listfood_update.php?ID=<?php echo "$ID_Food"; ?>' method="post" enctype="multipart/form-data">
        <?php $row1 = $stmt1->fetch(); ?>
        <div class="center"  style="font-size: 1.5rem;">
            <div>
                <label>ชื่อสินค้า</label>
                <input type="text" name="Food_Name" value=<?php echo $row1['Food_Name']; ?>>
            </div>
            <div>
                <label>ราคา</label>
                <input type="text" name="price" value=<?php echo $row1['price']; ?>>
            </div>
            <div>
                <label>ชื่อรูปภาพ</label>
                <input type="text" name="PicFood" value=<?php echo $row1['PicFood']; ?>>
                
            </div>
            <div><img src='img/<?=$row1['PicFood']?>' width='100'></div>
            
            <div>
                <label>หมวดหมู่</label>
                <input type="text" name="category" value=<?php echo $row1['category']; ?>>
            </div>
            <button type="submit" name="upload">แก้ไข</button>
    </form>

</body>

</html>