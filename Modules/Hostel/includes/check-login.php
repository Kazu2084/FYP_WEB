<?php
function check_login()
{
	if (isset($_SESSION["LoginStudent"])) {
		$current_session = $_SESSION['LoginStudent'];
		//$student_id =  $_SESSION['student_id'];
	  } 
// if(strlen($_SESSION['id'])==0)
// 	{	
// 		$host = $_SERVER['HTTP_HOST'];
// 		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
// 		$extra="index.php";		
// 		$_SESSION["id"]="";
// 		header("Location: http://$host$uri/$extra");
// 	}
}
?>