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
$stmt2 = $pdo->prepare("SELECT * FROM categoryf");
$stmt2->execute();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <br><br><br><br>
    <form action='listfood_update.php?ID=<?php echo "$ID_Food"; ?>' method="post" enctype="multipart/form-data">
        <?php $row1 = $stmt1->fetch(); ?>
        <div class="center" style="font-size: 1.5rem;">
            <div>
                <label>ชื่อ</label>
                <input type="text" name="Food_Name" value=<?php echo $row1[1]; ?>>
            </div>
            <div>
                <label>ราคา</label>
                <input type="text" name="price" value=<?php echo $row1[3]; ?>>
            </div>
            <div>
                <label>รูป</label>
                <input type="text" name="PicFood" value=<?php echo $row1[4]; ?>>
            </div>
            <div>
                <label>หมวดหมู่</label>
                <select id="inputState" name="catf">
                    <?php
                    while ($row2 =$stmt2->fetch()) {
                        echo "<option value=" . $row2["ID_CATF"] . " >" . $row2["CATF_Name"] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" name="upload">แก้ไข</button>
    </form>

</body>

</html>