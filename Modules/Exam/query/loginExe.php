<?php 
session_start();
 include("../conn.php");
 

extract($_POST);

$selAcc = $con->query("SELECT * FROM student_info WHERE exmne_email='$username' AND exmne_password='$pass'  ");
$selAccRow = $selAcc->fetch(PDO::FETCH_ASSOC);

$_SESSION['examineeSession']['examineenakalogin'] = true;

if($selAcc->rowCount() > 0)
{
  $_SESSION['examineeSession'] = array(
  	 'exmne_id' => $selAccRow['exmne_id'],
  	 'examineenakalogin' => true
  );
  $res = array("res" => "success");

}
else
{
  $res = array("res" => "invalid");
}




 echo json_encode($res);
 ?>