<meta charset="UTF-8">
<?php

include('connect.php');
$id = $_REQUEST["ID"];
$stmt = $pdo->prepare("DELETE FROM stock WHERE ID_Food='$id'");
$stmt->execute();
if ($stmt) {
    echo "<script type='text/javascript'>";
    echo "alert('ลบเสร็จสิ้น');";
    echo "window.location = 'listfood.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('มีบางอย่างผิดพลาดลองอีกครั้ง');";
    echo "window.location = 'listfood.php'; ";
    echo "</script>";
}
?>