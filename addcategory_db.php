<meta charset="UTF-8" />
<?php
session_start();
include('connect.php');

$name = $_POST['name'];
$pic = (isset($_POST['pic']) ? $_POST['pic'] : '');
$category = $_POST['category'];
$upload = $_FILES['pic'];
$numrand = mt_rand();

if ($upload <> '') {
	$path = "img/";
	$newname = $numrand.$_FILES['pic']['name'];
	$path_copy = $path.$newname;
	move_uploaded_file($_FILES['pic']['tmp_name'], $path_copy);
}
if($category==1){
	$category="bakery";
}
else if($category==2){
	$category="beverage";
}

$stmt1 = $pdo->prepare("INSERT INTO categoryf (CATF_Name,Pic,category)
VALUES ('$name','$newname','$category')");
echo $name.$newname.$category;
$stmt1->execute();




if ($stmt1) {

	echo "<script type='text/javascript'>";
	echo  "alert('เพิ่มสินค้าเรียบร้อย');";
	echo "window.location='addcategory.php';";
	echo "</script>";
} else {
	echo "<script type='text/javascript'>";
	echo "window.location='addcategory.php';";
	echo "</script>";
}
mysqli_close($con);

?>