<?php include('process.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>login</title>

	<link rel="stylesheet" href="style.css">
</head>
<body>
	
	<form id="register_form">
		<h1>Login</h1>
		<div id="error_msg"></div>
		
		<div>
            <input type="text" name="Email_User" placeholder="Email" id="Email_User" >
            <span></span>
        </div>

		<div>
			<input type="password" name="password" placeholder="Password" id="password">
		</div>
		<div>
			<button type="button" name="login" id="reg_btn">Login</button>
		</div>

        <div >          
            <p>You don't have a account register here <a href="index.php">Register</a></p>
        </div>
	</form>

	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="script.js"></script>
</body>
</html>