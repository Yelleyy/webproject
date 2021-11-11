<meta charset="UTF-8" />
<?php
session_start();
include('connect.php');

$Food_Name = $_POST['Food_Name'];
$price =  $_POST['price'];
$PicFood =  $_POST['PicFood'];
$category =  $_POST['category'];
$ID_Food = $_REQUEST["ID"];

$stmt = $pdo->prepare("UPDATE stock SET Food_Name='$Food_Name',price='$price',PicFood='$PicFood',category='$category'
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