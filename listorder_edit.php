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
$ID_Order = $_REQUEST["ID"];
$stmt1 = $pdo->prepare("SELECT * FROM orderh WHERE ID_Order = '$ID_Order'");
$stmt1->execute();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body >
    <br><br><br><br>
    <form action='listorder_update.php?ID=<?php echo "$ID_Order"; ?>' method="post" enctype="multipart/form-data">
        <?php $row1 = $stmt1->fetch(); ?>
        <div class="center"  style="font-size: 1.5rem;">
            <div>
                <label>ออเดอร์ไอดี</label>
                <input type="number" name="ID_Order" value=<?php echo $row1['ID_Order']; ?>>
            </div>
            <div>
                <label>วันที่สั่ง</label>
                <input type="date" name="O_date" value=<?php echo $row1['O_date']; ?>>
            </div>
            <div>
                <label>จำนวน</label>
                <input type="number" name="TotalAmount" value=<?php echo $row1['TotalAmount']; ?>>
            </div>
            <div>
                <label>ราคารวม</label>
                <input type="number" name="TotalPrice" value=<?php echo $row1['TotalPrice']; ?>>
            </div>
            <div>
                <label>สถานะ</label>
                <input type="text" name="status" value=<?php echo $row1['status']; ?>>
            </div>
            <div>
                <label>ไอดีที่อยู่</label>
                <input type="number" name="ID_Address" value=<?php echo $row1['ID_Address']; ?>>
            </div>
            <div>
                <label>ไอดีผู้ใช้</label>
                <input type="number" name="ID_User" value=<?php echo $row1['ID_User']; ?>>
            </div>
            <button type="submit" name="upload">แก้ไข</button>
    </form>

</body>

</html>