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
include("admintools.php");
include("connect.php");
$stmt2 = $pdo->prepare("SELECT * FROM orderh");
$stmt2->execute();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    div {
        line-height: 40px;
    }
</style>

<body>
    <br><br><br><br>
    <form action='addorder_db.php' method="post" enctype="multipart/form-data">
        <div class="center" style="font-size: 1.5rem;">
            <div>
                <label>ออเดอร์ไอดี</label>
                <input type="number" name="ID_Order">
            </div>
            <div>
                <label>วันที่สั่ง</label>
                <input type="date" name="O_date">
            </div>
            <div>
                <label>จำนวน</label>
                <input type="number" name="TotalAmount">
            </div>
            <div>
                <label>ราคารวม</label>
                <input type="number" name="TotalPrice">
            </div>
            <div>
                <label>สถานะ</label>
                <input type="text" name="status">
            </div>
            <div>
                <label>ไอดีที่อยู่</label>
                <input type="number" name="ID_Address">
            </div>
            <div>
                <label>ไอดีผู้ใช้</label>
                <input type="number" name="ID_User">
            </div>
            <button type="submit" name="upload">บันทึก</button>
    </form>

</body>

</html>