<meta charset="UTF-8" />
<?php
session_start();
include('connect.php');
$address = $_POST["address"];
$email = $_SESSION["email"];
$stmt = $pdo->prepare("SELECT * FROM user WHERE Email_User = '$email'");
$stmt->execute();
$row = $stmt->fetch();
$id_user = $row['ID_User'];

$stmt1 = $pdo->prepare("INSERT INTO address (Address,ID_User) VALUES ('$address','$id_user')");
$stmt1->execute();

if ($stmt1) {

	echo "<script type='text/javascript'>";
	echo  "alert('เพิ่มที่อยู่เรียบร้อย');";
	echo "window.location='confirm.php';";
	echo "</script>";
} else {
	echo "<script type='text/javascript'>";
	echo "window.location='confirm.php';";
	echo "</script>";
}
mysqli_close($con);

?>