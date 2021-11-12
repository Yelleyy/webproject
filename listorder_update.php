<meta charset="UTF-8" />
<?php
session_start();
include('connect.php');

$ID_Order = $_REQUEST['ID_Order'];
$O_date =  $_POST['O_date'];
$TotalAmount =  $_POST['TotalAmount'];
$TotalPrice =  $_POST['TotalPrice'];
$status = $_POST['status'];
$ID_Address = $_POST['ID_Address'];
$ID_User = $_POST["ID_User"];

$stmt = $pdo->prepare("UPDATE orderh SET ID_Order='$ID_Order',O_date='$O_date',TotalAmount='$TotalAmount',TotalPrice='$TotalPrice',
status='$status',ID_Address='$ID_Address',ID_User='$ID_User'
 WHERE ID_Order=$ID_Order ");
$stmt->execute();

if ($stmt) {
    echo "<script type='text/javascript'>";
    echo  "alert('แก้ไขเรียบร้อยเรียบร้อย');";
    echo "window.location='listorder.php';";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "window.location='listorder.php';";
    echo "</script>";
}
mysqli_close($con);
?>