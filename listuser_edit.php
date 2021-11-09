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
$ID_User = $_REQUEST["ID"];
$stmt1 = $pdo->prepare("SELECT * FROM user WHERE ID_User = '$ID_User'");
$stmt1->execute();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body >
    <br><br><br><br>
    <form action='listuser_update.php?ID=<?php echo "$ID_User"; ?>' method="post" enctype="multipart/form-data">
        <?php $row1 = $stmt1->fetch(); ?>
        <div class="center"  style="font-size: 1.5rem;">
            <div>
                <label>ชื่อ</label>
                <input type="text" name="Name_User" value=<?php echo $row1['Name_User']; ?>>
            </div>
            <div>
                <label>อีเมล</label>
                <input type="text" name="Email_User" value=<?php echo $row1['Email_User']; ?>>
            </div>
            <div>
                <label>รหัสผ่าน</label>
                <input type="text" name="Pass_User" value=<?php echo $row1['Pass_User']; ?>>
            </div>
            <div>
                <label>เบอร์โทร</label>
                <input type="text" name="Tel_User" value=<?php echo $row1['Tel_User']; ?>>
            </div>
            <button type="submit" name="upload">แก้ไข</button>
    </form>

</body>

</html>