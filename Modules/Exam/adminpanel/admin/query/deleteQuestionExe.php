<?php 
 include("../../../../../Connection/connection.php");


extract($_POST);

$delExam = $con->query("DELETE  FROM exam_question_tbl WHERE eqt_id='$id'  ");
if($delExam)
{
	$res = array("res" => "success");
}
else
{
	$res = array("res" => "failed");
}


	echo json_encode($res);
 ?>