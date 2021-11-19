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
$stmt2 = $pdo->prepare("SELECT * FROM categoryf");
$stmt2->execute();

?>
<!DOCTYPE html>
<html lang="en">
<script>
    function check() {
        let name = document.forms["form"]["name"].value;
        let price = document.forms["form"]["price"].value;
        let pic = document.forms["form"]["pic"].value;
        if (name == "" || price=="" || pic=="") {
            alert("กรุณากรอกให้ครบ");
            return false;
        }
    }
</script>

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
    <form action='addfood_db.php' method="post" enctype="multipart/form-data" name="form"  onsubmit="return check()">
        <div class="center" style="font-size: 1.5rem;">
            <div>
                <label>ชื่อ</label>
                <input type="text" name="name">
            </div>
            <div>
                <label>ราคา</label>
                <input type="text" name="price">
            </div>
            <div>
                <label>รูป</label>
                <input type="file" name="pic">
            </div>

            <div>
                <label>หมวดหมู่</label>
                <select name="catf">>
                    <?php
                    while ($row2 = $stmt2->fetch()) {
                        echo "<option value=" . $row2["ID_CATF"] . " >" . $row2["CATF_Name"] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <button id="button" type="submit" name="upload" >บันทึก</button>
    </form>

</body>

</html>