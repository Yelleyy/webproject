<meta charset="UTF-8" />
<?php
session_start();
include('connect.php');

$Name_User = $_POST['Name_User'];
$Email_User =  $_POST['Email_User'];
$Pass_User =  $_POST['Pass_User'];
$Tel_User =  $_POST['Tel_User'];
$ID_User = $_REQUEST["ID"];

$stmt = $pdo->prepare("UPDATE user SET Name_User='$Name_User',Email_User='$Email_User',Pass_User='$Pass_User',Tel_User='$Tel_User'
 WHERE ID_User=$ID_User ");
$stmt->execute();

if ($stmt) {
    echo "<script type='text/javascript'>";
    echo  "alert('แก้ไขเรียบร้อยเรียบร้อย');";
    echo "window.location='listuser.php';";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "window.location='listuser.php';";
    echo "</script>";
}
mysqli_close($con);
?>