<?php include('registerdb.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="apple-touch-icon" sizes="144x144" href="img/apple-icon-144x144.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/favicon-96x96.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="img/ms-icon-144x144.png">
    <link rel="manifest" href="img/manifest.json">
    <title>GYP Dessert</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="stylelogre.css">
</head>
<body>
	
	<form id="register_form">
		<h1>สมัครเข้าใช้งาน</h1>
		<div id="error_msg"></div>
		<input type="text" name="Name_User" placeholder="ชื่อ-สกุล" id="Name_User" >
        </div>

        <div>
            <input type="email" name="Email_User" placeholder="อีเมล" id="Email_User" pattern="[^@\s]+@[^@\s]+\.[^@\s]+">
            <span></span>
        </div>     

        <div>
            <input type="tel" name="Tel_User" placeholder="เบอร์โทร" id="Tel_User"  pattern="0[1-9]{9}" >
			<span></span>
        </div>
		
		<div>
			<input type="password" name="Pass_User" placeholder="รหัสผ่าน" id="Pass_User" >
		</div>

		<div>
			<input type="password" name="Pass_User2" placeholder="ยืนยันรหัสผ่าน" id="Pass_User2" >
			<span></span>
		</div>
		<div>
			<button tyoe="button" name="register" id="reg_btn">สมัครเพื่อเข้าใช้งาน</button>
		</div>
		<div class="createaccount">          
			<p>มีบัญชีแล้วใช่ไหม <a href="login.php">เข้าสู่ระบบ</a></p>
			<a href="index.php">กลับหน้าหลัก</a>
        </div>
	</form>

	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="registerscript.js"></script>
</body>
</html>