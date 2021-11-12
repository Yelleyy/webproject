<meta charset="UTF-8" />
<?php
session_start();
include('connect.php');

$Food_Name = $_POST['Food_Name'];
$amount =  $_POST['amount'];
$price =  $_POST['price'];
$PicFood =  $_POST['PicFood'];
$ID_CATF =  $_POST['catf'];

$ID_Food= $_REQUEST["ID"];

$stmt = $pdo->prepare("UPDATE stock SET Food_Name='$Food_Name',amount='$amount',price='$price',PicFood='$PicFood',ID_CATF='$ID_CATF'
 WHERE ID_Food=$ID_Food ");
$stmt->execute();

if ($stmt) {
    echo "<script type='text/javascript'>";
    echo  "alert('แก้ไขเรียบร้อยเรียบร้อย');";
    echo "window.location='listfood.php';";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "window.location='listfood.php';";
    echo "</script>";
}
mysqli_close($con);
?>