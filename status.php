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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="./table.css">
</head>
<style>
    a:visited,a:link{
        color: #fff2dc;
        text-decoration: none;
        font-weight: bolder;
    }
    .center{
        max-width: 80%;
    }
</style>
<body>
    <br>
    <?php
    $email = $_SESSION["email"];
    $stmt = $pdo->prepare("SELECT * from user where Email_User= '$email' ");
    $stmt->execute();
    $r = $stmt->fetch();
    $id = $r["ID_User"];
    $stmt1 = $pdo->prepare("SELECT * from orderh where  ID_User='$id' ");
    $stmt1->execute();
    ?>
    <br>
    <div class="center">
        <h1>รายการคำสั่งซื้อ</h1>

        <div>
            <table class="rwd-table" >
                <thead>
                    <tr align='center'>
                        <th>ID-Order</th>
                        <th>วันที่</th>
                        <th>จำนวนทั้งหมด</th>
                        <th>ราคารวม</th>
                        <th>รายละเอียดออเดอร์</th>
                        <th>สถานะ</th>
                    </tr>
                </thead>
                <?php
                while ($row = $stmt1->fetch()) {
                    echo "<tr align='center'>";
                    echo "<td data-th=ID-Order>" . $row["ID_Order"] . "</td>";
                    echo "<td data-th=วันที่>" . $row["O_date"] . "</td>";
                    echo "<td data-th=จำนวนทั้งหมด>" . $row["TotalAmount"] . " ชิ้น</td>";
                    echo "<td data-th=ราคารวม>" .  number_format($row["TotalPrice"], 2) . " บาท</td>";
                    echo "<td data-th=รายละเอียดออเดอร์><a href='detail.php?ID=$row[0]' style='background-color: #fffcd1;
                    color: #ff00f2;
                    padding: 3px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    border-radius: 10px;
                    font-size: 15px' >ดูรายการ</a></td> ";
                    echo "<td data-th=สถานะ align='center'>";
                    if ($row["status"] == "work") {
                        echo "<a href='#!' type='button'>กำลังดำเนินการ</a>";
                    } else if ($row["status"] == "cancel") {
                        echo "<a href='#!'>ยกเลิกแล้ว</a>";
                    } else {
                        echo   "<a href='#!'>เสร็จสิ้นแล้ว</a>";
                    }
                    echo "</td>";
                    echo "<td align='center'> &nbsp;";
                    if ($row["status"] == "work") {
                        echo "<a href='changecus.php?ID_Order=$row[0]' onclick=\"return confirm('ยืนยันการยกเลิก... !!!')\" 
                                     type='button' style='background-color: #d0312d;
                                     color: white;
                                     padding: 5px;
                                     text-align: center;
                                     text-decoration: none;
                                     display: inline-block;
                                     border-radius: 10px;'>ยกเลิกออเดอร์</a>";
                    }
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
        <a type="submit" href="index.php" 
        style="color:brown">กลับหน้าแรก</a>
    </div>
</body>

</html>