<?php
	if($_POST['newsMail']!="")
	{
    	$file=fopen('subscriptions.txt','a');
	    $info = $_POST['newsMail'];
	    $info = $info . ", ";
	    fwrite($file, $info);
	    fclose($file);

	    /* Auto Respond */
	    $to = $_POST['newsMail'];
	    $subject = 'Uddeshya Subscription Successful';
		$message = "
		<span style=\"font-family: 'Trebuchet MS', sans-serif;\">
		Welcome to Uddeshya!<br/><br/>You have now subscribed to our news feed and will be receiving an insight into everything we do, from all the upcoming events to the progress of the organization.
		<br/><br/>Also you will get the opportunity to work with us as a volunteer/member and help spread a smile.
		<br/><br/><br/>Regards<br/>Team Uddeshya<br/>
		<br/><i>This is a system generated mail. Please do not reply.</i></span>";
		$headers  = "MIME-Version: 1.0\r\n"; 
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
		$headers .= "From: Uddeshya <noreply@uddeshyaindia.org>\r\n"; 

		mail($to, $subject, $message, $headers);
		echo "subscribed";
	}
?>
<script type="text/javascript">
<!--
window.location = "http://www.uddeshyaindia.org"
//-->
</script>