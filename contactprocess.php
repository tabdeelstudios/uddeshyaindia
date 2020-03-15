<?php

$EmailFrom = $_REQUEST['email']; 
$EmailTo = "publicrelations@uddeshyaindia.org";
$Subject = "Website Contact";
$Name = Trim(stripslashes($_POST['name'])); 
$bot = Trim(stripslashes($_POST['bot'])); 
$Email = Trim(stripslashes($_POST['email'])); 
$Message = Trim(stripslashes($_POST['message']));

if(!empty($bot)){
	
	// prepare email body text
	$Body = "";
	$Body .= "Name: ";
	$Body .= $Name;
	$Body .= "\n";
	$Body .= "Email: ";
	$Body .= $Email;
	$Body .= "\n";
	$Body .= "Message: ";
	$Body .= "\n";
	$Body .= "\n";
	$Body .= $Message;
	$Body .= "\n";

	// send email 
	$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");
}

if($success)
	http_response_code(200);
}
else{
	http_response_code(400);
}
?>