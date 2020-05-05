<?php	
	session_start();
	require("../udd_inc/cn.php");
	if(isset($_SESSION['user']))
	{
   		header("location:http://www.uddeshyaindia.org/admin.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>UDDESHYA Member Login</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="icon" type="image/png"  href="images/favicon.png">
</head>
<body>
	<section id="login" >
		<div id="uddLogo">uddeshya</div>
		<form method="POST" action="admin.php">
			Username<br/>
			<input type="text" name="name" required /><br/>
			Password<br/>
			<input type="password" name="password" required /><br/>
			<button type="submit" name="login">LOGIN</button>
		</form>
	</section>
	<footer>
		<center><a href="http://www.uddeshyaindia.org/signup.php">Signup</a> | <a href="mailto:deepakgrover333@gmail.com">Facing Problem with Login?</a></center>
	</footer>
</body>
</html>