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
?>
<!DOCTYPE html>
<html>

<head>

</head>

<body>
	<br><br><br>
	<div class="container">
		<div class="row">
			<div class="col col-8">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">เพิ่มที่อยู่</h4>
					</div>
					<div class="card-body">
						<div class="basic-form">
							<form action='address_adddb.php' method="POST" enctype="multipart/form-data">
								<div class="form-row">
									<div class="form-group col-md-6">
										<label>รายละเอียดที่อยู่</label>
										<textarea type="textarea" rows="10" cols="30" name="address" class="form-control"></textarea>
										<br><button type="submit" class="btn btn-primary">ยืนยัน</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>