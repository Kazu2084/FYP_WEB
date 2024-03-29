<?php
  include("../../../../../Connection/connection.php");
 extract($_POST);


$updCourse = $con->query("UPDATE student_info SET exmne_fullname='$exFullname', exmne_course='$exCourse', exmne_gender='$exGender', exmne_birthdate='$exBdate', exmne_year_level='$exYrlvl', exmne_email='$exEmail', exmne_password='$exPass' WHERE exmne_id='$exmne_id' ");
if($updCourse)
{
	   $res = array("res" => "success", "exFullname" => $exFullname);
}
else
{
	   $res = array("res" => "failed");
}



 echo json_encode($res);	
?>