<meta charset="UTF-8">
<?php

include('connect.php');
$id = $_REQUEST["ID"];
$stmt = $pdo->prepare("DELETE FROM categoryf WHERE ID_CATF='$id'");
$stmt->execute();
if ($stmt) {
    echo "<script type='text/javascript'>";
    echo "alert('ลบเสร็จสิ้น');";
    echo "window.location = 'listcategory.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('มีบางอย่างผิดพลาดลองอีกครั้ง');";
    echo "window.location = 'listcategory.php'; ";
    echo "</script>";
}
?>