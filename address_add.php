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
?>
<!DOCTYPE html>
<html>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/JQL.min.js"></script>
<script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>
<link rel="stylesheet" href="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.css">
<script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>
<style>
	.center {
		margin: 0 auto;
		max-width: 1280px;
	}

	.container {
		max-width: 1000px;
		display: flex;
		flex-direction: column;
		align-items: center;
	}

	.container h2 {
		margin: 20px 0;
	}

	.form-control {
		width: 50%;
		margin-bottom: 20px;
	}

	.txt {
		width: 100%;
		background: #f2afb4;
		outline: none;
		border: none;
		padding: 10px;
		border-radius: 10px;
		font-size: 1rem;
	}

	.btn {
		cursor: pointer;
		background: #f2afb4;
		padding: 8px;
		border-radius: 13px;
		box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
		font-size: 1rem;
		font-weight: bold;
		transition: box-shadow linear 0.4s;
	}

	.btn:hover {
		-webkit-box-shadow: none;
		box-shadow: none;
	}
</style>

<body>
	<br><br><br>

	<form action="address_adddb.php" method="post">
		<div class="container center">
			<h2>ฟอร์มเพิ่มที่อยู่</h2>
			<div class="form-control">
				<span>รายละเอียดบ้าน</span>
				<textarea name="detail" type="text" class="txt" placeholder="รายละเอียดบ้าน"></textarea>
			</div>
			<div class="form-control">
				<span>ตำบล/แขวง</span>
				<input id="district" name="district" type="text" class="txt" placeholder="ตำบล">
			</div>
			<div class="form-control">
				<span>อำเภอ/เขต</span>
				<input id="amphoe" name="amphoe" type="text" class="txt" placeholder="อำเภอ">
			</div>
			<div class="form-control">
				<span>จังหวัด</span>
				<input id="province" name="province" type="text" class="txt" placeholder="จังหวัด">
			</div>
			<div class="form-control">
				<span>รหัสไปรษณีย์</span>
				<input id="zipcode" name="zipcode" type="text" class="txt" placeholder="รหัสไปรษณีย์">
			</div>
			<button type="submit" class="btn">เพิ่มที่อยู่</button>
		</div>
	</form>

</body>
<script>
	$.Thailand({
		$district: $("#district"), // input ของตำบล
		$amphoe: $("#amphoe"), // input ของอำเภอ
		$province: $("#province"), // input ของจังหวัด
		$zipcode: $("#zipcode") // input ของรหัสไปรษณีย์
	});
</script>

</html>