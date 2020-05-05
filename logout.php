<?php 
	session_start();
	session_unset();
	session_destroy();
	header("location:http://www.uddeshyaindia.org/login.php");
?>