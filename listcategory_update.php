<meta charset="UTF-8" />
<?php
session_start();
include('connect.php');

$ID_CATF = $_POST['ID_CATF'];
$CATF_Name =  $_POST['CATF_Name'];
$Pic =  $_POST['Pic'];
$category =  $_POST['category'];


$stmt = $pdo->prepare("UPDATE categoryf SET ID_CATF = '$ID_CATF',CATF_Name =  '$CATF_Name',Pic =  '$Pic',category =  '$category'
 WHERE ID_CATF=$ID_CATF ");
$stmt->execute();

if ($stmt) {
    echo "<script type='text/javascript'>";
    echo  "alert('แก้ไขเรียบร้อยเรียบร้อย');";
    echo "window.location='listcategory.php';";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "window.location='listcategory.php';";
    echo "</script>";
}
mysqli_close($con);
?>