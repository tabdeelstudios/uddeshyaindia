<?php	
	session_start();
	require("../udd_inc/cn.php");
	if(isset($_SESSION['user']))
	{
   		header("location:http://www.uddeshyaindia.org/admin.php");
    }
    else{
    	$_SESSION['pageValidity']=1;
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>UDDESHYA SIGN-UP</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="icon" type="image/png"  href="images/favicon.png">
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-53088611-1', 'auto');
	  ga('send', 'pageview');
	
	</script>
</head>
<body>
	<section id="login2" action="admin.php">
		<div id="uddLogo">uddeshya</div>
		<form method="POST" action="admin.php">
			Username<br/>
			<input type="text" name="name" required /><br/>
			Password<br/>
			<input type="password" name="password" required /><br/>
			E-Mail Address<br/>
			<input type="email" name="email" required /><br/>
			<button type="submit" name="signup">SIGN UP</button>
		</form>
	</section>
</body>
</html>