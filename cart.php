<?php
session_start();
if (!isset($_SESSION['email'])) {
	echo "<script type='text/javascript'>";
	echo "alert('กรุณาเข้าสู่ระบบ');";
	echo "window.location = 'login.php'; ";
	echo "</script>";
}
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['email']);
	header('location: login.php');
}
include("connect.php");
include("tools.php");
$ID_Product = $_GET['ID_Product'];
$op = $_GET['op'];
if ($op == 'add' && !empty($ID_Product)) {
	if (isset($_SESSION['cart'][$ID_Product])) {
		$_SESSION['cart'][$ID_Product]++;
	} else {
		$_SESSION['cart'][$ID_Product] = 1;
	}
}

if ($op == 'remove' && !empty($ID_Product)) {
	unset($_SESSION['cart'][$ID_Product]);
}
if ($op == 'delete') { //ดักลบแบบใหม่ นับจำนวนรายการทั้งหมด
	for ($i=0; $i <100 ; $i++) { 
		unset($_SESSION['cart'][$i]);
	}
	
}
if ($op == 'update') {
	$amount_array =$_POST['amount'];
	foreach ($amount_array as $ID_Product => $amount) {
		$_SESSION['cart'][$ID_Product] = number_format($amount);
	}
}
?>
<!DOCTYPE html>
<html>
<style>
	table {
		border-collapse: collapse;
		width: fit-content;
		color: rgb(226, 82, 195);
		height: fit-content;
		background-color: #ffc9de;
	}

	.head_table tr,
	td {
		height: fit-content;
		padding: 10px;
	}

	/*หัวตาราง*/
	.head_table th { 
		background-color: #fffcd1;
		color: rgb(162, 104, 238);
		font-size: 150%;
		text-align: left;
		padding: 10px;

	}
	
	/* ท้ายตาราง */
	.foot_table td {
		background-color: #fffcd1;
		color: rgb(162, 104, 238);
		font-size: 150%;
	}

	/* ตะกร้าสินค้า */
	h2 {
		font-size: 200%;
		padding: 20px;
		color: rgb(162, 104, 238);
	}

	/* ปุ่มทั้งหมด */
	.submit,td a,th a,.home a {
		background-color: rgb(226, 82, 195);
		border-color: #fffcd1;
		border-radius: 5px;
		color: white;
		padding: 15px 32px;
		text-align: center;
		display: inline-block;
		font-size: 16px;
		margin: 4px 2px;
		cursor: pointer;
		opacity: 0.6;
		transition: 0.3s;
		text-decoration: none;
	}

	/* ปุ่มคำนวณสินค้าใหม่ */
	.submit:hover {
		opacity: 1
	}
	
</style>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
	<form id="frmcart" name="frmcart" method="post" action="?op=update">
		<br>
		<div align="center">
			<table>
				<tr>
					<h2 align="center">ตะกร้าสินค้า</h2>
				</tr>
				<tr class="head_table">
					<th>สินค้า</th>
					<th align='center'>รูป</th>
					<th>ราคา</th>
					<th>จำนวน</th>
					<th>รวม</th>
					<th><a href='cart.php?op=delete' >ลบทั้งตระกร้า</a></th>
				</tr>
				<?php
				$total = 0;
				if (!empty($_SESSION['cart'])) {
					foreach ($_SESSION['cart'] as $ID_Food => $qty) {
						$stmt = $pdo->prepare("SELECT * FROM `stock` where ID_Food='$ID_Food'");
						$stmt->execute();
						$row = $stmt->fetch();
						$sum = $row['price'] * $qty;
						$total += $sum;
						echo "<tr >";
						echo "<td >" . $row["Food_Name"] . "</td>";
						echo "<td align='center'><img src='img/" . $row["PicFood"] . "' width='50%' height='150px'></td>";
						echo "<td >" . number_format($row["price"], 2) . " บาท</td>";
						echo "<td >";
						echo "<input type='text' name='amount[".number_format(ceil($ID_Food))."]' value='" . number_format(ceil($qty)) . "' size='2'/> ชิ้น</td>";
						echo "<td >" . number_format($sum, 2) . " บาท</td>";
						echo "<td ><a href='cart.php?ID_Product=$ID_Food&op=remove'>ลบ</a></td>";
						echo "</tr>";
					}
				?>
					<tr class="foot_table">
						<td><b>ราคารวม</b></td>
						<td></td>
						<td></td>
						<td></td>
						<td><b><?php echo number_format($total, 2); ?></b> บาท</td>
						<td></td>
					</tr>
					<tr>
						<td class="home"><a href='javascript:history.back()'>กลับหน้ารายการสินค้า</a></td>
						<td></td>
						<td class="confirm" colspan=3 align=right><input type='submit' class="submit" value='คำนวณสินค้าใหม่'>
						</td>
						<td class="confirm" align=right>
							<a class="submit" href=confirm.php>สั่งซื้อ</a>
						</td>
					</tr>
				<?php } ?>
			</table>
		</div>
	</form>
</body>

</html>