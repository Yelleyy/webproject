<?php
session_start();
// if (!isset($_SESSION['email'])) {
// 	echo "<script type='text/javascript'>";
// 	echo "alert('กรุณาเข้าสู่ระบบ');";
// 	echo "window.location = 'login.php'; ";
// 	echo "</script>";
// }
// if (isset($_GET['logout'])) {
// 	session_destroy();
// 	unset($_SESSION['email']);
// 	header('location: login.php');
// }
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

if ($op == 'update') {
	$amount_array = $_POST['amount'];
	foreach ($amount_array as $ID_Product => $amount) {
		$_SESSION['cart'][$ID_Product] = $amount;
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
		/* border-radius: 20px; */
	}
	.head_table tr,
	td {
		height: fit-content;
		padding: 10px;
	}
	.head_table th {
		background-color: #fffcd1;
		color: rgb(162, 104, 238);
		font-size: 150%;		
	}
	.foot_table td {
		background-color: #fffcd1;
		color: rgb(162, 104, 238);
		font-size: 150%;
	}
	h2 {
		font-size: 200%;
		padding: 20px;
		color: rgb(162, 104, 238);
		text-shadow: 3px 4px #fffcd1;
	}
	.home a {
		text-decoration: none;
		color: rgb(226, 82, 195);
		font-size: 150%;		
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
					<th></th>
				</tr>
				<?php
				$total = 0;
				if (!empty($_SESSION['cart'])) {
					include("connect.php");
					// if (!isset($_SESSION['email'])) {
					// 	echo "<script type='text/javascript'>";
					// 	echo "alert('กรุณาเข้าสู่ระบบ');";
					// 	echo "window.location = 'login.php'; ";
					// 	echo "</script>";
					// }
					// if (isset($_GET['logout'])) {
					// 	session_destroy();
					// 	unset($_SESSION['email']);
					// 	header('location: login.php');
					// }
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
						echo "<input type='text' name='amount[$ID_Food]' value='" . number_format($qty) . "' size='2'/> ชิ้น</td>";
						echo "<td >" . number_format($sum, 2) . " บาท</td>";
						echo "<td ><a href='cart.php?ID_Product=$ID_Food&op=remove' class='btn btn-danger btn-xs'>ลบ</a></td>";
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
						<td colspan=4 align=right><input type='submit' value='คำนวณสินค้าใหม่'><br><a href=confirm.php>สั่งซื้อ</a></td>
					</tr>
				<?php } ?>
			</table>
		</div>
	</form>
</body>

</html>