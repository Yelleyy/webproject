<?php
session_start();
if (!isset($_SESSION['email'])) {
    echo "<script type='text/javascript'>";
    echo "alert('กรุณาเข้าสู่ระบบ');";
    echo "window.location = 'login.php'; ";
    echo "</script>";
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header('location: login.php');
}
include("connect.php");
include("tools.php");
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="./table.css">
</head>

<body>
    <br>
    <?php
    $email = $_SESSION["email"];
    $stmt1 = $pdo->prepare("SELECT * from user where Email_User= '$email'");
    $stmt1->execute();
    $r    = $stmt1->fetch();
    $idd = $r["ID_User"];
    $stmt = $pdo->prepare("SELECT * from address where ID_User='$idd'");
    $stmt->execute();
    ?>
    <br>
    <br>
    <div class="center">
        <h4>ที่อยู่จัดส่ง</h4>

        <div class="rwd-table">
            <table id="example" class="display" style="min-width: 845px">
                <thead>
                    <tr align='center'>
                        <th>ID-Address</th>
                        <th>ที่อยู่</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row =  $stmt->fetch()) {
                        echo "<tr align='center'>";
                        echo "<td >" . $row["ID_Address"] . "</td>";
                        echo "<td>" . $row["Address"] . "</td>";
                        echo "<td><a href='deladdress.php?ID=$row[0]' onclick=\"return confirm('คุณแน่ใจแล้วหรอที่จะลบ !!!')\" id='button'>ลบ</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    <a type="submit" href="confirm.php" name="button" id="button" >ยืนยัน</a>
    <a type="submit" href="address_add.php" id="button"ค >เพิ่มที่อยู่</a>
    </div>

</body>

</html>