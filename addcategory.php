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


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
</head>
<script>
    function check() {
        let name = document.forms["form"]["name"].value;
        let category = document.forms["form"]["category"].value;
        let pic = document.forms["form"]["pic"].value;
        if (name == "" || category=="" || pic=="") {
            alert("กรุณากรอกให้ครบ");
            return false;
        }
    }
</script>

<style>
    div{
        line-height: 40px;
    }
</style>
<body>
    <br><br><br><br>
    <form action='addcategory_db.php' method="post" enctype="multipart/form-data" name="form" onsubmit="return check()">
        <div class="center" style="font-size: 1.5rem;">
            <div>
                <label>ชื่อ</label>
                <input type="text" name="name">
            </div>
            <div>
                <label>รูป</label>
                <input type="file" name="pic">
            </div>
            <div>
                <label>ประเภท</label>
                <select name="category" id="category">
                    <option value="1">ขนม</option>
                    <option value="2">เครื่องดื่ม</option>
                </select>
            </div>
            
            <button id="button" type="submit" name="upload">บันทึก</button>
    </form>

</body>

</html>