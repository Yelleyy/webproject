<meta charset="UTF-8">
<?php

include('connect.php');
$id = $_REQUEST["ID_Order"];
$stmt = $pdo->prepare("UPDATE `orderh` SET status='cancel' WHERE ID_Order='$id'");
$stmt->execute();
if ($stmt) {
    echo "<script type='text/javascript'>";
    echo "alert('ยกเลิกออเดอร์เสร็จสิ้น');";
    echo "window.location = 'listorder.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('มีบางอย่างผิดพลาดลองอีกครั้ง');";
    echo "</script>";
}
?>