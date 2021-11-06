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
            <table class="rwd-table" style="min-width: 845px">
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
                while ($row =  $stmt1->fetch()) {
                    echo "<tr align='center'>";
                    echo "<td  data-th=ID-Order>" . $row["ID_Order"] . "</td>";
                    echo "<td data-th=วันที่>" . $row["O_date"] . "</td>";
                    echo "<td data-th=จำนวนทั้งหมด>" . $row["TotalAmount"] . " ชิ้น</td>";
                    echo "<td data-th=ราคารวม>" .  number_format($row["TotalPrice"], 2) . " บาท</td>";
                    echo "<td data-th=รายละเอียดออเดอร์><a href='detail.php?ID=$row[0]'>ดูรายการ</a></td> ";
                    echo "<td data-th=สถานะ align='center'>";
                    if ($row["status"] == "work") {
                        echo "<a href='invoicerider.php?ID_Order=$row[0]'  class='btn btn-primary mt-1 mb-1' type='button' >
                                              <span class='spinner-border spinner-border-sm' role='status' ></span>
                                              กำลังดำเนินการ
                                            </a>";
                    } else if ($row["status"] == "cancel") {
                        echo "<a href='#!'  class='btn btn-danger  mt-1 mb-1'>ยกเลิกแล้ว</a>";
                    } else {
                        echo   "<a href='#!'  class='btn btn-success  mt-1 mb-1'>เสร็จสิ้นแล้ว</a>";
                    }
                    echo "</td>";
                    echo "<td align='center'> &nbsp;";
                    if ($row["status"] == "work") {
                        echo "<a href='changecus.php?ID_Order=$row[0]' onclick=\"return confirm('ยืนยันการยกเลิก... !!!')\" 
                                              class='btn btn-danger mt-1 mb-1' type='button' >ยกเลิกออเดอร์</a>";
                    }
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
        <a type="submit" href="index.php" name="button" id="button" class='btn btn-success' />กลับหน้าแรก</a>
    </div>
</body>

</html>