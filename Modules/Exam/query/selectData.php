<?php 
include("../../Connection/connection.php");

include('../student-sidenav-header.php');
$exmneId = $_SESSION['student_id'];

$selExmneeData = $conn->query("SELECT * FROM student_info WHERE roll_no='$exmneId' ")->fetch(PDO::FETCH_ASSOC);
$exmneCourse =  $selExmneeData['exmne_course'];

$selExam = $conn->query("SELECT * FROM exam_tbl WHERE cou_id='$exmneCourse' ORDER BY ex_id DESC ");
 ?>