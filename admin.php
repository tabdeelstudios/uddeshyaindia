<?php	
	session_start();
	require("../udd_inc/cn.php");

	if(isset($_POST['login'])){
		$user=$_POST['name'];
		$pass=sha1($_POST['password']);

		$sql=mysql_query("select * from user where name='$user' and password='$pass' limit 1");

						$rowsCount=mysql_num_rows($sql);
						if($rowsCount!=0)
						{
							$_SESSION['user']=$user;
							$_SESSION['pass']=$pass;
						}
						else{?>
						<div style="height:160px; width:40%; background-color: rgba(70,150,239,0.9); cursor:default;
				margin-top:35px; padding:40px; font-size:22pt; font-family: 'Segoe UI'; margin-left:30px;
				">
				Invalid Username (or) Password!<br/>
				Try <a href='http://www.uddeshyaindia.org/login.php' style="text-decoration:none; color:white;">Again.</a>
			</div>
					<?php
					exit();
				}
		}
		

	elseif ( isset($_POST['signup']) && $_SESSION['pageValidity']===1) {
		
		$user=$_POST['name'];
		$pass=sha1($_POST['password']);
		$email=$_POST['email'];
		
			$sql0=mysql_query("select * from user where email='$email' or name='$user';");
			$res0=mysql_fetch_array($sql0);
			
			if($res0>0){
				// invalid input for registration
				?>
			
			<div style="height:160px; width:40%; background-color: rgba(70,150,239,0.9); cursor:default;
				margin-top:35px; padding:40px; font-size:22pt; font-family: 'Segoe UI'; margin-left:30px;
				">
				This username (or) email Id is already in use.<br/>
				Try <a href='http://www.uddeshyaindia.org/signup.php' style="text-decoration:none; color:white;">Re-register.</a>
			</div>
			
			<?php
				exit();
			}
			else{
				// i.e. input is correct
				//USER REGISTRATION 

				$sql=mysql_query("INSERT INTO user VALUES ( '$user', '$pass', '$email');");
				if($sql){
					$_SESSION['user']=$user;
					$_SESSION['pass']=$pass;
				}
				else{
				?>
					<div style="height:160px; width:40%; background-color: rgba(70,150,239,0.9); cursor:default;
						margin-top:35px; padding:40px; font-size:22pt; font-family: 'Segoe UI'; margin-left:30px;
						">
						Oops! Something went wrong! Check input validity.<br/>
						Try <a href='http://www.uddeshyaindia.org/signup.php' style="text-decoration:none; color:white;">Re-register.</a>
					</div>
				<?php
				exit();
				}

			}
	}
	else if(isset($_SESSION['user']) && isset($_SESSION['pass']))
	{
		$user=$_SESSION['user'];
		$pass=$_SESSION['pass'];
	}
	
	else{
		header("location:http://www.uddeshyaindia.org/login.php");
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>UDDESHYA Administrator</title>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<link rel="icon" type="image/png"  href="images/favicon.png">
	
</head>
<body>
	<header>
		<span id="logo">uddeshya ADMIN Portal</span>
		<div id="logout" onclick="location.href='logout.php';">
			LOGOUT
		</div>
		<div id="userInfo">
			Welcome <?php echo $user; ?>!
		</div>
	</header>
	<section id="member">
		<div class="t-header">
			Membership Requests
		</div>

		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<th>Name</th>
					<th>Age</th>
					<th>Sex</th>
					<th>E-Mail</th>
					<th>Contact</th>
					<th>City</th>
					<th>Occupation</th>
					<th>Reg-ID</th>
					<th>Languages Known</th>
					<th>Skills</th>
					<th>Why Uddeshya</th>
					<th>Timestamp</th>
				</thead>
					<?php
						$sql3=mysql_query("select * from member;");
						if(!empty($sql3))
						{
							while($row = mysql_fetch_row($sql3))
							{
								?>
								<tr>
									<?php
										for ($i=0; $i <12 ; $i++) { 
											?>
												<td>
													<?php
														if($i>=8)
														{
															echo htmlspecialchars_decode($row[$i], ENT_QUOTES);
														}
														else
														{
															echo $row[$i];
														} 
													?>
												</td>
											<?php
										}
									?>
								</tr>
								<?php
							}
						}
						else
						{
							?>
							<tr>
								<td colspan="12">
									<center>Pfft! No Records Found!</center>
								</td>
							</tr>
							<?php
						}
					?>
					
			</table>
		</div>
	</section>

	<section id="chapter">
		<div class="t-header">
			Chapter Requests
		</div>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<th>Name</th>
					<th>E-Mail</th>
					<th>Contact</th>
					<th>City</th>
					<th>Occupation</th>
					<th>Address</th>
					<th>Timestamp</th>
				</thead>
					<?php
						$sql3=mysql_query("select * from chapter;");
						if(!empty($sql3))
						{
							while($row = mysql_fetch_row($sql3))
							{
								?>
								<tr>
									<?php
										for ($i=0; $i <7 ; $i++) { 
											?>
												<td>
													<?php echo $row[$i]; ?>
												</td>
											<?php
										}
									?>
								</tr>
								<?php
							}
						}
						else
						{
							?>
							<tr>
								<td colspan="12">
									<center>Pfft! No Records Found!</center>
								</td>
							</tr>
							<?php
						}
					?>
					
			</table>
		</div>
	</section>
</body>
</html>