<meta charset="UTF-8">
<?php

include('connect.php');
$id = $_REQUEST["ID"];
$stmt = $pdo->prepare("DELETE FROM orderh WHERE ID_Order='$id'");
$stmt->execute();
if ($stmt) {
    echo "<script type='text/javascript'>";
    echo "alert('ลบเสร็จสิ้น');";
    echo "window.location = 'listorder.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('มีบางอย่างผิดพลาดลองอีกครั้ง');";
    echo "window.location = 'listorder.php'; ";
    echo "</script>";
}
?>