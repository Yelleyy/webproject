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
include("tools.php");
include("connect.php");
date_default_timezone_set("Asia/Bangkok");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
    table {
        border-collapse: collapse;
        width: fit-content;
        color: rgb(226, 82, 195);
        height: fit-content;
        background-color: #ffc9de;
    }

    /*รายการสินค้า*/
    h3 {
        font-size: 200%;
        padding: 20px;
        color: rgb(162, 104, 238);
    }

    tr,
    td {
        padding: 10px;
    }

    /* หัวตาราง */
    .head_table td {
        background-color: #fffcd1;
        color: rgb(162, 104, 238);
        font-size: 150%;
        text-align: left;
        padding: 10px;
    }
</style>
<body>
    <div class="center">
        <table>
            <tr>
                <h3>รายการสินค้า</h3>
            </tr>
            <tr class="head_table">
                <td align="center">สินค้า</td>
                <td align="right">ราคา</td>
                <td align="right">จำนวน</td>
                <td align="center">รวม</td>
            </tr>
            <?php
            foreach ($_SESSION['cart'] as $ID_Product => $qty) {
                $stmt = $pdo->prepare("select * from stock where ID_Food=$ID_Product");
                $stmt->execute();
                $row = $stmt->fetch();
                $sum    = $row['price'] * $qty;
                $sum2   = $qty;
                $total  += $sum;
                $total_qty += $sum2;

                echo "<tr>";
                echo "<td align='center'>" . $row["Food_Name"] . "</td>";
                echo "<td align='right'>" . number_format($row['price'], 2) . " บาท</td>";
                echo "<td align='center'>$qty ชิ้น</td>";
                echo "<td align='center'>" . number_format($sum, 2) . " บาท</td>";
                echo "</tr>";
            }
            echo "<tr>";
            echo "<td align='right' colspan='3' bgcolor='#F9D5E3'><b>รวม : " . number_format($total_qty) . " ชิ้น</b></td>";
            echo "<td align='center' bgcolor='#F9D5E3'>" . "<b>" . number_format($total, 2) . " บาท</b>" . "</td>";
            echo "</tr>";

            ?>
        </table>
        <?php
        $email = $_SESSION['email'];
        $stmt1 = $pdo->prepare("SELECT * from user where Email_User= '$email' ");
        $stmt1->execute();
        $row1 = $stmt1->fetch();
        $ID_User = $row1["ID_User"];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = test_input($_POST["name"]);
            $email = test_input($_POST["email"]);
            $phone = test_input($_POST["phone"]);
            $address = test_input($_POST["address"]);
        }

        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        ?>
        </br>
        <h3 class="address">กรุณากรอกรายละเอียด</h3>
        </p>
        <form method="post" class="fw-bold">
            <p>ชื่อ</p><input class="form-control" type="text" name="name" value='<?php echo $row1["Name_User"]; ?>'></p>
            <p>Email</p>
            <fieldset disabled><input class="form-control" name="email" type="email" value='<?php echo $row1["Email_User"];
                                                                                            $email = $row1["Email_User"]; ?>'></fieldset>
            <p>Phone</p> <input class="form-control" type="text" name="phone" pattern="[0]{1}[0-9]{9}" required value='<?php echo $row1["Tel_User"]; ?>'></p>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">เลือกที่อยู่</label>
                <select id="inputGroupSelect01" name="id" class="form-control">
                    <?php
                    $stmt5 = $pdo->prepare("select * from address where ID_User='$ID_User'");
                    $stmt5->execute();
                    while ($row5 = $stmt5->fetch()) {
                        echo "<option value=" . $row5["ID_Address"] . " >" . $row5["Address"] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-success " name="submit">สั่งซื้อ</button>
            <a class="btn btn-primary " href="address.php">แก้ไขที่อยู่</a>
        </form>
        <?php
        include("connect.php");
        if (array_key_exists('submit', $_POST)) {
            $dttm = Date("Y-m-d H:i:s");
            $address =  $_POST['id'];
            if (empty($address)) {
                echo "<script type='text/javascript'>";
                echo "alert('กรุณาเพิ่มที่อยู่ในการจัดส่ง..');";
                echo "window.location = 'confirm.php'; ";
                echo "</script>";
            }
            $sql1    = "INSERT into orderh (O_date,TotalAmount,TotalPrice,ID_Address,ID_User) values ('$dttm', '$total_qty', '$total','$address', '$ID_User')";

            $query1    = mysqli_query($con, $sql1);
            $sql2 = "SELECT max(ID_Order) as ID_Order from orderh where ID_User='$ID_User' and O_date='$dttm' ";
            $query2    = mysqli_query($con, $sql2);
            $row2 = mysqli_fetch_array($query2);
            $ID_Order = $row2['ID_Order'];


            foreach ($_SESSION['cart'] as $ID_Product => $qty) {
                $sql3    = "SELECT * FROM `stock` WHERE ID_Food=$ID_Product";
                $query3    = mysqli_query($con, $sql3);
                $row3    = mysqli_fetch_array($query3);
                $total    = $row3['price'] * $qty;
                $Food_Name = $row3['Food_Name'];
                $PicFood = $row3['PicFood'];
                $sql4    = "INSERT into detail (foodname,price,amount,ID_Food,ID_Order) values ('$Food_Name','$total','$qty','$ID_Product', '$ID_Order')";
                $query4    = mysqli_query($con, $sql4);
            }
            echo "<script type='text/javascript'>";
            echo "alert('สั่งซื้อเรียบร้อย..');";
            echo "window.location = 'index.php'; ";
            echo "</script>";
        }
        ?>

</body>


</html>