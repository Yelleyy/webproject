<?php
    session_start();
    include('connect.php'); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <link rel="stylesheet" href="stylelogre.css">
</head>
<body>
    
    

    <form id="register_form" action="logindb.php" method="post">

    <h1>เข้าสู่ระบบ</h1>

        <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <?php endif ?>

		
        
		<!-- <div id="error_msg"></div> -->
		
		<div>
            <input type="text" name="Email_User" placeholder="อีเมล" id="Email_User" >
            <span></span>
        </div>

		<div>
			<input type="password" name="Pass_User" placeholder="รหัสผ่าน" id="Pass_User">
		</div>
		<div>
			<button type="submit" name="login_user"  class="btn" id="reg_btn">เข้าสู่ระบบ</button>
		</div>

        <div >          
            <p>ยังไม่มีบัญชีใช่ไหม <a href="register.php">สมัครเข้าใช้งาน</a></p>
        </div>
	</form>
</body>
</html>