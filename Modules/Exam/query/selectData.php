<?php 
include("../../Connection/connection.php");

$current = $_SESSION['LoginStudent'];
$id_query = $conn->query("select roll_no from student_info WHERE email = '$current' ")->fetch(PDO::FETCH_ASSOC);
$exmneId = $id_query['roll_no'];

$selExmneeData = $conn->query("SELECT * FROM student_info WHERE roll_no='$exmneId' ")->fetch(PDO::FETCH_ASSOC);
$exmneCourse =  $selExmneeData['course_code'];

$selExam = $conn->query("SELECT * FROM exam_tbl WHERE cou_id='$exmneCourse' ORDER BY ex_id DESC ");
 ?>