<?php
	require ("../udd_inc/cn.php");
	if(isset($_POST['memSubmit'])){

		//htmlspecialchars($value, ENT_QUOTES)  --------- for fetching
		//htmlspecialchars_decode($value, ENT_QUOTES)  --------- for displaying

		$name=$_POST['name'];
		$age=$_POST['age'];
		$sex=$_POST['sex'];
		$mail=$_POST['mail'];
		$contact=$_POST['phone'];
		$city=$_POST['city'];
		$occupation=$_POST['occupation'];
		$id=$_POST['id'];
		$language=htmlspecialchars($_POST['language'], ENT_QUOTES);
		$skills=htmlspecialchars($_POST['skills'], ENT_QUOTES);
		if(isset($_POST['why']))
		{
			$why=htmlspecialchars($_POST['why'], ENT_QUOTES);
		}
		else{
			$why="";
		}

		$sql1=mysql_query("insert into member (name,age,sex,email,contact,city,occupation,id,language,skill,why) values('$name',$age,'$sex','$mail','$contact','$city','$occupation','$id','$language','$skills','$why');");
		if($sql1){
			$success='Your Request Has Been Submitted!';
			$to = $mail;
		    $subject = 'Uddeshya Membership Request Received';
			$message = "
			<span style=\"font-family: 'Trebuchet MS', sans-serif;\">
			Welcome to Uddeshya!<br/><br/>We have received your request to join us as a member of the organisation. We thank you for showing your enthusiasm.
			<br/><br/>Our team will contact you shortly and soon you will get the opportunity to work with us as a volunteer/member and help spread a smile.
			<br/><br/><strong><i>The Change Begins With YOU!</i></strong>
			<br/><br/><br/>Regards<br/>Team Uddeshya<br/>
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

    <meta name="description" content="Uddeshya India | Empowering Youth Fueling Change" />
	<meta name="keywords" content="uddeshya, youth, awareness" />
	<meta property="og:title" content="Uddeshya India"/>
	<meta property="og:image" content="http://www.uddeshyaindia.org/newlogo.png" />
	<meta property="og:url" content="http://www.uddeshyaindia.org"/>
	<meta property="og:type" content="website" />
	<meta property="og:description" content="UDDESHYA INDIA - Empowering Youth Fueling Change"/>
	<meta name="author" content="Deepak Grover" />
		
	<title>UDDESHYA | Registration For Membership</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link href="css/form.css" rel="stylesheet">
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
		uddeshya Membership Form
		<blockquote>Empowering Youth. Fueling Change.</blockquote>
	</header>

	<section id="fill">
		Please fill in the following information and we will contact you soon.
	</section>

	<?php
		if(isset($_POST['memSubmit'])){
			?>
			<div style="clear:both;  display block; height:25px; width:100%;">
			</div>
			<div style="clear:both; border:2px dashed white; display block; height:auto; width:80%; background-color: rgba(70,150,239,0.9); cursor:default;
						border-radius:3px; margin-top:20px; padding:15px; color:white; font-size:20px; font-family: 'font'; margin-left:auto; margin-right:auto;
						">
				<center> <?php echo $success; ?></center>
			</div>
		<?php
		}
	?>

	<section id="form">
		<form method="POST" action="member.php">
			<div id="leftPane">
			<div class="unit">
				<div class="part3">Name</div>
				<div class="part4">
					<input type="text" required name="name"/>
				</div>
			</div>

			<div class="unit">
				<div class="part3">Age</div>
				<div class="part4">
					<input type="number" min="10" required name="age"/>
				</div>
			</div>

			<div class="unit">
				<div class="part3">Sex</div>
				<div class="part4">
					<select name="sex">
						<option value="Male">Male</option>
						<option value="Female">Female</option>
						<option value="Others">Others</option>
					</select>
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
					<input type="tel" required maxlength="10" placeholder="9876543210" name="phone"/>
				</div>
			</div>

			<div class="unit">
				<div class="part3">City</div>
				<div class="part4">
					<input type="text" required name="city"/>
				</div>
			</div>

			<div class="unit">
				<div class="part3">Occupation</div>
				<div class="part4">
					<select name="occupation">
						<option value="Student">Student</option>
						<option value="Working">Working</option>
					</select>
				</div>
			</div>

			<div class="unit">
				<div class="part3">Registration No / Employee ID / any other Identification No</div>
				<div class="part4">
					<input type="text" required name="id"/>
				</div>
			</div>

			</div>
			<div id="rightPane">

			<div class="unit">
				<div class="part3">Language(s) you are comfortable with</div>
				<div class="part4">
					<textarea name="language" required></textarea>
				</div>
			</div>

			<div class="unit">
				<div class="part3">What skills do you possess that can be useful to us in any way?</div>
				<div class="part4">
					<textarea name="skills" required placeholder="ex: Public Speaking, Technical, Management, Marketing, along with experience. "></textarea>
				</div>
			</div>
			
			<div class="unit">
				<div class="part3">Why Uddeshya?</div>
				<div class="part4">
					<textarea name="why" placeholder="Please keep your answer short and crisp."></textarea>
				</div>
			</div>

			<div class="unit">
				<div class="part3">
					<button type="submit" name="memSubmit">Submit</button>
				</div>
			</div>
			</div>

		</form>

	</section>

	

	<section id="bottom">
		For any queries, you may contact us at <a href="mailto:contact@uddeshyaindia.org">contact@uddeshyaindia.org</a>
	</section>

</body>
</html>