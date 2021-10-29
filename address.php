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
    <div class="container">
        <br>
        <div class="row">
            <div class="col-10">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">ที่อยู่จัดส่ง</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
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
                                        echo "<td><a href='deladdress.php?ID=$row[0]' onclick=\"return confirm('คุณแน่ใจแล้วหรอที่จะลบ !!!')\" class='btn btn-outline-danger'>ลบ</a></td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <a type="submit" href="confirm.php" name="button" id="button" class='btn btn-success' />ยืนยัน</a>
        <a type="submit" href="address_add.php" class='btn btn-primary' />เพิ่มที่อยู่</a>
    </div>

</body>

</html>