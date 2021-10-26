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

    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <!-- <form action="logindb.php" method="post">
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
        <div class="input-group">
            <label for="Email_User">Email_User</label>
            <input type="text" name="Email_User">
        </div>
        <div class="input-group">
            <label for="Pass_User">Password</label>
            <input type="password" name="Pass_User">
        </div>
        <div class="input-group">
            <button type="submit" name="login_user" class="btn">Login</button>
        </div>
        <p>Not yet a member? <a href="register.php">Sign Up</a></p>
    </form> -->

    <form id="register_form" action="logindb.php" method="post">

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

		<h1>Login</h1>
        
		<div id="error_msg"></div>
		
		<div>
            <input type="text" name="Email_User" placeholder="อีเมล" id="Email_User" >
            <span></span>
        </div>

		<div>
			<input type="password" name="Pass_User" placeholder="รหัสผ่าน" id="Pass_User">
		</div>
		<div>
			<button type="submit" name="login_user"  class="btn" id="reg_btn">Login</button>
		</div>

        <div >          
            <p>You don't have a account register here <a href="register.php">Register</a></p>
        </div>
	</form>
</body>
</html>