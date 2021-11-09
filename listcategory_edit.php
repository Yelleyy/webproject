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
$ID_CATF = $_REQUEST["ID"];
$stmt1 = $pdo->prepare("SELECT * FROM categoryf WHERE ID_CATF = '$ID_CATF'");
$stmt1->execute();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body >
    <br><br><br><br>
    <form action='listcategory_update.php?ID=<?php echo "$ID_User"; ?>' method="post" enctype="multipart/form-data">
        <?php $row1 = $stmt1->fetch(); ?>
        <div class="center"  style="font-size: 1.5rem;">
        <div>
                <label>ไอดี</label>
                <input type="text" name="ID_CATF" value=<?php echo $row1['ID_CATF']; ?>>
            </div>
            <div>
                <label>ชื่อ</label>
                <input type="text" name="CATF_Name" value=<?php echo $row1['CATF_Name']; ?>>
            </div>
            <div>
                <label>รูป</label>
                <input type="text" name="Pic" value=<?php echo $row1['Pic']; ?>>
            </div>
            <button type="submit" name="upload">แก้ไข</button>
    </form>

</body>

</html>