<?php  
session_start();
echo $_SESSION['LoginStaff'];

if (!$_SESSION["LoginStaff"])
{
  header('location:../../Login/Index.html');
}
  require_once "../../Connection/connection.php";
?>

<html>

</html>