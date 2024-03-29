<?php 
 include("../../../../../Connection/connection.php");


extract($_POST);

$selExamineeFullname = $con->query("SELECT * FROM student_info WHERE exmne_fullname='$fullname' ");
$selExamineeEmail = $con->query("SELECT * FROM student_info WHERE exmne_email='$email' ");


if($gender == "0")
{
	$res = array("res" => "noGender");
}
else if($course == "0")
{
	$res = array("res" => "noCourse");
}
else if($year_level == "0")
{
	$res = array("res" => "noLevel");
}
else if($selExamineeFullname->rowCount() > 0)
{
	$res = array("res" => "fullnameExist", "msg" => $fullname);
}
else if($selExamineeEmail->rowCount() > 0)
{
	$res = array("res" => "emailExist", "msg" => $email);
}
else
{
	$insData = $con->query("INSERT INTO student_info(exmne_fullname,exmne_course,exmne_gender,exmne_birthdate,exmne_year_level,exmne_email,exmne_password) VALUES('$fullname','$course','$gender','$bdate','$year_level','$email','$password')  ");
	if($insData)
	{
		$res = array("res" => "success", "msg" => $email);
	}
	else
	{
		$res = array("res" => "failed");
	}
}


echo json_encode($res);
 ?>