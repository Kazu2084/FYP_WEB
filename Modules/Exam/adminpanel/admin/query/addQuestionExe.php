<?php 
 include("../../../../../Connection/connection.php");

extract($_POST);

$selQuest = $con->query("SELECT * FROM exam_question_tbl WHERE exam_id='$examId' AND exam_question='$question' ");
if($selQuest->rowCount() > 0)
{
  $res = array("res" => "exist", "msg" => $question);
}
else
{
	$insQuest = $con->query("INSERT INTO exam_question_tbl(exam_id,exam_question,exam_ch1,exam_ch2,exam_ch3,exam_ch4,exam_answer) VALUES('$examId','$question','$choice_A','$choice_B','$choice_C','$choice_D','$correctAnswer') ");

	if($insQuest)
	{
       $res = array("res" => "success", "msg" => $question);
	}
	else
	{
       $res = array("res" => "failed");
	}
}



echo json_encode($res);
 ?>