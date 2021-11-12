<meta charset="UTF-8" />
<?php
session_start();
include('connect.php');


$amount =  $_POST['amount'];
$price =  $_POST['price'];
$ID_CATF =  $_POST['catf'];

$name = $_POST['name'];
$pic = (isset($_POST['pic']) ? $_POST['pic'] : '');
$upload = $_FILES['pic'];
$numrand = mt_rand();

if ($upload <> '') {
	$path = "img/";
	$newname = $numrand.$_FILES['pic']['name'];
	$path_copy = $path.$newname;
	move_uploaded_file($_FILES['pic']['tmp_name'], $path_copy);
}

$stmt1 = $pdo->prepare("INSERT INTO stock (Food_Name,amount,price,PicFood,ID_CATF)
VALUES ('$name','$amount','$price','$newname','$ID_CATF')");
echo $name.$newname.$category;
$stmt1->execute();

if ($stmt1) {
	echo "<script type='text/javascript'>";
	echo  "alert('เพิ่มสินค้าเรียบร้อย');";
	echo "window.location='addfood.php';";
	echo "</script>";
} else {
	echo "<script type='text/javascript'>";
	echo "window.location='addfood.php';";
	echo "</script>";
}
mysqli_close($con);

?>