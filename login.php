<?php
    session_start();
    setcookie("login","yes");
?>
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

    <link rel="stylesheet" href="stylelogre.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form id="register_form" action="logindb.php" method="post">
    <h1>เข้าสู่ระบบ</h1>
        <?php if (isset($_SESSION['error'])) : ?>
            <div>
                <h3 style="color: red;">
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
		<div>
            <input type="email" name="Email_User" placeholder="example@example.com" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" id="Email_User" required >
            <span></span>
        </div>

		<div>
			<input type="password" name="Pass_User" placeholder="รหัสผ่าน" id="Pass_User" required>
		</div>
		<div>
			<button type="submit" name="login_user"  class="btn" id="reg_btn">เข้าสู่ระบบ</button>
		</div>

        <div class="noaccountyet">          
            <p>ยังไม่มีบัญชีใช่ไหม 
                <a href="register.php">
                    สมัครเข้าใช้งาน
                </a></p>
            <a href="index.php">กลับหน้าหลัก</a>
        </div>
	</form>
</body>
</html>