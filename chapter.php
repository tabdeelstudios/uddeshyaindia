<?php
	require ("../udd_inc/cn.php");
	if(isset($_POST['chapSubmit'])){

		//htmlspecialchars($value, ENT_QUOTES)  --------- for fetching
		//htmlspecialchars_decode($value, ENT_QUOTES)  --------- for displaying

		$name=$_POST['name'];
		$mail=$_POST['mail'];
		$contact=$_POST['phone'];
		$city=$_POST['city'];
		$occupation=$_POST['occupation'];
		$address=htmlspecialchars($_POST['address'], ENT_QUOTES);
		

		$sql1=mysql_query("insert into chapter (name,email,contact,city,occupation,address) values('$name','$mail','$contact','$city','$occupation','$address');");
		if($sql1){
			$success='Your Request Has Been Submitted!';
			$to = $mail;
		    $subject = 'Uddeshya Chapter Request Received';
			$message = "
			<span style=\"font-family: 'Trebuchet MS', sans-serif;\">
			Welcome to Uddeshya!<br/><br/>We have received your request to start a new chapter. We are proud that you have taken this initiative and we are looking forward to working with you.
			<br/><br/>Our team will be contacting you shortly.
			<br/><br/><strong><i>The Change Begins With YOU!</i></strong>
			<br/><br/><br/>Regards<br/>Team Uddeshya<br/>
			<br/><i>'The secret of getting ahead is getting started' -Mark Twain</i></br/>
			<br/><i>This is a system generated mail. Please do not reply.</i></span>";
			$headers  = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
			$headers .= "From: Uddeshya <noreply@uddeshyaindia.org>\r\n"; 

			mail($to, $subject, $message, $headers);
		}
		else{
			$success='Something went Wrong! Try Again Later!';
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>UDDESHYA | START A CHAPTER</title>

	<meta name="description" content="Uddeshya India | Empowering Youth Fueling Change" />
	<meta name="keywords" content="uddeshya, youth, awareness" />
	<meta property="og:title" content="Uddeshya India"/>
	<meta property="og:image" content="http://www.uddeshyaindia.org/newlogo.png" />
	<meta property="og:url" content="http://www.uddeshyaindia.org"/>
	<meta property="og:type" content="website" />
	<meta property="og:description" content="UDDESHYA INDIA - Empowering Youth Fueling Change"/>
	<meta name="author" content="Deepak Grover" />
		
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link href="css/chapter.css" rel="stylesheet">
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
	<header>
		uddeshya - Start A Chapter!
		<blockquote>Empowering Youth. Fueling Change.</blockquote>
	</header>

	<section id="mod">
		
		At Uddeshya, we address the issues that currently plague our nation and its people. 
		Issues such as HIV-AIDS, any and all forms of discrimination, substance abuse , peer pressure , sexual abuse, etc are dealt with,with utmost sensitivity , emphasising their relevance and effects. 

		<p>What makes us unique is that our purpose is not just creating an awareness but also to motivate people to realise their responsibility and to give them a platform to innovate and ideate.</p>
		You can start by filling the form below.
	</section>

	<?php
		if(isset($_POST['chapSubmit'])){
			?>
			<div style="clear:both;  display block; height:25px; width:100%;">
			</div>
			<div style="clear:both; border:2px dashed white; display block; height:auto; width:80%; background-color: #d32929; cursor:default;
						border-radius:3px; margin-top:20px; padding:15px; color:white; font-size:20px; font-family: 'font'; margin-left:auto; margin-right:auto;
						">
				<center> <?php echo $success; ?></center>
			</div>
		<?php
		}
	?>

	<section id="form">
		<form method="POST" action="chapter.php">
			<div id="leftPane">
			<div class="unit">
				<div class="part3">Name</div>
				<div class="part4">
					<input type="text" required name="name"/>
				</div>
			</div>

			<div class="unit">
				<div class="part3">Email</div>
				<div class="part4">
					<input type="email" required name="mail"/>
				</div>
			</div>

			<div class="unit">
				<div class="part3">Contact No</div>
				<div class="part4">
					<input type="tel" required placeholder="9876543210" maxlength="10" name="phone"/>
				</div>
			</div>

			<div class="unit">
				<div class="part3">City</div>
				<div class="part4">
					<input type="text" required name="city"/>
				</div>
			</div>
			</div>
			<div id="rightPane">
			<div class="unit">
				<div class="part3">Occupation</div>
				<div class="part4">
					<select name="occupation">
						<option value="Student">Student</option>
						<option value="Faculty">Faculty</option>
					</select>
				</div>
			</div>

			<div class="unit">
				<div class="part3">Your School (or) College name with complete address</div>
				<div class="part4">
					<textarea name="address" required></textarea>
				</div>
			</div>

			<div class="unit">
				<div class="part3">
					<button type="submit" name="chapSubmit">Submit</button>
				</div>
			</div>
			</div>
		</form>
	</section>

	<section id="bottom">
		For any queries, you can visit our <a href="http://www.facebook.com/in.uddeshya" target="_blank">facebook</a> page<br/>
		(or) you may also contact us at <a href="mailto:contact@uddeshyaindia.org">contact@uddeshyaindia.org</a>
	</section>
</body>
</html>